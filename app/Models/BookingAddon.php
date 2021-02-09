<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingAddon extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'price_addon_id',
    ];

    public function booking()
    {
        return $this->belongsTo('App\Models\Booking');
    }

    public function priceaddon()
    {
        return $this->belongsTo('App\Models\PriceAddon', 'price_addon_id');
    }
}
