<?php

namespace Database\Seeders;

use App\Models\WhatWeDoSection;
use App\Models\WhatWeDoItem;
use Illuminate\Database\Seeder;

class WhatWeDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = WhatWeDoSection::create([
            'badge_text' => 'Our Services',
            'title' => 'What We Do',
            'is_active' => true,
        ]);

        $items = [
            [
                'icon' => 'fas fa-file-alt',
                'title' => 'Policy & Economic Research',
                'description' => 'Conducting rigorous policy analysis and economic studies to inform decision-making and drive regional development strategies.',
                'sort_order' => 1,
            ],
            [
                'icon' => 'fas fa-lightbulb',
                'title' => 'Innovation & Entrepreneurship Development',
                'description' => 'Fostering a culture of innovation by supporting startups, incubators, and technology-driven enterprises.',
                'sort_order' => 2,
            ],
            [
                'icon' => 'fas fa-users',
                'title' => 'Skill Development & Training',
                'description' => 'Designing and implementing programs to bridge skill gaps and prepare the workforce for emerging industries.',
                'sort_order' => 3,
            ],
            [
                'icon' => 'fas fa-balance-scale',
                'title' => 'Public Policy Advisory',
                'description' => 'Providing strategic guidance to governments, institutions, and organizations on effective policy design and implementation.',
                'sort_order' => 4,
            ],
            [
                'icon' => 'fas fa-network-wired',
                'title' => 'Community & Ecosystem Building',
                'description' => 'Creating collaborative networks that connect entrepreneurs, investors, policymakers, and communities for shared growth.',
                'sort_order' => 5,
            ],
        ];

        foreach ($items as $item) {
            $section->allItems()->create($item);
        }
    }
}
