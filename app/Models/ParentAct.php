<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentAct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function act()
    {
        return $this->hasMany('App\Models\Act');
    }
}
