<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function tickets()
    {
        return $this->belongsToMany(User::class, 'ticket_users')
                    ->withPivot('quantity', 'total_price', 'is_active', 'payment_date', 'payment_status');
    }
}
