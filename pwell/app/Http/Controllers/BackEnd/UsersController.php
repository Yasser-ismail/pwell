<?php

namespace App\Http\Controllers\BackEnd;


use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersController extends BackEndController
{
    protected $storeRequestFile = Store::class;

    protected $updateRequestFile = Update::class;



    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function append()
    {
     return [
        'roles' => Role::get(),
     ];
    }
}
