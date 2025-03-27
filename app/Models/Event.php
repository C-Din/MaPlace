<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
    public function category()
    {
        return $this->belongsTo(CategoryEvent::class);
    }

    public function places()
    {
        return $this->belongsToMany(Place::class, 'event_places')->withPivot(['event_date']);
    }
}
