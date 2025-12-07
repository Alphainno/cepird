<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusAreaOutcome;
use Illuminate\Http\Request;

class FocusAreaOutcomeController extends Controller
{
    public function index()
    {
        $outcomes = FocusAreaOutcome::ordered()->get();

        // Auto-seed defaults if table is empty so the admin screen previews data
        if ($outcomes->isEmpty()) {
            $defaults = [
                [
                    'title' => 'Policy Frameworks',
                    'icon' => '📋',
                    'description' => 'Actionable policy recommendations for government and institutions',
                    'bullet1' => 'Digital Transformation Strategy',
                    'bullet2' => 'Startup Ecosystem Policy',
                    'bullet3' => 'SME Development Guidelines',
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'Research Outputs',
                    'icon' => '📑',
                    'description' => 'Evidence-based insights and publications',
                    'bullet1' => 'Ecosystem Landscape Reports',
                    'bullet2' => 'Innovation Policy Briefs',
                    'bullet3' => 'Impact Measurement Studies',
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => 'Startup Support',
                    'icon' => '🚀',
                    'description' => 'Hands-on support for founders and teams',
                    'bullet1' => 'Mentorship & Clinics',
                    'bullet2' => 'Acceleration Readiness',
                    'bullet3' => 'Market & Investor Links',
                    'sort_order' => 3,
                    'is_active' => true,
                ],
                [
                    'title' => 'Capacity Building',
                    'icon' => '🎯',
                    'description' => 'Skills and institutional capability development',
                    'bullet1' => 'Policy & Program Design',
                    'bullet2' => 'Innovation Management',
                    'bullet3' => 'Digital Transformation Readiness',
                    'sort_order' => 4,
                    'is_active' => true,
                ],
            ];

            foreach ($defaults as $data) {
                FocusAreaOutcome::create($data);
            }

            $outcomes = FocusAreaOutcome::ordered()->get();
        }

        return view('admin.focus-areas.outcomes', compact('outcomes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'bullet1' => 'nullable|string|max:255',
            'bullet2' => 'nullable|string|max:255',
            'bullet3' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:1',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? (FocusAreaOutcome::max('sort_order') + 1);

        FocusAreaOutcome::create($validated);

        return redirect()->route('admin.focus-area-outcomes.index')->with('success', 'Outcome created successfully.');
    }

    public function update(Request $request, FocusAreaOutcome $focusAreaOutcome)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'bullet1' => 'nullable|string|max:255',
            'bullet2' => 'nullable|string|max:255',
            'bullet3' => 'nullable|string|max:255',
            'sort_order' => 'required|integer|min:1',
            'is_active' => 'nullable',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $focusAreaOutcome->update($validated);

        return redirect()->route('admin.focus-area-outcomes.index')->with('success', 'Outcome updated successfully.');
    }
}
