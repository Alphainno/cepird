<?php

namespace Database\Seeders;

use App\Models\VisionMissionSection;
use Illuminate\Database\Seeder;

class VisionMissionSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisionMissionSection::create([
            'vision_icon' => '🎯',
            'vision_title' => 'Our Vision',
            'vision_paragraph1' => 'To build a globally competitive entrepreneurial ecosystem for Bangladesh through research-driven policy innovation, digital transformation, and sustainable economic development.',
            'vision_paragraph2' => 'We envision Bangladesh as a leading innovation hub in South Asia, where evidence-based policies empower startups and every entrepreneur has access to the resources needed to transform ideas into impactful ventures.',
            'mission_icon' => '📌',
            'mission_title' => 'Our Mission',
            'mission_point1' => 'Conduct high-quality research on entrepreneurship',
            'mission_point2' => 'Develop policy frameworks for startups and SMEs',
            'mission_point3' => 'Bridge gaps between academia and industry',
            'mission_point4' => 'Train future leaders in digital economy',
            'mission_point5' => 'Promote sustainable equitable growth',
            'is_active' => true,
        ]);
    }
}
