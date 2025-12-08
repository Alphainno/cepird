<?php

namespace Database\Seeders;

use App\Models\ResearchHeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResearchHeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResearchHeroSection::create([
            'badge_text' => 'Research Library',
            'title_line1' => 'Explore Our',
            'title_line2' => 'Research',
            'subtitle' => 'Evidence-based insights shaping policy, innovation, and sustainable development',
            'background_image' => null,
            'is_active' => true,
        ]);
    }
}
