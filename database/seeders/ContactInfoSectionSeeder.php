<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfoSection;

class ContactInfoSectionSeeder extends Seeder
{
    public function run(): void
    {
        ContactInfoSection::firstOrCreate(
            ['section_title' => 'Contact Information'],
            [
                'section_badge' => 'Reach Out',
                'section_title' => 'Contact Information',
                'section_description' => "Whether you're a researcher, entrepreneur, policymaker, or innovator — we're here to connect, collaborate, and create impact together.",
                'office_title' => 'Head Office',
                'office_address' => "50 Lake Circus, Kalabagan\nDhaka 1209, Bangladesh",
                'email_title' => 'Email',
                'email' => 'hello.cepird@gmail.com',
                'email_subtitle' => "We'll respond within 24-48 hours",
                'phone_title' => 'Phone',
                'phone' => '+880-1776000008',
                'phone_subtitle' => 'Sun - Thu, 9:00 AM - 6:00 PM (BST)',
                'website_title' => 'Website',
                'website' => 'https://www.cepird.com',
                'website_subtitle' => 'Visit our website for more information',
                'form_title' => 'Send Us a Message',
                'form_description' => "Fill out the form below and we'll get back to you as soon as possible.",
                'is_active' => true,
            ]
        );
    }
}
