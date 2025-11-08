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
            'start_date' => fake()->dateTimeBetween('now', 'now'),
            'end_date'   => fake()->dateTimeBetween('now +1 month', 'now +1 month'),
            'location' => fake()->address(),
            'qr_token' => fake()->uuid(),
            'is_active' => 1,
            'admin_id' => 1, // Use the default admin

        ];
    }
}
