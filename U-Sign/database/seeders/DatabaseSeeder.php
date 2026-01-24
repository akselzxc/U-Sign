<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        if (!User::where('email', 'FrontLine@example.com')->exists()) {
            User::create([
                'first_name' => 'FrontLine',
                'last_name' => 'User',
                'middle_initial' => 'F',
                'role' => 'frontline',
                'contact_number' => '09987654321',
                'profile_image' => null,
                'email' => 'FrontLine@example.com',
                'password' => Hash::make('frontline123'),
            ]);
        }
    }
}
