<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Location::factory(10)->create();
        \App\Models\TicketType::factory(20)->create();
        \App\Models\PaymentMethod::factory(3)->create();
        \App\Models\User::factory(2)->create();
        \App\Models\Payment::factory(10)->create();
        \App\Models\Event::factory(100)->create();
        \App\Models\Ticket::factory(250)->create();
        \App\Models\UserTicket::factory(400)->create();
    }
}
