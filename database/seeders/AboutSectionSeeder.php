<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutSection;
use App\Models\Pillar;

class AboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutSection = AboutSection::create([
            'main_title' => 'Accelerating a Knowledge-Driven Economy',
            'subtitle' => 'CEPIRD serves as the premier think-tank and execution hub for modernizing the entrepreneurial landscape.',
            'is_active' => true,
        ]);

        // Create pillars
        $pillars = [
            [
                'title' => 'Policy Research',
                'description' => 'Data-driven insights to shape national frameworks.',
                'icon' => 'file-text',
                'sort_order' => 1,
            ],
            [
                'title' => 'Innovation',
                'description' => 'Fostering creative solutions for systemic challenges.',
                'icon' => 'lightbulb',
                'sort_order' => 2,
            ],
            [
                'title' => 'Entrepreneurship',
                'description' => 'Supporting startups from ideation to scale.',
                'icon' => 'trending-up',
                'sort_order' => 3,
            ],
            [
                'title' => 'Skill Development',
                'description' => 'Equipping the workforce for the 4th Industrial Revolution.',
                'icon' => 'users',
                'sort_order' => 4,
            ],
        ];

        foreach ($pillars as $pillarData) {
            $aboutSection->pillars()->create($pillarData);
        }
    }
}
