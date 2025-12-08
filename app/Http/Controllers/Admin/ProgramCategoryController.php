<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramCategory;
use Illuminate\Http\Request;

class ProgramCategoryController extends Controller
{
    public function index()
    {
        $categories = ProgramCategory::orderBy('order')->get();
        return view('admin.programs.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'color' => 'required|in:blue,teal,amber,indigo',
            'anchor_link' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        ProgramCategory::create($validated);

        return redirect()->route('admin.program-categories.index')
            ->with('success', 'Program category created successfully.');
    }

    public function update(Request $request, ProgramCategory $programCategory)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:50',
            'color' => 'required|in:blue,teal,amber,indigo',
            'anchor_link' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        $programCategory->update($validated);

        return redirect()->route('admin.program-categories.index')
            ->with('success', 'Program category updated successfully.');
    }

    public function destroy(ProgramCategory $programCategory)
    {
        $programCategory->delete();

        return redirect()->route('admin.program-categories.index')
            ->with('success', 'Program category deleted successfully.');
    }
}
