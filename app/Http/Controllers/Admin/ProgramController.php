<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display the programs management page
     */
    public function index()
    {
        $programs = Program::ordered()->get()->groupBy('category');
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Store a new program
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:research,training,innovation,event',
            'link' => 'nullable|url',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        Program::create($validated);

        return redirect()->back()->with('success', 'Program created successfully.');
    }

    /**
     * Update the specified program
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|in:research,training,innovation,event',
            'link' => 'nullable|url',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $program->update($validated);

        return redirect()->back()->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified program
     */
    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->back()->with('success', 'Program deleted successfully.');
    }
}
