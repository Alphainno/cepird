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

        User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Seed Hero Section
        $this->call([
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            AboutHeroSectionSeeder::class,
            AboutIntroductionSectionSeeder::class,
            VisionMissionSectionSeeder::class,
            CoreValueSeeder::class,
            WhatWeDoSeeder::class,
            ProgramInitiativeSeeder::class,
            FocusAreaSeeder::class,
            VisionSectionSeeder::class,
            ProgramSeeder::class,
            FounderSeeder::class,
            CtaSectionSeeder::class,
            FocusAreaHeroSectionSeeder::class,
            StrategicPillarSeeder::class,
            FocusAreaOutcomeSeeder::class,
            FocusAreaOutcomeSectionSeeder::class,
            ImpactMetricSeeder::class,
            ImpactSectionSeeder::class,
            FocusAreaCtaSectionSeeder::class,
            ContactHeroSectionSeeder::class,
            ContactInfoSectionSeeder::class,
            ContactMapSectionSeeder::class,
            ContactCtaSectionSeeder::class,
            ProgramSectionSeeder::class,
        ]);
    }
}
