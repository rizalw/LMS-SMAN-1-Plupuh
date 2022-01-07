<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class penggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'password' => $this->faker->password,
        ];
    }
}
