<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResearchCategory;

class ResearchCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Climate Change',
                'slug' => 'climate-change',
                'color' => 'blue',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Sustainability',
                'slug' => 'sustainability',
                'color' => 'green',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Policy',
                'slug' => 'policy',
                'color' => 'purple',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Economic Development',
                'slug' => 'economic-development',
                'color' => 'yellow',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Environmental',
                'slug' => 'environmental',
                'color' => 'teal',
                'order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ResearchCategory::create($category);
        }
    }
}

