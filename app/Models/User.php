<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status_id',
        'role_id',
        'tel',
        'address',
        'roles',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */


    public function artist()
    {
        return $this->hasMany('App\Models\Artist');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
