<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutHeroSection;

class AboutHeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutHeroSection::create([
            'title_line1' => 'Center for Entrepreneurial',
            'title_line2' => 'Policy, Innovation, Research & Development',
            'subtitle' => 'Shaping the future of entrepreneurship and socio-economic transformation in Bangladesh',
            'tag1' => 'Empowering Ideas',
            'tag2' => 'Influencing Policy',
            'tag3' => 'Impacting the Future',
            'is_active' => true
        ]);
    }
}
