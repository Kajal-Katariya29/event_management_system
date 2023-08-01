<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Country;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'country_id' => Country::factory()->create(),
            'name' => $this->faker->name,
        ];
    }
}
