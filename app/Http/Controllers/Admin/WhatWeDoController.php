<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatWeDoSection;
use App\Models\WhatWeDoItem;
use Illuminate\Http\Request;

class WhatWeDoController extends Controller
{
    /**
     * Display the what we do management page.
     */
    public function index()
    {
        $whatWeDoSection = WhatWeDoSection::with('allItems')->first();

        if (!$whatWeDoSection) {
            $whatWeDoSection = new WhatWeDoSection([
                'badge_text' => 'Our Services',
                'title' => 'What We Do',
                'is_active' => true,
            ]);
        }

        return view('admin.what-we-do.index', compact('whatWeDoSection'));
    }

    /**
     * Store or update the what we do section.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'items' => 'required|array|min:1',
            'items.*.title' => 'required|string|max:255',
            'items.*.icon' => 'nullable|string|max:100',
            'items.*.description' => 'nullable|string',
        ]);

        // Get or create section
        $whatWeDoSection = WhatWeDoSection::first();

        if ($whatWeDoSection) {
            $whatWeDoSection->update([
                'badge_text' => $validated['badge_text'] ?? 'Our Services',
                'title' => $validated['title'],
                'is_active' => $request->has('is_active'),
            ]);
        } else {
            $whatWeDoSection = WhatWeDoSection::create([
                'badge_text' => $validated['badge_text'] ?? 'Our Services',
                'title' => $validated['title'],
                'is_active' => $request->has('is_active'),
            ]);
        }

        // Get existing item IDs
        $existingIds = $whatWeDoSection->allItems()->pluck('id')->toArray();
        $submittedIds = [];

        // Update or create items
        foreach ($request->items as $index => $itemData) {
            $itemIsActive = isset($itemData['is_active']);

            $itemToSave = [
                'title' => $itemData['title'],
                'description' => $itemData['description'] ?? null,
                'icon' => $itemData['icon'] ?? 'fas fa-lightbulb',
                'sort_order' => $index + 1,
                'is_active' => $itemIsActive,
            ];

            if (!empty($itemData['id'])) {
                $item = WhatWeDoItem::find($itemData['id']);
                if ($item) {
                    $item->update($itemToSave);
                    $submittedIds[] = $item->id;
                }
            } else {
                $newItem = $whatWeDoSection->allItems()->create($itemToSave);
                $submittedIds[] = $newItem->id;
            }
        }

        // Delete removed items
        $idsToDelete = array_diff($existingIds, $submittedIds);
        WhatWeDoItem::whereIn('id', $idsToDelete)->delete();

        return redirect()->route('admin.what-we-do.index')
            ->with('success', 'What We Do section updated successfully!');
    }
}
