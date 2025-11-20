<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Attendance;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminSeeder::class,
            SettingSeeder::class,
        ]);

        // $events = Event::factory(10)->create();
        // $users = Admin::factory(10)->create();
        // Attendance::factory(10)
        // ->recycle($users, $events)
        // ->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
