<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title', 'description', 'location', 'is_public', 'image', 'date', 'organizer', 'items'
    ];
    protected $casts = [
        'items' => 'array',
    ];
}
