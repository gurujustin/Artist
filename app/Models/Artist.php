<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'fullname',
        'website',
        'exp',
        'location_id',
        'event_id',
        'act_id',
        'status_id',
        'role_id',
        'blocked',
        'facebook',
        'twitter',
        'youtube',
        'instagram',
        'linkedin'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function act()
    {
        return $this->belongsTo('App\Models\Act');
    } 

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    
    public function artistimage()
    {
        return $this->hasMany('App\Models\ArtistImage');
    }

    public function artistmusic()
    {
        return $this->hasMany('App\Models\ArtistMusic');
    }

    public function artistvideo()
    {
        return $this->hasMany('App\Models\ArtistVideo');
    }

    public function priceaddon()
    {
        return $this->hasMany('App\Models\PriceAddon');
    }

    public function pricelocation()
    {
        return $this->hasMany('App\Models\PriceLocation');
    }

    public function pricestandardinfo()
    {
        return $this->hasMany('App\Models\PriceStandardInfo');
    }

    public function artistrepertorie()
    {
        return $this->hasMany('App\Models\ArtistRepertorie');
    }

    
}
