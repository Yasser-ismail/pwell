<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
      'name', 'bio', 'category_id', 'start_at', 'end_at'
    ];

    //relations

    public function photos(){
        return $this->hasMany('App\Place');
    }
}
