<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@cepird.org'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => 'administrator',
                'phone' => '+1 (555) 123-4567',
                'bio' => 'System Administrator for CEPIRD platform.',
            ]
        );
    }
}
