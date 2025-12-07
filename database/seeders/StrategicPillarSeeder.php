<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StrategicPillar;

class StrategicPillarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pillars = [
            [
                'badge_text' => 'Our Strategic Pillars',
                'section_title' => 'Four Core Focus Areas',
                'title' => 'Policy Development',
                'description' => 'Evidence-based frameworks strengthening entrepreneurship and digital transformation.',
                'icon' => '📋',
                'color_theme' => 'blue',
                'link_href' => '#policy-development',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'badge_text' => 'Our Strategic Pillars',
                'section_title' => 'Four Core Focus Areas',
                'title' => 'Technology-Enabled Innovation',
                'description' => 'Promoting digital adoption and tech-driven solutions for emerging industries.',
                'icon' => '💡',
                'color_theme' => 'teal',
                'link_href' => '#technology-innovation',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'badge_text' => 'Our Strategic Pillars',
                'section_title' => 'Four Core Focus Areas',
                'title' => 'Research',
                'description' => 'In-depth studies and publications guiding policymakers and entrepreneurs.',
                'icon' => '📊',
                'color_theme' => 'amber',
                'link_href' => '#research',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'badge_text' => 'Our Strategic Pillars',
                'section_title' => 'Four Core Focus Areas',
                'title' => 'Entrepreneurship Support',
                'description' => 'Empowering startups through mentorship, training, and ecosystem development.',
                'icon' => '🚀',
                'color_theme' => 'indigo',
                'link_href' => '#entrepreneurship-support',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($pillars as $pillar) {
            StrategicPillar::create($pillar);
        }
    }
}
