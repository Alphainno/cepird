<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactMetric;
use Illuminate\Http\Request;

class ImpactMetricController extends Controller
{
    public function index()
    {
        $impactMetrics = ImpactMetric::ordered()->get();
        return view('admin.focus-areas.impact', compact('impactMetrics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        ImpactMetric::create([
            'title' => $request->title,
            'value' => $request->value,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->back()->with('success', 'Impact metric added successfully.');
    }

    public function update(Request $request, ImpactMetric $impactMetric)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $impactMetric->update([
            'title' => $request->title,
            'value' => $request->value,
            'description' => $request->description,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->is_active ?? true,
        ]);

        return redirect()->back()->with('success', 'Impact metric updated successfully.');
    }
}
