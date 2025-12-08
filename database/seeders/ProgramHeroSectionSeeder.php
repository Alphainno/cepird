<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProgramHeroSection;

class ProgramHeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramHeroSection::create([
            'badge_text' => 'Empowering Ideas. Influencing Policy. Impacting the Future.',
            'title' => 'Programs & Initiatives',
            'description' => "CEPIRD's comprehensive programs drive research, innovation, entrepreneurship development, and policy transformation across Bangladesh.",
            'background_image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&auto=format&fit=crop&q=80',
            'is_active' => true,
        ]);
    }
}
