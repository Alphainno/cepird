<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FocusAreaHeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FocusAreaHeroSection::create([
            'title' => 'Core Focus Areas',
            'subtitle' => 'Our Strategic Focus',
            'description' => 'CEPIRD operates at the critical intersection of policy, innovation, research, and entrepreneurship development.',
            'background_image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&auto=format&fit=crop&q=80',
            'is_active' => true,
        ]);
    }
}
