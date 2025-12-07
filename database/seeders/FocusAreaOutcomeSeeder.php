<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FocusAreaOutcome;

class FocusAreaOutcomeSeeder extends Seeder
{
    public function run(): void
    {
        $outcomes = [
            [
                'title' => 'Policy Frameworks',
                'icon' => '📋',
                'description' => 'Actionable policy recommendations for government and institutions',
                'bullet1' => 'Digital Transformation Strategy',
                'bullet2' => 'Startup Ecosystem Policy',
                'bullet3' => 'SME Development Guidelines',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Technology Solutions',
                'icon' => '💡',
                'description' => 'Innovative tech platforms and digital tools for entrepreneurs',
                'bullet1' => 'AI-powered Business Tools',
                'bullet2' => 'Digital Skills Platform',
                'bullet3' => 'Entrepreneur Network App',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Research Publications',
                'icon' => '📊',
                'description' => 'Evidence-based insights and market analysis reports',
                'bullet1' => 'Annual Policy Report',
                'bullet2' => 'Startup Ecosystem Index',
                'bullet3' => 'Market Research Studies',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Training & Mentorship',
                'icon' => '🚀',
                'description' => 'Comprehensive capacity-building for entrepreneurs and teams',
                'bullet1' => 'Masterclasses & Workshops',
                'bullet2' => 'Mentorship Programs',
                'bullet3' => 'Certification Courses',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($outcomes as $outcome) {
            FocusAreaOutcome::updateOrCreate(
                ['title' => $outcome['title']],
                $outcome
            );
        }
    }
}
