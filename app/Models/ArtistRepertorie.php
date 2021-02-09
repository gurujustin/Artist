<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistRepertorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'content',
        'janre'
    ];

    public function artist()
    {
        return $this->belongsTo('App\Models\Artist');
    }
}
