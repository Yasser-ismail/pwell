<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Places\Store;
use App\Http\Requests\BackEnd\Places\Update;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PlacesController extends BackEndController
{


    public function __construct(Place $model)
    {
        parent::__construct($model);
    }

    protected $storeRequestFile = Store::class;

    protected $updateRequestFile = Update::class;

    protected function append()
    {
        return [
            'categories' => Category::all(),
        ];

    }

    public function upload($id)
    {

        $place = Place::findOrFail($id);
        return view('backend.places.upload.upload', compact('place'));
    }

    public function storePhotos(\App\Http\Requests\BackEnd\Photos\Store $request)
    {

        $input = $request->except('file');

        $file = $request->file('file');
        $name = '/images/' . time() . $file->getClientOriginalName();

        $file->move('images', $name);

        $input['path'] = $name;

        Photo::create($input);

        return redirect()->route('places.index');

    }

    public function photosIndex($id)
    {

        $place = Place::findOrFail($id);
        $photos = $place->photos()->paginate(10);

        return view('backend.places.upload.index', compact('place', 'photos'));
    }

    public function deletePhoto($id)
    {

        $photo = Photo::findOrFail($id);

        unlink(public_path() . $photo->path);

        $photo->delete();

        return redirect()->back();

    }

    public function deletePhotos(Request $request)
    {
        if (!empty($request->checkBoxArray)) {
            $photos = Photo::findOrFail($request->checkBoxArray);

            foreach ($photos as $photo){
                unlink(public_path() . $photo->path);

                $photo->delete();
            }
        }
        return redirect()->back();
    }


}
