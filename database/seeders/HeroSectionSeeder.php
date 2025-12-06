<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::updateOrCreate(
            ['id' => 1],
            [
                'badge_text' => "Driving Bangladesh's Future",
                'title_line1' => 'Empowering Ideas.',
                'title_line2' => 'Influencing Policy.',
                'title_line3' => 'Impacting the Future.',
                'description' => 'Driving entrepreneurial growth, policy innovation, and digital transformation. Bridging the gap between academic research and real-world economic impact.',
                'button1_text' => 'Explore Programs',
                'button1_link' => '/programs',
                'button2_text' => 'Download Policy Report',
                'button2_link' => '#',
                'founder_name' => 'Mohammad Shahriar Khan',
                'is_active' => true,
            ]
        );
    }
}
