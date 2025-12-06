<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionSection;
use App\Models\MissionPoint;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    /**
     * Display the vision section management page
     */
    public function index()
    {
        $visionSection = VisionSection::with('allMissionPoints')->where('is_active', true)->first();

        if (!$visionSection) {
            $visionSection = new VisionSection();
            $visionSection->allMissionPoints = collect();
        }

        return view('admin.vision.index', compact('visionSection'));
    }

    /**
     * Update or create the vision section
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'vision_title' => 'required|string|max:255',
            'vision_heading' => 'required|string|max:255',
            'vision_description' => 'required|string',
            'mission_title' => 'required|string|max:255',
            'mission_points' => 'required|array|min:1',
            'mission_points.*.point' => 'required|string',
            'mission_points.*.is_active' => 'nullable',
        ]);

        $isActive = $request->has('is_active');

        // Get the active vision section or first one
        $visionSection = VisionSection::where('is_active', true)->first() ?? VisionSection::first();

        if ($visionSection) {
            $visionSection->update([
                'vision_title' => $validated['vision_title'],
                'vision_heading' => $validated['vision_heading'],
                'vision_description' => $validated['vision_description'],
                'mission_title' => $validated['mission_title'],
                'is_active' => $isActive,
            ]);
            $message = 'Vision section updated successfully!';
        } else {
            $visionSection = VisionSection::create([
                'vision_title' => $validated['vision_title'],
                'vision_heading' => $validated['vision_heading'],
                'vision_description' => $validated['vision_description'],
                'mission_title' => $validated['mission_title'],
                'is_active' => $isActive,
            ]);
            $message = 'Vision section created successfully!';
        }

        // Handle mission points
        $existingMissionPointIds = $visionSection->allMissionPoints->pluck('id')->toArray();
        $updatedMissionPointIds = [];

        foreach ($validated['mission_points'] as $index => $missionPointData) {
            $missionPointIsActive = isset($missionPointData['is_active']) && ($missionPointData['is_active'] === 'on' || $missionPointData['is_active'] === true || $missionPointData['is_active'] === '1');

            $missionPointToSave = [
                'point' => $missionPointData['point'],
                'sort_order' => $index + 1,
                'is_active' => $missionPointIsActive,
            ];

            if (isset($missionPointData['id']) && in_array($missionPointData['id'], $existingMissionPointIds)) {
                // Update existing mission point
                $missionPoint = MissionPoint::find($missionPointData['id']);
                if ($missionPoint) {
                    $missionPoint->update($missionPointToSave);
                    $updatedMissionPointIds[] = $missionPoint->id;
                }
            } else {
                // Create new mission point
                $missionPointToSave['vision_section_id'] = $visionSection->id;
                $missionPoint = MissionPoint::create($missionPointToSave);
                $updatedMissionPointIds[] = $missionPoint->id;
            }
        }

        // Delete mission points that are no longer in the form
        $missionPointsToDelete = array_diff($existingMissionPointIds, $updatedMissionPointIds);
        if (!empty($missionPointsToDelete)) {
            MissionPoint::whereIn('id', $missionPointsToDelete)->delete();
        }

        return redirect()->route('admin.vision.index')->with('success', $message);
    }
}
