<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            // Research
            [
                'title' => 'BD Entrepreneurship Policy Report',
                'description' => 'Comprehensive analysis of entrepreneurship policies in Bangladesh.',
                'category' => 'research',
                'link' => '#',
                'sort_order' => 1,
            ],
            [
                'title' => 'Startup Ecosystem Index 2024',
                'description' => 'Annual report on the state of startup ecosystem in Bangladesh.',
                'category' => 'research',
                'link' => '#',
                'sort_order' => 2,
            ],
            [
                'title' => 'Digital Transformation Study',
                'description' => 'Research on digital transformation in traditional industries.',
                'category' => 'research',
                'link' => '#',
                'sort_order' => 3,
            ],
            // Training
            [
                'title' => 'Innovation Leadership',
                'description' => 'Training program for innovation leadership skills.',
                'category' => 'training',
                'link' => '#',
                'sort_order' => 1,
            ],
            [
                'title' => 'AI & Future Skills',
                'description' => 'Certification program on AI and future technologies.',
                'category' => 'training',
                'link' => '#',
                'sort_order' => 2,
            ],
            [
                'title' => 'Business Model Masterclass',
                'description' => 'Advanced training on business model innovation.',
                'category' => 'training',
                'link' => '#',
                'sort_order' => 3,
            ],
            [
                'title' => 'Policy 101',
                'description' => 'Introduction to entrepreneurship policy making.',
                'category' => 'training',
                'link' => '#',
                'sort_order' => 4,
            ],
            // Innovation
            [
                'title' => 'CEPIRD Innovation Lab',
                'description' => 'Incubation support for policy-tech solutions.',
                'category' => 'innovation',
                'link' => '#',
                'sort_order' => 1,
            ],
            [
                'title' => 'Youth Startup Accelerator',
                'description' => '12-week intensive program for university students.',
                'category' => 'innovation',
                'link' => '#',
                'sort_order' => 2,
            ],
            // Events
            [
                'title' => 'National Policy Summit',
                'description' => 'Annual summit on entrepreneurship policies.',
                'category' => 'event',
                'event_date' => '2025-11-15',
                'location' => 'Dhaka International Conference Center',
                'sort_order' => 1,
            ],
            [
                'title' => 'Digital Economy Conference',
                'description' => 'Conference on digital economy and innovation.',
                'category' => 'event',
                'event_date' => '2025-12-28',
                'location' => 'Virtual Event',
                'sort_order' => 2,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
