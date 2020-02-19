<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Sliders\Store;
use App\Http\Requests\BackEnd\Sliders\Update;
use App\Models\Slider;

class SlidersController extends BackEndController
{
    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    protected $storeRequestFile = Store::class;

    protected $updateRequestFile = Update::class;
}
