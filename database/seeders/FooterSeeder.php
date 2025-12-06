<?php

namespace Database\Seeders;

use App\Models\FooterSetting;
use App\Models\FooterLink;
use Illuminate\Database\Seeder;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create footer settings
        FooterSetting::create([
            'logo' => null,
            'brand_name' => 'CEPIRD',
            'description' => 'Center for Entrepreneurial Policy, Innovation, Research & Development.',
            'email' => 'info@cepird.org',
            'phone' => '+880 1700-000000',
            'address' => 'Dhaka, Bangladesh',
            'facebook_url' => null,
            'twitter_url' => null,
            'linkedin_url' => null,
            'instagram_url' => null,
            'youtube_url' => null,
            'copyright_text' => '© ' . date('Y') . ' CEPIRD. All rights reserved.',
            'show_newsletter' => true,
            'newsletter_title' => 'Newsletter',
            'is_active' => true,
        ]);

        // Create quick links
        $quickLinks = [
            ['title' => 'About Us', 'url' => '/about', 'sort_order' => 1],
            ['title' => 'Research Library', 'url' => '/research', 'sort_order' => 2],
            ['title' => 'Events Calendar', 'url' => '/events', 'sort_order' => 3],
            ['title' => 'Membership', 'url' => '/membership', 'sort_order' => 4],
        ];

        foreach ($quickLinks as $link) {
            FooterLink::create(array_merge($link, ['section' => 'quick_links']));
        }

        // Create legal links
        $legalLinks = [
            ['title' => 'Privacy Policy', 'url' => '/privacy-policy', 'sort_order' => 1],
            ['title' => 'Terms of Service', 'url' => '/terms-of-service', 'sort_order' => 2],
        ];

        foreach ($legalLinks as $link) {
            FooterLink::create(array_merge($link, ['section' => 'legal']));
        }
    }
}
