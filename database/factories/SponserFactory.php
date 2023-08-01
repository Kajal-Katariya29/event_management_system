<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SponserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sponser_name' => $this->faker->name,
            'sponser_level' => $this->faker->name,
            'contact_info' => $this->faker->phoneNumber,
        ];
    }
}
