<?php

namespace Database\Factories;

use App\Models\Payment;
use App\Models\Ticket;
use App\Models\UserTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ticket_id' => Ticket::all()->random()->id,
            'payment_id' => Payment::all()->random()->id
        ];
    }
}
