<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'url',
        'type',
        'title',
        'alt',
    ];

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }
}
