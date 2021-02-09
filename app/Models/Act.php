<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_act_id',
        'status_id',
    ];

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function parentact()
    {
        return $this->belongsTo('App\Models\ParentAct', 'parent_act_id');
    }
    
    public function artist()
    {
        return $this->hasMany('App\Models\Artist');
    }
}
