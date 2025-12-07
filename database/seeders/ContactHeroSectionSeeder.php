<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactHeroSection;

class ContactHeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        ContactHeroSection::firstOrCreate(
            ['title' => 'Contact Us'],
            [
                'badge_text' => 'Get In Touch',
                'title' => 'Contact Us',
                'description' => "Have questions or want to collaborate? We'd love to hear from you. Reach out and let's build the future together.",
                'background_image' => null,
                'is_active' => true,
            ]
        );
    }
}
