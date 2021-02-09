<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name1',
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function artist(){
        return $this->hasmany('App\Models\Artist');
    }
}
