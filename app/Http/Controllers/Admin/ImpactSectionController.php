<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactSection;
use Illuminate\Http\Request;

class ImpactSectionController extends Controller
{
    public function index()
    {
        // Ensure a record always exists so defaults (seeded or created) are shown in the form
        $section = ImpactSection::firstOrCreate([], [
            'badge_text' => 'Our Impact',
            'title' => 'Driving Change Across Bangladesh',
            'is_active' => true,
        ]);

        // If a blank row was created earlier, backfill it with defaults so preview is visible
        if (!$section->badge_text || !$section->title) {
            $section->update([
                'badge_text' => $section->badge_text ?: 'Our Impact',
                'title' => $section->title ?: 'Driving Change Across Bangladesh',
                'is_active' => $section->is_active ?? true,
            ]);
        }
        return view('admin.focus-areas.impact-section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $section = ImpactSection::first();
        if (!$section) {
            $section = new ImpactSection();
        }

        $section->update([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->back()->with('success', 'Section updated successfully.');
    }
}