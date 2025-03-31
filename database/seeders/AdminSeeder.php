<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::updateOrcreate(['email' => 'admin@admin.com'],[
            'name' => 'admin',
            'address' => 'Riyadh KSA',
            'phone' => '500000000',
            'avatar'=> 'storage/avatar/admin.png',
            'password'=> bcrypt('123456789'),
        ]);
    }
}
