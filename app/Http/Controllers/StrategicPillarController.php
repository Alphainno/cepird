<?php

namespace App\Http\Controllers;

use App\Models\StrategicPillar;
use Illuminate\Http\Request;

class StrategicPillarController extends Controller
{
    public function index()
    {
        $strategicPillars = StrategicPillar::ordered()->get();
        return view('admin.strategic-pillars.index', compact('strategicPillars'));
    }

    public function update(Request $request, StrategicPillar $strategicPillar)
    {
        // Check if this is a section header update or full pillar update
        if ($request->has(['title', 'description', 'icon', 'color_theme', 'link_href', 'sort_order'])) {
            // Full pillar update
            $validated = $request->validate([
                'badge_text' => 'required|string|max:255',
                'section_title' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'icon' => 'required|string|max:255',
                'color_theme' => 'required|string|max:255',
                'link_href' => 'required|string|max:255',
                'sort_order' => 'required|integer',
                'is_active' => 'boolean'
            ]);

            // Update section header fields for all pillars
            StrategicPillar::query()->update([
                'badge_text' => $validated['badge_text'],
                'section_title' => $validated['section_title']
            ]);

            // Update the specific pillar
            $strategicPillar->update([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'icon' => $validated['icon'],
                'color_theme' => $validated['color_theme'],
                'link_href' => $validated['link_href'],
                'sort_order' => $validated['sort_order'],
                'is_active' => $validated['is_active'] ?? false
            ]);

            return redirect()->route('admin.strategic-pillars.index')->with('success', 'Strategic Pillar updated successfully.');
        } else {
            // Section header only update
            $validated = $request->validate([
                'badge_text' => 'required|string|max:255',
                'section_title' => 'required|string|max:255'
            ]);

            // Update section header fields for all pillars
            StrategicPillar::query()->update([
                'badge_text' => $validated['badge_text'],
                'section_title' => $validated['section_title']
            ]);

            return redirect()->route('admin.strategic-pillars.index')->with('success', 'Section header updated successfully.');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'required|string|max:255',
            'color_theme' => 'required|string|max:255',
            'link_href' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean'
        ]);

        // Get badge_text and section_title from existing pillars or use the provided ones
        $firstPillar = StrategicPillar::first();
        if ($firstPillar) {
            $validated['badge_text'] = $firstPillar->badge_text;
            $validated['section_title'] = $firstPillar->section_title;
        }

        $validated['is_active'] = $validated['is_active'] ?? false;

        StrategicPillar::create($validated);

        return redirect()->route('admin.strategic-pillars.index')->with('success', 'Strategic Pillar created successfully.');
    }

    public function destroy(StrategicPillar $strategicPillar)
    {
        $strategicPillar->delete();
        return redirect()->route('admin.strategic-pillars.index')->with('success', 'Strategic Pillar deleted successfully.');
    }
}
