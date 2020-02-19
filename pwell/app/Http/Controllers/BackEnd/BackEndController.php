<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    protected $model;

    protected $storeRequestFile;

    protected $updateRequestFile;

    protected function append()
    {
        return [];
    }


    public function getModelName()
    {
        return class_basename($this->model);
    }

    public function getModelPluralName()
    {
        return str_plural($this->getModelName());
    }

    public function getViewsDirectory()
    {
        return str_plural(strtolower($this->getModelName()));
    }


    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index()
    {

        $rows = $this->model->paginate(10);
        $title = $this->getModelPluralName();
        $nav_title = $this->getModelPluralName();
        $table_title = 'Control ' . $this->getModelPluralName();
        $table_des = 'Here you can add / edit / delete ' . $this->getModelPluralName();
        $button_name = 'Add ' . $this->getModelName();
        $route_name = $this->getViewsDirectory();
        $model_name = $this->getModelName();
        $append = $this->append();

        return view('backend.' . $this->getViewsDirectory() . '.index',
            compact('rows', 'title', 'nav_title',
                'table_title', 'table_des', 'button_name', 'route_name', 'model_name'))->with($append);

    }

    public function create()
    {
        $title = 'Create' . $this->getModelName();
        $nav_title = 'Create' . $this->getModelName();
        $table_title = 'Create ' . $this->getModelPluralName();
        $table_des = 'Here you can add ' . $this->getModelPluralName();
        $submit_name = 'Add ' . $this->getModelName();
        $append = $this->append();
        $directory = $this->getViewsDirectory();

        return view('backend.' . $this->getViewsDirectory() . '.create',
            compact('title', 'nav_title',
                'table_title', 'table_des',
                'submit_name', 'directory'
            ))->with($append);

    }

    public function store()
    {

        app($this->storeRequestFile);

        $input = request()->except('image');

        if (\request()->has('password')) {
            $input['password'] = bcrypt(\request('password'));
        }

        if (\request()->has('image') && !empty(\request('image'))) {
            $file = \request()->file('image');
            $name = '/images/' . time() . $file->getClientOriginalName();

            $file->move('images', $name);
            $input['image'] = $name;
        }


        $row = $this->model->create($input);

        if (\request()->has('bio')) {

            return redirect()->route($this->getViewsDirectory() . '.upload', $row->id );
        }

        return redirect()->route($this->getViewsDirectory() . '.index');
    }

    public function edit($id)
    {
        $title = 'Edit' . $this->getModelName();
        $nav_title = 'Edit' . $this->getModelName();
        $table_title = 'Edit ' . $this->getModelPluralName();
        $table_des = 'Here you can edit ' . $this->getModelPluralName();
        $submit_name = 'Update ' . $this->getModelName();
        $append = $this->append();
        $directory = $this->getViewsDirectory();
        $row = $this->model->findOrFail($id);


        return view('backend.' . $this->getViewsDirectory() . '.edit',
            compact('title', 'nav_title',
                'table_title', 'table_des',
                'submit_name', 'directory',
                'row'
            ))->with($append);

    }

    public function update($id)
    {
        app($this->updateRequestFile);

        $row = $this->model->findOrFail($id);

        $input = \request()->except('password', 'image');


        if (\request()->has('password') && !empty(\request('password'))) {

            $input['password'] = bcrypt(\request('password'));
        }

        if (\request()->has('image') && !empty(\request('image'))) {

            if (!empty($row->image)) {
                unlink(public_path() . $row->image);
            }

            $file = \request()->file('image');
            $name = '/images/' . time() . $file->getClientOriginalName();

            $file->move('images', $name);
            $input['image'] = $name;
        }

        $row->update($input);

        return redirect()->route($this->getViewsDirectory() . '.index');
    }

    public function destroy($id)
    {
        $row = $this->model->findOrFail($id);

        if ($row->image && !empty($row->image)) {
            unlink(public_path() . $row->image);
        }

        $row->delete();

        return redirect()->route($this->getViewsDirectory() . '.index');
    }


}
