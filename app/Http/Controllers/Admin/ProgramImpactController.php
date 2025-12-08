<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramImpactSection;
use App\Models\ProgramImpactStat;
use Illuminate\Http\Request;

class ProgramImpactController extends Controller
{
    /**
     * Display a listing of impact stats.
     */
    public function index()
    {
        $section = ProgramImpactSection::first();
        $stats = ProgramImpactStat::orderBy('order')->get();
        return view('admin.programs.impact.index', compact('section', 'stats'));
    }

    /**
     * Update the section header.
     */
    public function updateSection(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $section = ProgramImpactSection::first();
        if ($section) {
            $section->update($validated);
        } else {
            ProgramImpactSection::create($validated);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Section updated successfully!']);
        }

        return redirect()->route('admin.program-impact.index')->with('success', 'Section updated successfully!');
    }

    /**
     * Show the form for creating a new stat.
     */
    public function create()
    {
        return view('admin.programs.impact.create');
    }

    /**
     * Store a newly created stat.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'color_theme' => 'required|in:blue,teal,amber,indigo',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? ProgramImpactStat::max('order') + 1;

        ProgramImpactStat::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Impact stat created successfully!']);
        }

        return redirect()->route('admin.program-impact.index')->with('success', 'Impact stat created successfully!');
    }

    /**
     * Show the form for editing the specified stat.
     */
    public function edit(ProgramImpactStat $stat)
    {
        return view('admin.programs.impact.edit', compact('stat'));
    }

    /**
     * Update the specified stat.
     */
    public function update(Request $request, ProgramImpactStat $stat)
    {
        $validated = $request->validate([
            'value' => 'required|string|max:255',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'color_theme' => 'required|in:blue,teal,amber,indigo',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $stat->update($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Impact stat updated successfully!']);
        }

        return redirect()->route('admin.program-impact.index')->with('success', 'Impact stat updated successfully!');
    }

    /**
     * Remove the specified stat.
     */
    public function destroy(Request $request, ProgramImpactStat $stat)
    {
        $stat->delete();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Impact stat deleted successfully!']);
        }

        return redirect()->route('admin.program-impact.index')->with('success', 'Impact stat deleted successfully!');
    }
}

