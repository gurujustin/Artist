<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status_id',
    ];

    public function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
    
    public function artist()
    {
        return $this->hasMany('App\Models\Artist');
    }    
}
