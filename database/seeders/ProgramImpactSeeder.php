<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramImpactSection;
use App\Models\ProgramImpactStat;

class ProgramImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the section header
        ProgramImpactSection::create([
            'badge_text' => 'Measurable Impact',
            'title' => 'Programs by the Numbers',
            'description' => 'Our programs create tangible outcomes that empower individuals, strengthen institutions, and transform Bangladesh\'s entrepreneurial landscape.',
            'is_active' => true,
        ]);

        // Create the impact statistics
        ProgramImpactStat::create([
            'value' => '50+',
            'label' => 'Research Publications',
            'description' => 'Evidence-based studies driving policy',
            'color_theme' => 'blue',
            'order' => 1,
            'is_active' => true,
        ]);

        ProgramImpactStat::create([
            'value' => '1,200+',
            'label' => 'Trained Individuals',
            'description' => 'Certified in entrepreneurship & tech',
            'color_theme' => 'teal',
            'order' => 2,
            'is_active' => true,
        ]);

        ProgramImpactStat::create([
            'value' => '200+',
            'label' => 'Startups Accelerated',
            'description' => 'Through innovation programs',
            'color_theme' => 'amber',
            'order' => 3,
            'is_active' => true,
        ]);

        ProgramImpactStat::create([
            'value' => '25+',
            'label' => 'National Events',
            'description' => 'Summits, conferences & forums',
            'color_theme' => 'indigo',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}

