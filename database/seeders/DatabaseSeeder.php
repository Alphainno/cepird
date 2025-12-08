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
            // Landing Page
            HeroSectionSeeder::class,
            
            // About Page
            AboutSectionSeeder::class,
            AboutHeroSectionSeeder::class,
            AboutIntroductionSectionSeeder::class,
            VisionMissionSectionSeeder::class,
            CoreValueSeeder::class,
            WhatWeDoSeeder::class,
            FounderSeeder::class,
            
            // Focus Areas Page
            FocusAreaSeeder::class,
            FocusAreaHeroSectionSeeder::class,
            StrategicPillarSeeder::class,
            FocusAreaOutcomeSeeder::class,
            FocusAreaOutcomeSectionSeeder::class,
            FocusAreaCtaSectionSeeder::class,
            
            // Programs Page
            ProgramInitiativeSeeder::class,
            VisionSectionSeeder::class,
            ProgramSeeder::class,
            ProgramHeroSectionSeeder::class,
            ProgramOverviewSectionSeeder::class,
            ProgramCategorySeeder::class,
            ProgramSectionSeeder::class,
            ProgramImpactSeeder::class,
            
            // Research Page
            ResearchHeroSectionSeeder::class,
            ResearchCategorySeeder::class,
            ResearchPaperSeeder::class,
            
            // Contact Page
            ContactHeroSectionSeeder::class,
            ContactInfoSectionSeeder::class,
            ContactMapSectionSeeder::class,
            ContactCtaSectionSeeder::class,
            
            // Shared Components
            CtaSectionSeeder::class,
            ImpactMetricSeeder::class,
            ImpactSectionSeeder::class,
            HeaderSeeder::class,
            FooterSeeder::class,
            
        ]);
    }
}
