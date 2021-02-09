<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'type',
        'price',
    ];

    public function bookingaddon()
    {
        return $this->hasMany('App\Models\BookingAddon');
    }

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }

}
