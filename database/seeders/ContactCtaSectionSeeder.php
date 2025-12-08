<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactCtaSection;

class ContactCtaSectionSeeder extends Seeder
{
    public function run(): void
    {
        ContactCtaSection::firstOrCreate(
            ['title' => "Let's Build the Future Together"],
            [
                'title' => "Let's Build the Future Together",
                'description' => "Whether you're looking to collaborate, contribute, or simply learn more about our initiatives, we're excited to connect with you.",
                'button_1_text' => 'Learn About Us',
                'button_1_url' => 'about',
                'button_2_text' => 'Explore Programs',
                'button_2_url' => 'programs',
                'is_active' => true,
            ]
        );
    }
}
