<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusAreaOutcomeSection;
use Illuminate\Http\Request;

class FocusAreaOutcomeSectionController extends Controller
{
    public function index()
    {
        // Ensure a record always exists so defaults (seeded or created) are shown in the form
        $section = FocusAreaOutcomeSection::firstOrCreate([], [
            'badge_text' => 'Key Outcomes',
            'title' => 'What We Deliver',
            'description' => 'Our focus areas translate into concrete deliverables that drive real impact across Bangladesh\'s entrepreneurial ecosystem.',
            'is_active' => true,
        ]);

        // If a blank row was created earlier, backfill it with defaults so preview is visible
        if (!$section->badge_text || !$section->title || !$section->description) {
            $section->update([
                'badge_text' => $section->badge_text ?: 'Key Outcomes',
                'title' => $section->title ?: 'What We Deliver',
                'description' => $section->description ?: 'Our focus areas translate into concrete deliverables that drive real impact across Bangladesh\'s entrepreneurial ecosystem.',
                'is_active' => $section->is_active ?? true,
            ]);
        }
        return view('admin.focus-areas.outcome-section', compact('section'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $section = FocusAreaOutcomeSection::first();
        if (!$section) {
            $section = new FocusAreaOutcomeSection();
        }

        $section->update([
            'badge_text' => $request->badge_text,
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->back()->with('success', 'Section updated successfully.');
    }
}
