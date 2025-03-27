<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryEvent extends Model
{
    use HasFactory;
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
