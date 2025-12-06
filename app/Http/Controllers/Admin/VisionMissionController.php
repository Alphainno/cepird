<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMissionSection;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    /**
     * Display the vision mission section management page.
     */
    public function index()
    {
        $visionMission = VisionMissionSection::first() ?? new VisionMissionSection();

        return view('admin.vision-mission.index', compact('visionMission'));
    }

    /**
     * Store or update the vision mission section.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'vision_icon' => 'nullable|string|max:10',
            'vision_title' => 'required|string|max:255',
            'vision_paragraph1' => 'nullable|string',
            'vision_paragraph2' => 'nullable|string',
            'mission_icon' => 'nullable|string|max:10',
            'mission_title' => 'required|string|max:255',
            'mission_point1' => 'nullable|string',
            'mission_point2' => 'nullable|string',
            'mission_point3' => 'nullable|string',
            'mission_point4' => 'nullable|string',
            'mission_point5' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $visionMission = VisionMissionSection::first();

        if ($visionMission) {
            $visionMission->update($validated);
        } else {
            VisionMissionSection::create($validated);
        }

        return redirect()->route('admin.vision-mission.index')
            ->with('success', 'Vision & Mission section updated successfully!');
    }
}
