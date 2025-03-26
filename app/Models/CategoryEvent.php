<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryEvent extends Model
{
    protected $guarded = [];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
