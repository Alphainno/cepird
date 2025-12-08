<?php

namespace Database\Seeders;

use App\Models\HeaderSetting;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create header settings
        HeaderSetting::create([
            'logo' => null,
            'brand_name' => 'CEPIRD',
            'tagline' => 'Innovate. Lead. Inspire.',
            'show_tagline' => true,
            'is_active' => true,
        ]);

        // Create menu items
        $menuItems = [
            [
                'title' => 'Home',
                'url' => '/',
                'sort_order' => 1,
            ],
            [
                'title' => 'About',
                'url' => '/about',
                'sort_order' => 2,
            ],
            [
                'title' => 'Focus Areas',
                'url' => '/focus-areas',
                'sort_order' => 3,
            ],
            [
                'title' => 'Programs',
                'url' => '/programs',
                'sort_order' => 4,
            ],
            [
                'title' => 'Research',
                'url' => '/research',
                'sort_order' => 5,
            ],
         
            [
                'title' => 'Contact Us',
                'url' => '/contact',
                'sort_order' => 7,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
