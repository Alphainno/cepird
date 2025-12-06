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
                'route_name' => 'home',
                'sort_order' => 1,
            ],
            [
                'title' => 'About',
                'route_name' => 'about',
                'sort_order' => 2,
            ],
            [
                'title' => 'Focus Areas',
                'route_name' => 'focus-areas',
                'sort_order' => 3,
            ],
            [
                'title' => 'Programs',
                'route_name' => 'programs',
                'sort_order' => 4,
            ],
            [
                'title' => 'Founder',
                'route_name' => 'founder',
                'sort_order' => 5,
            ],
            [
                'title' => 'Contact Us',
                'route_name' => 'contact',
                'sort_order' => 6,
            ],
        ];

        foreach ($menuItems as $item) {
            MenuItem::create($item);
        }
    }
}
