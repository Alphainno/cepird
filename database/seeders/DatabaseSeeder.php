<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' =>Hash::make('password'), // Use bcrypt to hash the password
        ]);

        // Seed Hero Section
        $this->call([
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            FocusAreaSeeder::class,
        ]);
    }
}
