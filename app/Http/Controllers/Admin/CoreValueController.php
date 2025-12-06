<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValueSection;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    /**
     * Display the core values management page.
     */
    public function index()
    {
        $coreValueSection = CoreValueSection::with('allCoreValues')->first();

        if (!$coreValueSection) {
            $coreValueSection = new CoreValueSection([
                'badge_text' => 'Our Foundation',
                'title' => 'Core Values',
                'subtitle' => 'The principles that guide everything we do',
                'is_active' => true,
            ]);
        }

        return view('admin.core-values.index', compact('coreValueSection'));
    }

    /**
     * Store or update the core values section.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'core_values' => 'required|array|min:1',
            'core_values.*.title' => 'required|string|max:255',
            'core_values.*.icon' => 'nullable|string|max:10',
            'core_values.*.description' => 'nullable|string',
        ]);

        // Get or create section
        $coreValueSection = CoreValueSection::first();

        if ($coreValueSection) {
            $coreValueSection->update([
                'badge_text' => $validated['badge_text'] ?? 'Our Foundation',
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $request->has('is_active'),
            ]);
        } else {
            $coreValueSection = CoreValueSection::create([
                'badge_text' => $validated['badge_text'] ?? 'Our Foundation',
                'title' => $validated['title'],
                'subtitle' => $validated['subtitle'] ?? null,
                'is_active' => $request->has('is_active'),
            ]);
        }

        // Get existing core value IDs
        $existingIds = $coreValueSection->allCoreValues()->pluck('id')->toArray();
        $submittedIds = [];

        // Update or create core values
        foreach ($request->core_values as $index => $coreValueData) {
            $coreValueIsActive = isset($coreValueData['is_active']);

            $coreValueToSave = [
                'title' => $coreValueData['title'],
                'description' => $coreValueData['description'] ?? null,
                'icon' => $coreValueData['icon'] ?? '⭐',
                'sort_order' => $index + 1,
                'is_active' => $coreValueIsActive,
            ];

            if (!empty($coreValueData['id'])) {
                $coreValue = CoreValue::find($coreValueData['id']);
                if ($coreValue) {
                    $coreValue->update($coreValueToSave);
                    $submittedIds[] = $coreValue->id;
                }
            } else {
                $newCoreValue = $coreValueSection->allCoreValues()->create($coreValueToSave);
                $submittedIds[] = $newCoreValue->id;
            }
        }

        // Delete removed core values
        $idsToDelete = array_diff($existingIds, $submittedIds);
        CoreValue::whereIn('id', $idsToDelete)->delete();

        return redirect()->route('admin.core-values.index')
            ->with('success', 'Core Values section updated successfully!');
    }
}
