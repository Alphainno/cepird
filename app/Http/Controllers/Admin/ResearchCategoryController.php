<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResearchCategory;
use Illuminate\Http\Request;

class ResearchCategoryController extends Controller
{
    /**
     * Display a listing of research categories
     */
    public function index()
    {
        $categories = ResearchCategory::withCount('papers')
                                     ->orderBy('order')
                                     ->get();

        return view('admin.research-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.research-categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        ResearchCategory::create($validated);

        return redirect()->route('admin.research-categories.index')
                        ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing the specified category
     */
    public function edit(ResearchCategory $category)
    {
        return view('admin.research-categories.edit', compact('category'));
    }

    /**
     * Update the specified category
     */
    public function update(Request $request, ResearchCategory $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'required|string',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $category->update($validated);

        return redirect()->route('admin.research-categories.index')
                        ->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category
     */
    public function destroy(ResearchCategory $category)
    {
        // Check if category has papers
        if ($category->papers()->count() > 0) {
            return redirect()->route('admin.research-categories.index')
                           ->with('error', 'Cannot delete category with associated papers!');
        }

        $category->delete();

        return redirect()->route('admin.research-categories.index')
                        ->with('success', 'Category deleted successfully!');
    }
}
