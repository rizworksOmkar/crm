<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => strval(rand(1000000000, 9999999999)),
            'whatsapp_ph' => strval(rand(1000000000, 9999999999)),
            'address' => $this->faker->address,
        ];
    }
}
