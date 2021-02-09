<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'location_id',
        'price',
    ];

    public function booking()
    {
        return $this->hasMany('App\Models\Booking');
    }

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }
}
