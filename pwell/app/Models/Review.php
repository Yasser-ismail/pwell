<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
      'user_id', 'place_id', 'rate', 'feedback', 'is_appeared',
    ];

    //relations
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function place(){
        return $this->belongsTo('App\Place');
    }
}
