<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => 1, // Will be overridden by recycle()
            'admin_id' =>Admin::factory(),
            'country' => fake()->randomElement(['Sudan', 'Egypt', 'Saudi Arabia', 'Qatar', 'United Arab Emirates']),
            'qr_token' => fake()->uuid(),
            'used_at' => fake()->dateTime(),
            'checked_in_by' => fake()->name(),
        ];
    }
}
