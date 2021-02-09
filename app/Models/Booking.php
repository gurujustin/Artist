<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_number',
        'price_location_id',
        'event_id',
        'name',
        'email',
        'tel',
        'venue',
        'datetime',
        'other',
        'amount',
        'status',
        'paid_datetime',
        'datetime1'
    ];

    public function pricelocation()
    {
        return $this->belongsTo('App\Models\PriceLocation', 'price_location_id');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function bookingaddon()
    {
        return $this->hasMany('App\Models\BookingAddon');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }
}
