<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status_id',
        'country_id',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function artist()
    {
        return $this->hasMany('App\Models\Artist');
    }

}
