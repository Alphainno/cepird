<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramSection;
use App\Models\ProgramItem;
use Illuminate\Http\Request;

class ProgramSectionController extends Controller
{
    /**
     * Display a listing of program sections.
     */
    public function index()
    {
        $sections = ProgramSection::with('items')->orderBy('order')->get();
        return view('admin.programs.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new section.
     */
    public function create()
    {
        $categories = \App\Models\ProgramCategory::orderBy('order')->get();
        return view('admin.programs.sections.create', compact('categories'));
    }

    /**
     * Store a newly created section.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:program_sections,slug',
            'badge_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color_theme' => 'required|in:blue,teal,amber,indigo',
            'section_id' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'program_category_id' => 'nullable|exists:program_categories,id',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? ProgramSection::max('order') + 1;

        // Generate slug from title if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Str::slug($validated['title']);
        }

        // Generate section_id from title if not provided
        if (empty($validated['section_id'])) {
            $validated['section_id'] = $validated['slug'];
        }

        ProgramSection::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program section created successfully!']);
        }

        return redirect()->route('admin.program-sections.index')->with('success', 'Program section created successfully!');
    }

    /**
     * Display the specified section.
     */
    public function show(ProgramSection $section)
    {
        $section->load('items');
        return view('admin.programs.sections.show', compact('section'));
    }

    /**
     * Show the form for editing the specified section.
     */
    public function edit(ProgramSection $section)
    {
        $categories = \App\Models\ProgramCategory::orderBy('order')->get();
        return view('admin.programs.sections.edit', compact('section', 'categories'));
    }

    /**
     * Update the specified section.
     */
    public function update(Request $request, ProgramSection $section)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:program_sections,slug,' . $section->id,
            'badge_text' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'color_theme' => 'required|in:blue,teal,amber,indigo',
            'section_id' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
            'program_category_id' => 'nullable|exists:program_categories,id',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Generate slug from title if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Str::slug($validated['title']);
        }

        // Generate section_id from title if not provided
        if (empty($validated['section_id'])) {
            $validated['section_id'] = $validated['slug'];
        }

        $section->update($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program section updated successfully!']);
        }

        return redirect()->route('admin.program-sections.index')->with('success', 'Program section updated successfully!');
    }

    /**
     * Remove the specified section.
     */
    public function destroy(Request $request, ProgramSection $section)
    {
        $section->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program section deleted successfully!']);
        }

        return redirect()->route('admin.program-sections.index')->with('success', 'Program section deleted successfully!');
    }

    // =====================
    // PROGRAM ITEMS METHODS
    // =====================

    /**
     * Show the form for creating a new item.
     */
    public function createItem(ProgramSection $section)
    {
        return view('admin.programs.items.create', compact('section'));
    }

    /**
     * Store a newly created item.
     */
    public function storeItem(Request $request, ProgramSection $section)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'features_title' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'info_label' => 'nullable|string|max:255',
            'info_value' => 'nullable|string|max:255',
            'metadata_keys' => 'nullable|array',
            'metadata_keys.*' => 'string',
            'metadata_values' => 'nullable|array',
            'metadata_values.*' => 'string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['program_section_id'] = $section->id;
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? ProgramItem::where('program_section_id', $section->id)->max('order') + 1;
        $validated['features_title'] = $validated['features_title'] ?? 'Key Features:';

        // Filter out empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], fn($f) => !empty(trim($f)));
            $validated['features'] = array_values($validated['features']);
        }

        // Build metadata from keys and values
        $metadata = [];
        if (!empty($request->metadata_keys) && !empty($request->metadata_values)) {
            foreach ($request->metadata_keys as $index => $key) {
                if (!empty($key) && isset($request->metadata_values[$index]) && !empty($request->metadata_values[$index])) {
                    $metadata[$key] = $request->metadata_values[$index];
                }
            }
        }
        $validated['metadata'] = !empty($metadata) ? $metadata : null;

        // Remove temporary fields
        unset($validated['metadata_keys'], $validated['metadata_values']);

        ProgramItem::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program item created successfully!']);
        }

        return redirect()->route('admin.program-sections.show', $validated['program_section_id'])->with('success', 'Program item created successfully!');
    }

    /**
     * Show the form for editing the specified item.
     */
    public function editItem(ProgramItem $item)
    {
        $item->load('section');
        return view('admin.programs.items.edit', compact('item'));
    }

    /**
     * Update the specified item.
     */
    public function updateItem(Request $request, ProgramItem $item)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'features_title' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'info_label' => 'nullable|string|max:255',
            'info_value' => 'nullable|string|max:255',
            'metadata_keys' => 'nullable|array',
            'metadata_keys.*' => 'string',
            'metadata_values' => 'nullable|array',
            'metadata_values.*' => 'string',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['features_title'] = $validated['features_title'] ?? 'Key Features:';

        // Filter out empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], fn($f) => !empty(trim($f)));
            $validated['features'] = array_values($validated['features']);
        }

        // Build metadata from keys and values
        $metadata = [];
        if (!empty($request->metadata_keys) && !empty($request->metadata_values)) {
            foreach ($request->metadata_keys as $index => $key) {
                if (!empty($key) && isset($request->metadata_values[$index]) && !empty($request->metadata_values[$index])) {
                    $metadata[$key] = $request->metadata_values[$index];
                }
            }
        }
        $validated['metadata'] = !empty($metadata) ? $metadata : null;

        // Remove temporary fields
        unset($validated['metadata_keys'], $validated['metadata_values']);

        $item->update($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program item updated successfully!']);
        }

        return redirect()->route('admin.program-sections.show', $item->program_section_id)->with('success', 'Program item updated successfully!');
    }

    /**
     * Remove the specified item.
     */
    public function destroyItem(Request $request, ProgramItem $item)
    {
        $sectionId = $item->program_section_id;
        $item->delete();

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Program item deleted successfully!']);
        }

        return redirect()->route('admin.program-sections.show', $sectionId)->with('success', 'Program item deleted successfully!');
    }
}
