<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VisionSection;
use App\Models\MissionPoint;

class VisionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visionSection = VisionSection::create([
            'vision_title' => 'OUR VISION',
            'vision_heading' => 'Empowering Innovation for Sustainable Development',
            'vision_description' => 'To be a leading center for entrepreneurial policy and innovation, driving sustainable economic growth through research, education, and collaboration.',
            'mission_title' => 'Our Mission',
            'is_active' => true,
        ]);

        $missionPoints = [
            'Conduct cutting-edge research on entrepreneurial policies and innovation ecosystems.',
            'Develop and deliver educational programs that foster entrepreneurial skills and mindset.',
            'Collaborate with governments, businesses, and communities to implement innovative solutions.',
            'Promote sustainable development through technology and policy innovation.',
        ];

        foreach ($missionPoints as $index => $point) {
            MissionPoint::create([
                'vision_section_id' => $visionSection->id,
                'point' => $point,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
