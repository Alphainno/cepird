<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMapSection;

class ContactMapSectionSeeder extends Seeder
{
    public function run(): void
    {
        ContactMapSection::firstOrCreate(
            ['section_title' => 'Find Us Here'],
            [
                'section_badge' => 'Our Location',
                'section_title' => 'Find Us Here',
                'section_description' => 'Visit our office in Dhaka to meet our team and discuss opportunities in person.',
                'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.2089949619437!2d90.38283287536858!3d23.751619078660695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b0c3e0e6a5%3A0x5f9b5a9b0c8b7a9a!2sLake%20Circus%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1701700000000!5m2!1sen!2sbd',
                'is_active' => true,
            ]
        );
    }
}
