<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Place;

class EventPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();
        $places = Place::all();
        $events->each(function ($event) use ($places) {
            $event->places()->attach(
                $places->random(rand(1, 10))->pluck('id')->toArray(),
                ['event_date' => now()
                ]
            );
        });
    }
}
