<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\TicketType;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName,
            'price' => $this->faker->numberBetween($min = 2000, $max = 15000),
            'sector' => $this->faker->secondaryAddress,
            'location_id' => Location::all()->random()->id
        ];
    }
}
