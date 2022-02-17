<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function ticketType()
    {
        return $this->belongsTo(TicketType::class);
    }

    public function userTicket()
    {
        return $this->hasMany(UserTicket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
