<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryEvent>
 */
class CategoryEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name =  fake()->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence($nbWords = 6, $variableNbWords = true),
            'created_by' => $this->faker->numberBetween(1,User::count()),
        ];
    }
}
