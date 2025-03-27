<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->company;
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'capacity' => $this->faker->numberBetween(1, 100),
            'street' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'zip_code' => $this->faker->postcode,
            'created_by' => $this->faker->numberBetween(1,User::count()),
        ];
    }
}
