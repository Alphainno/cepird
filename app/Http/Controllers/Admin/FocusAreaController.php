<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusAreaSection;
use App\Models\FocusArea;
use Illuminate\Http\Request;

class FocusAreaController extends Controller
{
    /**
     * Display the focus area section management page
     */
    public function index()
    {
        $focusAreaSection = FocusAreaSection::with('allFocusAreas')->where('is_active', true)->first();

        if (!$focusAreaSection) {
            $focusAreaSection = new FocusAreaSection();
            $focusAreaSection->allFocusAreas = collect();
        }

        return view('admin.focus-areas.index', compact('focusAreaSection'));
    }

    /**
     * Update or create the focus area section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'quote' => 'nullable|string',
            'focus_areas' => 'nullable|array',
            'focus_areas.*.title' => 'required|string|max:255',
            'focus_areas.*.description' => 'required|string',
            'focus_areas.*.slug' => 'nullable|string|max:255',
            'focus_areas.*.subheading' => 'nullable|string|max:255',
            'focus_areas.*.detail_description' => 'nullable|string',
            'focus_areas.*.cta_text' => 'nullable|string|max:255',
            'focus_areas.*.cta_link' => 'nullable|string|max:255',
            'focus_areas.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'focus_areas.*.image_url' => 'nullable|string|max:255',
            'focus_areas.*.highlight1_icon' => 'nullable|string|max:255',
            'focus_areas.*.highlight1_title' => 'nullable|string|max:255',
            'focus_areas.*.highlight1_description' => 'nullable|string',
            'focus_areas.*.highlight2_icon' => 'nullable|string|max:255',
            'focus_areas.*.highlight2_title' => 'nullable|string|max:255',
            'focus_areas.*.highlight2_description' => 'nullable|string',
            'focus_areas.*.highlight3_icon' => 'nullable|string|max:255',
            'focus_areas.*.highlight3_title' => 'nullable|string|max:255',
            'focus_areas.*.highlight3_description' => 'nullable|string',
            'focus_areas.*.icon' => 'nullable|string|max:255',
            'focus_areas.*.is_active' => 'nullable',
        ]);

        $isActive = $request->has('is_active');

        // Get or create the focus area section
        $focusAreaSection = FocusAreaSection::where('is_active', true)->first();

        if ($focusAreaSection) {
            $focusAreaSection->update([
                'badge_text' => $validated['badge_text'] ?? null,
                'title' => $validated['title'] ?? 'Core Focus Areas',
                'subtitle' => $validated['subtitle'] ?? null,
                'quote' => $validated['quote'] ?? null,
                'is_active' => $isActive,
            ]);
            $message = 'Focus areas section updated successfully!';
        } else {
            $focusAreaSection = FocusAreaSection::create([
                'badge_text' => $validated['badge_text'] ?? null,
                'title' => $validated['title'] ?? 'Core Focus Areas',
                'subtitle' => $validated['subtitle'] ?? null,
                'quote' => $validated['quote'] ?? null,
                'is_active' => $isActive,
            ]);
            $message = 'Focus areas section created successfully!';
        }

        // Handle focus areas - Only create new ones, don't delete existing ones
        if (!empty($validated['focus_areas'])) {
            foreach ($validated['focus_areas'] as $index => $focusAreaData) {
                $focusAreaIsActive = isset($focusAreaData['is_active']) && ($focusAreaData['is_active'] === 'on' || $focusAreaData['is_active'] === true || $focusAreaData['is_active'] === '1');

            // Handle image upload
            $imagePath = null;
            if ($request->hasFile("focus_areas.{$index}.image")) {
                $image = $request->file("focus_areas.{$index}.image");
                $imageName = time() . '_' . $index . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('focus_areas', $imageName, 'public');
            } elseif (!empty($focusAreaData['image_url'])) {
                $imagePath = $focusAreaData['image_url'];
            }

            $focusAreaToSave = [
                'slug' => $focusAreaData['slug'] ?? null,
                'title' => $focusAreaData['title'],
                'subheading' => $focusAreaData['subheading'] ?? null,
                'description' => $focusAreaData['description'],
                'icon' => $focusAreaData['icon'] ?? '📋',
                'detail_description' => $focusAreaData['detail_description'] ?? null,
                'image_path' => $imagePath,
                'cta_text' => $focusAreaData['cta_text'] ?? null,
                'cta_link' => $focusAreaData['cta_link'] ?? null,
                'highlight1_icon' => $focusAreaData['highlight1_icon'] ?? null,
                'highlight1_title' => $focusAreaData['highlight1_title'] ?? null,
                'highlight1_description' => $focusAreaData['highlight1_description'] ?? null,
                'highlight2_icon' => $focusAreaData['highlight2_icon'] ?? null,
                'highlight2_title' => $focusAreaData['highlight2_title'] ?? null,
                'highlight2_description' => $focusAreaData['highlight2_description'] ?? null,
                'highlight3_icon' => $focusAreaData['highlight3_icon'] ?? null,
                'highlight3_title' => $focusAreaData['highlight3_title'] ?? null,
                'highlight3_description' => $focusAreaData['highlight3_description'] ?? null,
                'sort_order' => $index + 1 + $focusAreaSection->allFocusAreas->count(),
                'is_active' => $focusAreaIsActive,
            ];

            // Only create new focus areas from the main form
            $focusAreaToSave['focus_area_section_id'] = $focusAreaSection->id;
            FocusArea::create($focusAreaToSave);
        }
        }

        return redirect()->route('admin.focus-areas.index')->with('success', $message);
    }

    /**
     * Update a specific focus area
     */
    public function updateFocusArea(Request $request, FocusArea $focusArea)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'slug' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'detail_description' => 'nullable|string',
            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_url' => 'nullable|string|max:255',
            'highlight1_icon' => 'nullable|string|max:255',
            'highlight1_title' => 'nullable|string|max:255',
            'highlight1_description' => 'nullable|string',
            'highlight2_icon' => 'nullable|string|max:255',
            'highlight2_title' => 'nullable|string|max:255',
            'highlight2_description' => 'nullable|string',
            'highlight3_icon' => 'nullable|string|max:255',
            'highlight3_title' => 'nullable|string|max:255',
            'highlight3_description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'is_active' => 'nullable',
        ]);

        $isActive = $request->has('is_active');

        // Handle image upload
        $imagePath = $focusArea->image_path;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('focus_areas', $imageName, 'public');

            // Delete old image if it exists and is stored locally
            if ($focusArea->image_path && !filter_var($focusArea->image_path, FILTER_VALIDATE_URL)) {
                \Storage::disk('public')->delete($focusArea->image_path);
            }
        } elseif ($request->filled('image_url')) {
            $imagePath = $validated['image_url'];
        }

        $focusArea->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'slug' => $validated['slug'],
            'subheading' => $validated['subheading'],
            'detail_description' => $validated['detail_description'],
            'cta_text' => $validated['cta_text'],
            'cta_link' => $validated['cta_link'],
            'image_path' => $imagePath,
            'highlight1_icon' => $validated['highlight1_icon'],
            'highlight1_title' => $validated['highlight1_title'],
            'highlight1_description' => $validated['highlight1_description'],
            'highlight2_icon' => $validated['highlight2_icon'],
            'highlight2_title' => $validated['highlight2_title'],
            'highlight2_description' => $validated['highlight2_description'],
            'highlight3_icon' => $validated['highlight3_icon'],
            'highlight3_title' => $validated['highlight3_title'],
            'highlight3_description' => $validated['highlight3_description'],
            'icon' => $validated['icon'],
            'is_active' => $isActive,
        ]);

        return redirect()->route('admin.focus-areas.index')->with('success', 'Focus area updated successfully!');
    }
}
