<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
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
        return $this->belongsToMany(Place::class);
    }
}
