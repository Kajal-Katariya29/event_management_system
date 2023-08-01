<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class VenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $country = Country::factory()->create();
        return [
            'country_id' => $country,
            'city_id' => City::factory()->create(['country_id' => $country->country_id]),
            'venue_name' => $this->faker->name,
            'capacity' => $this->faker->randomNumber(5),
            'address' => $this->faker->text,
            'pin_code' => $this->faker->randomNumber(6),
        ];
    }
}
