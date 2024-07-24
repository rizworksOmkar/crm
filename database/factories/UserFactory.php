<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;

        $username = $faker->userName; // Generate random username

        return [
            'role_type' => 'user', // Fixed role type
            'first_name' => $faker->firstName,
            'middle_name' => $faker->optional()->lastName, // Optional middle name
            'last_name' => $faker->lastName,
            'email' => $username,
            'usersemail' => $faker->unique()->safeEmail, // Unique secondary email
            'phonenumber' => $faker->phoneNumber, // 10-digit phone number
            'whatsapp_no_flag' => (bool) ($faker->phoneNumber === $faker->phoneNumber), // Check if phone and whatsapp numbers are same
            'whatsappno' => $faker->phoneNumber, // Whatsapp number
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // Placeholder password
            'remember_token' => Str::random(10),
            'email_verified_flag' => true, // Email verified by default
        ];
    }
}
