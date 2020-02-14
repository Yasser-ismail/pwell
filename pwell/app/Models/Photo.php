<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'path', 'place_id'
    ];

    //relations
    public function place(){
        return $this->belongsTo('App\Place');
    }
}
