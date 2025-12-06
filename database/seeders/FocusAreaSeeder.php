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
            'main_title' => 'Core Strategic Areas',
            'subtitle' => null,
            'is_active' => true,
        ]);

        $focusAreas = [
            [
                'title' => 'Policy Development',
                'description' => 'Drafting frameworks for digital commerce and SME growth.',
                'icon' => 'file-text',
                'icon_color' => 'blue',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Tech-Enabled Innovation',
                'description' => 'Integrating AI and Blockchain into public sector solutions.',
                'icon' => 'cpu',
                'icon_color' => 'teal',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Applied Research',
                'description' => 'Publishing indices, whitepapers, and economic impact studies.',
                'icon' => 'book-open',
                'icon_color' => 'amber',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Entrepreneur Support',
                'description' => 'Mentorship and funding bridges for early-stage startups.',
                'icon' => 'award',
                'icon_color' => 'indigo',
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
