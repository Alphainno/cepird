<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramOverviewSection;
use Illuminate\Http\Request;

class ProgramOverviewSectionController extends Controller
{
    public function index()
    {
        $overviewSection = ProgramOverviewSection::first();
        return view('admin.programs.overview', compact('overviewSection'));
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'badge_text' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'is_active' => 'boolean',
            ]);

            $overviewSection = ProgramOverviewSection::first();

            if ($overviewSection) {
                $overviewSection->update($validated);
            } else {
                ProgramOverviewSection::create($validated);
            }

            // Check if it's an AJAX request
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Program overview section updated successfully!'
                ]);
            }

            return redirect()->route('admin.program-overview.index');
        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $e->errors()
                ], 422);
            }
            throw $e;
        }
    }
}
