<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'is_public',
        'image',
        'date',
        'organizer',
        'items',
        'user_id'
    ];
    protected $casts = [
        'items' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user')->withTimestamps();
    }
}
