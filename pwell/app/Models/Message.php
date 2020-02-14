<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
      'message', 'user_id'
    ];

    //relations
    public function users(){
        return $this->belongsTo('App\User');
    }
}
