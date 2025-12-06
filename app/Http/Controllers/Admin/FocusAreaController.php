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
            'main_title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'focus_areas' => 'required|array|min:1',
            'focus_areas.*.title' => 'required|string|max:255',
            'focus_areas.*.description' => 'required|string',
            'focus_areas.*.icon' => 'nullable|string|max:255',
            'focus_areas.*.icon_color' => 'nullable|string|max:255',
            'focus_areas.*.is_active' => 'nullable',
        ]);

        $isActive = $request->has('is_active');

        // Get the active focus area section or first one
        $focusAreaSection = FocusAreaSection::where('is_active', true)->first() ?? FocusAreaSection::first();

        if ($focusAreaSection) {
            $focusAreaSection->update([
                'main_title' => $validated['main_title'],
                'subtitle' => $validated['subtitle'],
                'is_active' => $isActive,
            ]);
            $message = 'Focus areas section updated successfully!';
        } else {
            $focusAreaSection = FocusAreaSection::create([
                'main_title' => $validated['main_title'],
                'subtitle' => $validated['subtitle'],
                'is_active' => $isActive,
            ]);
            $message = 'Focus areas section created successfully!';
        }

        // Handle focus areas
        $existingFocusAreaIds = $focusAreaSection->allFocusAreas->pluck('id')->toArray();
        $updatedFocusAreaIds = [];

        foreach ($validated['focus_areas'] as $index => $focusAreaData) {
            $focusAreaIsActive = isset($focusAreaData['is_active']) && ($focusAreaData['is_active'] === 'on' || $focusAreaData['is_active'] === true || $focusAreaData['is_active'] === '1');

            $focusAreaToSave = [
                'title' => $focusAreaData['title'],
                'description' => $focusAreaData['description'],
                'icon' => $focusAreaData['icon'] ?? 'file-text',
                'icon_color' => $focusAreaData['icon_color'] ?? 'blue',
                'sort_order' => $index + 1,
                'is_active' => $focusAreaIsActive,
            ];

            if (isset($focusAreaData['id']) && in_array($focusAreaData['id'], $existingFocusAreaIds)) {
                // Update existing focus area
                $focusArea = FocusArea::find($focusAreaData['id']);
                if ($focusArea) {
                    $focusArea->update($focusAreaToSave);
                    $updatedFocusAreaIds[] = $focusArea->id;
                }
            } else {
                // Create new focus area
                $focusAreaToSave['focus_area_section_id'] = $focusAreaSection->id;
                $focusArea = FocusArea::create($focusAreaToSave);
                $updatedFocusAreaIds[] = $focusArea->id;
            }
        }

        // Delete focus areas that are no longer in the form
        $focusAreasToDelete = array_diff($existingFocusAreaIds, $updatedFocusAreaIds);
        if (!empty($focusAreasToDelete)) {
            FocusArea::whereIn('id', $focusAreasToDelete)->delete();
        }

        return redirect()->route('admin.focus-areas.index')->with('success', $message);
    }
}
