<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'url',
        'primary'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }
}
