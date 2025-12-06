<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Pillar;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    /**
     * Display the about section management page
     */
    public function index()
    {
        $aboutSection = AboutSection::with('allPillars')->where('is_active', true)->first();

        if (!$aboutSection) {
            $aboutSection = new AboutSection();
            $aboutSection->allPillars = collect();
        }

        return view('admin.about.index', compact('aboutSection'));
    }

    /**
     * Update or create the about section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'main_title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'pillars' => 'required|array|min:1',
            'pillars.*.title' => 'required|string|max:255',
            'pillars.*.description' => 'required|string',
            'pillars.*.icon' => 'nullable|string|max:255',
            'pillars.*.is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $aboutSection = AboutSection::first();

        if ($aboutSection) {
            $aboutSection->update([
                'main_title' => $validated['main_title'],
                'subtitle' => $validated['subtitle'],
                'is_active' => $validated['is_active'],
            ]);
            $message = 'About section updated successfully!';
        } else {
            $aboutSection = AboutSection::create([
                'main_title' => $validated['main_title'],
                'subtitle' => $validated['subtitle'],
                'is_active' => $validated['is_active'],
            ]);
            $message = 'About section created successfully!';
        }

        // Handle pillars
        $existingPillarIds = $aboutSection->allPillars->pluck('id')->toArray();
        $updatedPillarIds = [];

        foreach ($validated['pillars'] as $index => $pillarData) {
            $pillarData['sort_order'] = $index + 1;
            $pillarData['is_active'] = isset($pillarData['is_active']) ? $pillarData['is_active'] : true;

            if (isset($pillarData['id']) && in_array($pillarData['id'], $existingPillarIds)) {
                // Update existing pillar
                $pillar = Pillar::find($pillarData['id']);
                if ($pillar) {
                    $pillar->update($pillarData);
                    $updatedPillarIds[] = $pillar->id;
                }
            } else {
                // Create new pillar
                $pillarData['about_section_id'] = $aboutSection->id;
                $pillar = Pillar::create($pillarData);
                $updatedPillarIds[] = $pillar->id;
            }
        }

        // Delete pillars that are no longer in the form
        $pillarsToDelete = array_diff($existingPillarIds, $updatedPillarIds);
        if (!empty($pillarsToDelete)) {
            Pillar::whereIn('id', $pillarsToDelete)->delete();
        }

        return redirect()->route('admin.about.index')->with('success', $message);
    }
}
