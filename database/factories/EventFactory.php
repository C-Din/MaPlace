<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'date_event' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'time_event' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'image_event' => $this->faker->imageUrl(150, 150),
            'location_id' => Location::all()->random()->id
        ];
    }
}
