<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramCategory;

class ProgramCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Research & Publications',
                'description' => 'Evidence-based research driving policy innovation and entrepreneurial development.',
                'icon' => '📘',
                'color' => 'blue',
                'anchor_link' => '#research-publications',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Training & Certification',
                'description' => 'Building future-ready skills and leadership for a digital economy.',
                'icon' => '🎓',
                'color' => 'teal',
                'anchor_link' => '#training-certification',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Innovation Programs',
                'description' => 'Accelerating startups and fostering youth-led innovation.',
                'icon' => '💡',
                'color' => 'amber',
                'anchor_link' => '#innovation-programs',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Conferences & Events',
                'description' => 'National-level summits connecting stakeholders and thought leaders.',
                'icon' => '📣',
                'color' => 'indigo',
                'anchor_link' => '#conferences-events',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProgramCategory::create($category);
        }
    }
}
