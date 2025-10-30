<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'job_title' => fake()->jobTitle(),
            'gender' => fake()->randomElement(['male', 'female']),
            'phone' => fake()->phoneNumber(),
            'avatar'=> fake()->imageUrl(),
            'password'=> bcrypt(fake()->password()),
            'role' =>Admin::ROLE_USER,
        ];
    }
}
