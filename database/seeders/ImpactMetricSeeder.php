<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImpactMetricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metrics = [
            [
                'title' => 'Entrepreneurs Supported',
                'value' => '500+',
                'description' => 'Through mentorship and training programs',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Research Studies',
                'value' => '50+',
                'description' => 'Evidence-based insights published',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Policy Recommendations',
                'value' => '100+',
                'description' => 'Submitted to government bodies',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Tech Innovations',
                'value' => '200+',
                'description' => 'Accelerated and supported',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($metrics as $metric) {
            \App\Models\ImpactMetric::create($metric);
        }
    }
}
