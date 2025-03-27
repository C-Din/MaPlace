<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;

class UserTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $tickets = Ticket::all();
        $users->each(function ($user) use ($tickets) {
            $user->tickets()->attach(
                $tickets->random(rand(1, 3))->pluck('id')->toArray(),
                [
                    'quantity' => rand(1, 5),
                    'total_price' => rand(100, 1000),
                    'is_active' => rand(0, 1),
                    'payment_date' => now(),
                    'payment_status' => rand(0, 1),
                ]
            );
        });
    }
}
