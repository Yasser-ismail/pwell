<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Categories\Store;
use App\Http\Requests\BackEnd\Categories\Update;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoriesController extends BackEndController
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    protected $storeRequestFile = Store::class;

    protected $updateRequestFile = Update::class;



}
