<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'description' => fake()->paragraph(),
            'start_date'   => fake()->date(),
            'end_date' => fake()->date(),
            'location' => fake()->address(),
            'qr_token' => fake()->uuid(),
            'is_active' => fake()->boolean(),
            'image' => fake()->imageUrl(),
            'admin_id' => 1, // Use the default admin

        ];
    }
}
