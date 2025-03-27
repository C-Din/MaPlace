<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CategoryEvent;
use App\Models\Event;
use App\Models\Place;
use App\Models\Ticket;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Place::factory(10)->create();
        CategoryEvent::factory(10)->create();
        Event::factory(10)->create();
        $this->call(EventPlaceSeeder::class);
        Ticket::factory(10)->create();
        $this->call(UserTicketSeeder::class);

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
    }
}
