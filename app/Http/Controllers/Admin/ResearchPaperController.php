<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchPaper;
use App\Models\ResearchCategory;
use Illuminate\Http\Request;

class ResearchPaperController extends Controller
{
    /**
     * Display a listing of research papers
     */
    public function index()
    {
        $papers = ResearchPaper::with('category')
                              ->orderBy('publication_date', 'desc')
                              ->paginate(20);

        return view('admin.research-papers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new research paper
     */
    public function create()
    {
        $categories = ResearchCategory::where('is_active', true)
                                     ->orderBy('order')
                                     ->get();

        return view('admin.research-papers.create', compact('categories'));
    }

    /**
     * Store a newly created research paper
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:research_categories,id',
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'description' => 'required|string',
            'publication_date' => 'required|date',
            'pages' => 'nullable|integer|min:1',
            'citations' => 'nullable|integer|min:0',
            'tags' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'icon_color' => 'required|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Convert tags string to array
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $request->file('pdf_file')->move(public_path('storage/research-papers'), $fileName);
            $validated['pdf_file'] = 'research-papers/' . $fileName;
        }

        ResearchPaper::create($validated);

        return redirect()->route('admin.research-papers.index')
                        ->with('success', 'Research paper created successfully!');
    }

    /**
     * Show the form for editing the specified research paper
     */
    public function edit(ResearchPaper $paper)
    {
        $categories = ResearchCategory::where('is_active', true)
                                     ->orderBy('order')
                                     ->get();

        return view('admin.research-papers.edit', compact('paper', 'categories'));
    }

    /**
     * Update the specified research paper
     */
    public function update(Request $request, ResearchPaper $paper)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:research_categories,id',
            'title' => 'required|string|max:255',
            'authors' => 'required|string',
            'description' => 'required|string',
            'publication_date' => 'required|date',
            'pages' => 'nullable|integer|min:1',
            'citations' => 'nullable|integer|min:0',
            'tags' => 'nullable|string',
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240',
            'icon_color' => 'required|string',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Convert tags string to array
        if (!empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            // Delete old PDF if exists
            if ($paper->pdf_file && file_exists(public_path('storage/' . $paper->pdf_file))) {
                unlink(public_path('storage/' . $paper->pdf_file));
            }

            $fileName = time() . '_' . $request->file('pdf_file')->getClientOriginalName();
            $request->file('pdf_file')->move(public_path('storage/research-papers'), $fileName);
            $validated['pdf_file'] = 'research-papers/' . $fileName;
        }

        $paper->update($validated);

        return redirect()->route('admin.research-papers.index')
                        ->with('success', 'Research paper updated successfully!');
    }

    /**
     * Remove the specified research paper
     */
    public function destroy(ResearchPaper $paper)
    {
        // Delete PDF file if exists
        if ($paper->pdf_file && file_exists(public_path('storage/' . $paper->pdf_file))) {
            unlink(public_path('storage/' . $paper->pdf_file));
        }

        $paper->delete();

        return redirect()->route('admin.research-papers.index')
                        ->with('success', 'Research paper deleted successfully!');
    }
}
