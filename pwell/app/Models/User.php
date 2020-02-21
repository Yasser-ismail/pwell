<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'status', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relations

    public function reviews()
    {
        return $this->hasMany('App\ Models\Review');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function token()
    {
        return $this->hasMany('App\Models\DeviceToken');
    }

    //is admin function

    public function isadmin()
    {
        if (Auth::user()->role_id == 1) {
            return true;
        }

        return false;
    }

}
