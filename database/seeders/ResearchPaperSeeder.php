<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResearchPaper;
use App\Models\ResearchCategory;

class ResearchPaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $climateChange = ResearchCategory::where('slug', 'climate-change')->first();
        $sustainability = ResearchCategory::where('slug', 'sustainability')->first();
        $policy = ResearchCategory::where('slug', 'policy')->first();
        $economic = ResearchCategory::where('slug', 'economic-development')->first();
        $environmental = ResearchCategory::where('slug', 'environmental')->first();

        $papers = [
            [
                'category_id' => $climateChange->id,
                'title' => 'Climate Adaptation Strategies for Vulnerable Communities',
                'authors' => 'Dr. Sarah Johnson, Dr. Michael Chen',
                'description' => 'This comprehensive study examines effective climate adaptation strategies implemented in vulnerable communities across developing nations, with a focus on community-led initiatives and sustainable practices.',
                'publication_date' => '2024-11-15',
                'pages' => 45,
                'citations' => 127,
                'tags' => ['Climate Change', 'Adaptation', 'Community Development'],
                'icon_color' => 'blue-900',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'category_id' => $sustainability->id,
                'title' => 'Renewable Energy Transition in Rural Areas',
                'authors' => 'Dr. Priya Sharma, Dr. James Williams',
                'description' => 'An in-depth analysis of renewable energy adoption patterns in rural communities, examining the social, economic, and environmental impacts of transitioning from traditional energy sources.',
                'publication_date' => '2024-10-22',
                'pages' => 38,
                'citations' => 89,
                'tags' => ['Renewable Energy', 'Rural Development', 'Sustainability'],
                'icon_color' => 'teal-900',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'category_id' => $policy->id,
                'title' => 'Environmental Policy Framework for Developing Nations',
                'authors' => 'Dr. Elizabeth Brown, Dr. Ahmed Hassan',
                'description' => 'This paper proposes a comprehensive environmental policy framework tailored for developing nations, addressing unique challenges and opportunities in environmental governance.',
                'publication_date' => '2024-09-18',
                'pages' => 52,
                'citations' => 156,
                'tags' => ['Policy', 'Environmental Governance', 'Development'],
                'icon_color' => 'purple-900',
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'category_id' => $economic->id,
                'title' => 'Green Economy Pathways for Sustainable Development',
                'authors' => 'Dr. Maria Rodriguez, Dr. John Smith',
                'description' => 'Exploring pathways to integrate green economy principles into national development strategies, with case studies from multiple countries demonstrating successful implementation.',
                'publication_date' => '2024-08-30',
                'pages' => 41,
                'citations' => 98,
                'tags' => ['Green Economy', 'Economic Development', 'Sustainability'],
                'icon_color' => 'blue-900',
                'is_featured' => false,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'category_id' => $environmental->id,
                'title' => 'Biodiversity Conservation in Protected Areas',
                'authors' => 'Dr. David Lee, Dr. Anna Martinez',
                'description' => 'A comprehensive assessment of biodiversity conservation efforts in protected areas, examining the effectiveness of various management approaches and community engagement strategies.',
                'publication_date' => '2024-07-12',
                'pages' => 36,
                'citations' => 74,
                'tags' => ['Biodiversity', 'Conservation', 'Protected Areas'],
                'icon_color' => 'teal-900',
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'category_id' => $climateChange->id,
                'title' => 'Urban Heat Island Mitigation Through Green Infrastructure',
                'authors' => 'Dr. Robert Taylor, Dr. Lisa Anderson',
                'description' => 'This study investigates the role of green infrastructure in mitigating urban heat island effects, presenting evidence-based recommendations for city planners and policymakers.',
                'publication_date' => '2024-06-28',
                'pages' => 33,
                'citations' => 62,
                'tags' => ['Climate Change', 'Urban Planning', 'Green Infrastructure'],
                'icon_color' => 'blue-900',
                'is_featured' => false,
                'is_active' => true,
                'order' => 6,
            ],
            [
                'category_id' => $sustainability->id,
                'title' => 'Circular Economy Models for Waste Management',
                'authors' => 'Dr. Sophie Wilson, Dr. Carlos Garcia',
                'description' => 'Examining circular economy approaches to waste management in urban centers, with practical frameworks for implementation and scaling across different contexts.',
                'publication_date' => '2024-05-15',
                'pages' => 29,
                'citations' => 51,
                'tags' => ['Circular Economy', 'Waste Management', 'Sustainability'],
                'icon_color' => 'teal-900',
                'is_featured' => false,
                'is_active' => true,
                'order' => 7,
            ],
            [
                'category_id' => $policy->id,
                'title' => 'Participatory Governance in Environmental Decision-Making',
                'authors' => 'Dr. Thomas Miller, Dr. Rachel Kim',
                'description' => 'Analysis of participatory governance mechanisms in environmental decision-making processes, highlighting successful models and lessons learned from various jurisdictions.',
                'publication_date' => '2024-04-20',
                'pages' => 44,
                'citations' => 85,
                'tags' => ['Governance', 'Participation', 'Policy'],
                'icon_color' => 'purple-900',
                'is_featured' => false,
                'is_active' => true,
                'order' => 8,
            ],
        ];

        foreach ($papers as $paper) {
            ResearchPaper::create($paper);
        }
    }
}

