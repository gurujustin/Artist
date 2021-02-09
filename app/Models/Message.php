<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'subject',
        'from',
        'to',
        'name',
        'tel',
        'checked',
        'draft',
        'event_date',
        'file',
        'trashed',
        'owner',
    ];
}
