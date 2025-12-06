<?php

namespace Database\Seeders;

use App\Models\ProgramInitiativeSection;
use App\Models\ProgramInitiative;
use Illuminate\Database\Seeder;

class ProgramInitiativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = ProgramInitiativeSection::create([
            'badge_text' => 'Our Initiatives',
            'title' => 'Programs & Initiatives',
            'subtitle' => 'Transforming ideas into impact through structured programs',
            'is_active' => true,
        ]);

        $programs = [
            [
                'icon' => '📘',
                'title' => 'Research & Publications',
                'color' => 'blue',
                'sort_order' => 1,
                'items' => [
                    'Annual Bangladesh Entrepreneurship Policy Report',
                    'Startup Ecosystem Index',
                    'Digital Transformation Study',
                    'Women Entrepreneurship Report',
                ],
            ],
            [
                'icon' => '🎓',
                'title' => 'Training & Certification',
                'color' => 'teal',
                'sort_order' => 2,
                'items' => [
                    'Entrepreneurship & Business Model Masterclass',
                    'Digital Innovation Certificate',
                    'AI & Future Skills Program',
                    'Startup Legal Framework Training',
                ],
            ],
            [
                'icon' => '💡',
                'title' => 'Innovation Programs',
                'color' => 'amber',
                'sort_order' => 3,
                'items' => [
                    'CEPIRD Innovation Lab',
                    'Youth Startup Accelerator',
                    'National Policy Hackathon',
                    'Research Fellowship',
                ],
            ],
            [
                'icon' => '📣',
                'title' => 'Conferences & Events',
                'color' => 'blue',
                'sort_order' => 4,
                'items' => [
                    'Entrepreneurship Policy Summit',
                    'Innovation Leadership Forum',
                    'Digital Economy Conference',
                    'Women in Innovation Expo',
                ],
            ],
        ];

        foreach ($programs as $programData) {
            $items = $programData['items'];
            unset($programData['items']);

            $program = $section->allPrograms()->create($programData);

            foreach ($items as $index => $itemText) {
                $program->allItems()->create([
                    'text' => $itemText,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]);
            }
        }
    }
}
