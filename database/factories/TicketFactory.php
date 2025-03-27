<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word;
        $event_place_ids = DB::table('event_places')->pluck('id')->toArray();
        //dd($event_place_ids);
        return [
            'event_place_id' => $event_place_ids[array_rand($event_place_ids)],
            'price' => $this->faker->randomFloat(2, 0, 100),
            'stock' => $this->faker->numberBetween(1, 100),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
