<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
      'name', 'image'
    ];

    //relations

    public function places(){
        return $this->hasMany('App\Models\Place');
    }
}
