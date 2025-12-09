<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchPaper;
use App\Models\ResearchCategory;
use App\Models\ProgramCategory;
use App\Models\FocusArea;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get statistics
        $stats = [
            'total_research_papers' => ResearchPaper::count(),
            'active_research_papers' => ResearchPaper::where('is_active', true)->count(),
            'research_categories' => ResearchCategory::count(),
            'program_categories' => ProgramCategory::count(),
            'focus_areas' => FocusArea::count(),
            'contact_messages' => ContactSubmission::count(),
            'unread_messages' => ContactSubmission::where('is_read', false)->count(),
        ];

        // Get recent research papers
        $recentPapers = ResearchPaper::with('category')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get recent contact messages
        $recentMessages = ContactSubmission::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Get research papers by category
        $papersByCategory = ResearchCategory::withCount('papers')
            ->orderBy('papers_count', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'stats',
            'recentPapers',
            'recentMessages',
            'papersByCategory'
        ));
    }
}
