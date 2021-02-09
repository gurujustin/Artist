<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceStandardInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'length',
        'time',
        'lineup',
    ];

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }
}
