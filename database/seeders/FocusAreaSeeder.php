<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FocusAreaSection;
use App\Models\FocusArea;

class FocusAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $focusAreaSection = FocusAreaSection::create([
            'badge_text' => 'What We Focus On',
            'title' => 'Core Focus Areas',
            'subtitle' => 'Driving meaningful change at the intersection of research, innovation, and policy',
            'quote' => 'Ideas create progress — but policies turn progress into national prosperity.',
            'is_active' => true,
        ]);

        $focusAreas = [
            [
                'icon' => '📋',
                'title' => 'Policy Development',
                'description' => 'Evidence-based frameworks strengthening entrepreneurship and digital transformation.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => '💡',
                'title' => 'Technology Innovation',
                'description' => 'Promoting digital adoption and tech-driven solutions for emerging industries.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => '📊',
                'title' => 'Research',
                'description' => 'In-depth studies guiding policymakers, institutions, and entrepreneurs.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => '🚀',
                'title' => 'Entrepreneurship',
                'description' => 'Empowering startups through training, mentorship, and ecosystem development.',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($focusAreas as $focusArea) {
            $focusArea['focus_area_section_id'] = $focusAreaSection->id;
            FocusArea::create($focusArea);
        }
    }
}
