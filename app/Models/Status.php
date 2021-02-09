<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function act()
    {
        return $this->hasMany('App\Models\Act');
    }

    public function event()
    {
        return $this->hasMany('App\Models\Event');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function blog()
    {
        return $this->hasMany('App\Models\Blog');
    }
}
