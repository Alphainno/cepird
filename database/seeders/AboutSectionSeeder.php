<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutSection::create([
            'main_title' => 'Accelerating a Knowledge-Driven Economy',
            'subtitle' => 'CEPIRD serves as the premier think-tank and execution hub for modernizing the entrepreneurial landscape.',
            'is_active' => true,
            'pillar1_title' => 'Policy Research',
            'pillar1_description' => 'Data-driven insights to shape national frameworks.',
            'pillar1_icon' => 'file-text',
            'pillar2_title' => 'Innovation',
            'pillar2_description' => 'Fostering creative solutions for systemic challenges.',
            'pillar2_icon' => 'lightbulb',
            'pillar3_title' => 'Entrepreneurship',
            'pillar3_description' => 'Supporting startups from ideation to scale.',
            'pillar3_icon' => 'trending-up',
            'pillar4_title' => 'Skill Development',
            'pillar4_description' => 'Equipping the workforce for the 4th Industrial Revolution.',
            'pillar4_icon' => 'users',
        ]);
    }
}
