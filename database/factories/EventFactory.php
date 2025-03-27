<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CategoryEvent;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'created_by' => $this->faker->numberBetween(1,User::count()),
            'category_id' => $this->faker->numberBetween(1,CategoryEvent::count()),
        ];
    }
}
