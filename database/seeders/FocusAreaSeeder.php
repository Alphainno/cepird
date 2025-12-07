<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FocusAreaSection;
use App\Models\FocusArea;

class FocusAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $focusAreaSection = FocusAreaSection::create([
            'badge_text' => 'What We Focus On',
            'title' => 'Core Focus Areas',
            'subtitle' => 'Driving meaningful change at the intersection of research, innovation, and policy',
            'quote' => 'Ideas create progress — but policies turn progress into national prosperity.',
            'is_active' => true,
        ]);

        $focusAreas = [
            [
                'slug' => 'policy-development',
                'subheading' => 'Focus Area 1',
                'icon' => '📋',
                'title' => 'Policy Development',
                'description' => 'Evidence-based frameworks strengthening entrepreneurship and digital transformation.',
                'detail_description' => 'CEPIRD designs evidence-based policy frameworks that strengthen entrepreneurship ecosystems, accelerate digital transformation, and foster sustainable economic growth in Bangladesh.',
                'image_path' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80',
                'cta_text' => 'Explore Policy Research',
                'cta_link' => '#policy-development',
                'highlight1_icon' => '📈',
                'highlight1_title' => 'Digital Commerce Framework',
                'highlight1_description' => 'Policies supporting e-commerce growth and digital payment systems',
                'highlight2_icon' => '🤝',
                'highlight2_title' => 'SME Empowerment Policies',
                'highlight2_description' => 'Frameworks ensuring small and medium enterprises can thrive and scale',
                'highlight3_icon' => '🌱',
                'highlight3_title' => 'Startup Ecosystem Support',
                'highlight3_description' => 'Policy interventions creating favorable conditions for startup growth',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'slug' => 'technology-innovation',
                'subheading' => 'Focus Area 2',
                'icon' => '💡',
                'title' => 'Technology Innovation',
                'description' => 'Promoting digital adoption and tech-driven solutions for emerging industries.',
                'detail_description' => 'We champion digital adoption and tech-driven solutions that enable entrepreneurs to compete globally while solving local challenges through innovation.',
                'image_path' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&auto=format&fit=crop&q=80',
                'cta_text' => 'Explore Tech Initiatives',
                'cta_link' => '#technology-innovation',
                'highlight1_icon' => '🤖',
                'highlight1_title' => 'AI & Machine Learning',
                'highlight1_description' => 'Integrating AI solutions for business optimization and innovation',
                'highlight2_icon' => '⛓️',
                'highlight2_title' => 'Blockchain Technology',
                'highlight2_description' => 'Exploring blockchain for transparency, security, and trust',
                'highlight3_icon' => '💻',
                'highlight3_title' => 'Digital Skills Training',
                'highlight3_description' => 'Upskilling the workforce for future-ready tech careers',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'slug' => 'research',
                'subheading' => 'Focus Area 3',
                'icon' => '📊',
                'title' => 'Research',
                'description' => 'In-depth studies guiding policymakers, institutions, and entrepreneurs.',
                'detail_description' => 'Our rigorous research initiatives generate evidence-based insights that inform policy decisions, guide institutional strategies, and drive entrepreneurial innovation across Bangladesh.',
                'image_path' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&auto=format&fit=crop&q=80',
                'cta_text' => 'Explore Publications',
                'cta_link' => '#research',
                'highlight1_icon' => '📚',
                'highlight1_title' => 'Annual Policy Reports',
                'highlight1_description' => 'Comprehensive entrepreneurship policy analysis and recommendations',
                'highlight2_icon' => '📊',
                'highlight2_title' => 'Ecosystem Index',
                'highlight2_description' => 'Measuring startup ecosystem maturity and identifying growth opportunities',
                'highlight3_icon' => '🎯',
                'highlight3_title' => 'Impact Studies',
                'highlight3_description' => 'Evaluating socio-economic impact of entrepreneurship initiatives',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'slug' => 'entrepreneurship-support',
                'subheading' => 'Focus Area 4',
                'icon' => '🚀',
                'title' => 'Entrepreneurship',
                'description' => 'Empowering startups through training, mentorship, and ecosystem development.',
                'detail_description' => 'We empower entrepreneurs and innovators with comprehensive support services including mentorship, training, incubation, and ecosystem connectivity to transform ideas into thriving ventures.',
                'image_path' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80',
                'cta_text' => 'Explore Support Programs',
                'cta_link' => '#entrepreneurship-support',
                'highlight1_icon' => '🎓',
                'highlight1_title' => 'Entrepreneurship Training',
                'highlight1_description' => 'Business model, finance, and leadership development programs',
                'highlight2_icon' => '🏢',
                'highlight2_title' => 'Incubation Programs',
                'highlight2_description' => 'Structured support from ideation to market launch and beyond',
                'highlight3_icon' => '🤝',
                'highlight3_title' => 'Mentorship & Networking',
                'highlight3_description' => 'Connecting entrepreneurs with industry experts and investors',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($focusAreas as $focusArea) {
            $focusArea['focus_area_section_id'] = $focusAreaSection->id;
            FocusArea::create($focusArea);
        }
    }
}
