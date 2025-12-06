<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramInitiativeSection;
use App\Models\ProgramInitiative;
use App\Models\ProgramInitiativeItem;
use Illuminate\Http\Request;

class ProgramInitiativeController extends Controller
{
    /**
     * Display the program initiatives management page.
     */
    public function index()
    {
        $programSection = ProgramInitiativeSection::with(['allPrograms.allItems'])->first();

        if (!$programSection) {
            $programSection = new ProgramInitiativeSection([
                'badge_text' => 'Our Initiatives',
                'title' => 'Programs & Initiatives',
                'subtitle' => 'Transforming ideas into impact through structured programs',
                'is_active' => true,
            ]);
        }

        return view('admin.program-initiatives.index', compact('programSection'));
    }

    /**
     * Store or update the program initiatives section.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'programs' => 'required|array|min:1',
            'programs.*.title' => 'required|string|max:255',
            'programs.*.icon' => 'nullable|string|max:50',
            'programs.*.color' => 'nullable|string|max:50',
            'programs.*.items' => 'nullable|array',
            'programs.*.items.*.text' => 'required|string|max:500',
        ]);

        // Get or create section
        $programSection = ProgramInitiativeSection::first();

        if ($programSection) {
            $programSection->update([
                'badge_text' => $validated['badge_text'] ?? 'Our Initiatives',
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $request->has('is_active'),
            ]);
        } else {
            $programSection = ProgramInitiativeSection::create([
                'badge_text' => $validated['badge_text'] ?? 'Our Initiatives',
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $request->has('is_active'),
            ]);
        }

        // Get existing program IDs
        $existingProgramIds = $programSection->allPrograms()->pluck('id')->toArray();
        $submittedProgramIds = [];

        // Update or create programs
        foreach ($request->programs as $pIndex => $programData) {
            $programIsActive = isset($programData['is_active']);

            $programToSave = [
                'title' => $programData['title'],
                'icon' => $programData['icon'] ?? '📘',
                'color' => $programData['color'] ?? 'blue',
                'sort_order' => $pIndex + 1,
                'is_active' => $programIsActive,
            ];

            if (!empty($programData['id'])) {
                $program = ProgramInitiative::find($programData['id']);
                if ($program) {
                    $program->update($programToSave);
                    $submittedProgramIds[] = $program->id;
                }
            } else {
                $program = $programSection->allPrograms()->create($programToSave);
                $submittedProgramIds[] = $program->id;
            }

            // Handle items for this program
            if ($program && isset($programData['items'])) {
                $existingItemIds = $program->allItems()->pluck('id')->toArray();
                $submittedItemIds = [];

                foreach ($programData['items'] as $iIndex => $itemData) {
                    $itemIsActive = isset($itemData['is_active']);

                    $itemToSave = [
                        'text' => $itemData['text'],
                        'sort_order' => $iIndex + 1,
                        'is_active' => $itemIsActive,
                    ];

                    if (!empty($itemData['id'])) {
                        $item = ProgramInitiativeItem::find($itemData['id']);
                        if ($item) {
                            $item->update($itemToSave);
                            $submittedItemIds[] = $item->id;
                        }
                    } else {
                        $newItem = $program->allItems()->create($itemToSave);
                        $submittedItemIds[] = $newItem->id;
                    }
                }

                // Delete removed items
                $itemIdsToDelete = array_diff($existingItemIds, $submittedItemIds);
                ProgramInitiativeItem::whereIn('id', $itemIdsToDelete)->delete();
            }
        }

        // Delete removed programs
        $programIdsToDelete = array_diff($existingProgramIds, $submittedProgramIds);
        ProgramInitiative::whereIn('id', $programIdsToDelete)->delete();

        return redirect()->route('admin.program-initiatives.index')
            ->with('success', 'Programs & Initiatives section updated successfully!');
    }
}
