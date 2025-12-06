<?php

namespace Database\Seeders;

use App\Models\CoreValueSection;
use App\Models\CoreValue;
use Illuminate\Database\Seeder;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $section = CoreValueSection::create([
            'badge_text' => 'Our Foundation',
            'title' => 'Core Values',
            'subtitle' => 'The principles that guide everything we do',
            'is_active' => true,
        ]);

        $coreValues = [
            [
                'icon' => '⭐',
                'title' => 'Innovation',
                'description' => 'Bold thinking, creative solutions',
                'sort_order' => 1,
            ],
            [
                'icon' => '🛡️',
                'title' => 'Integrity',
                'description' => 'Ethics and accountability',
                'sort_order' => 2,
            ],
            [
                'icon' => '🤝',
                'title' => 'Inclusivity',
                'description' => 'Equal opportunities',
                'sort_order' => 3,
            ],
            [
                'icon' => '🎯',
                'title' => 'Impact',
                'description' => 'Meaningful outcomes',
                'sort_order' => 4,
            ],
            [
                'icon' => '🧭',
                'title' => 'Collaboration',
                'description' => 'Partnership-driven',
                'sort_order' => 5,
            ],
        ];

        foreach ($coreValues as $value) {
            $section->allCoreValues()->create($value);
        }
    }
}
