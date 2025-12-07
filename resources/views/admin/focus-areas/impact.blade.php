@extends('admin.layouts.app')

@section('title', 'Impact Metrics')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Impact Metrics</h1>
            <p class="text-slate-600 mt-1">Manage the metrics shown under the "Our Impact" section.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Create Metric -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Add Impact Metric</h2>
            <p class="text-sm text-slate-600 mt-1">Add a new impact metric card.</p>
        </div>
        <form action="{{ route('admin.impact-metrics.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Value <span class="text-red-500">*</span></label>
                    <input type="text" name="value" value="{{ old('value') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 500+" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Short description">{{ old('description') }}</textarea>
            </div>
            <div class="grid md:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', ($impactMetrics->max('sort_order') ?? 0) + 1) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="1">
                </div>
                <label class="flex items-center mt-6 md:mt-0">
                    <input type="checkbox" name="is_active" value="1" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500" checked>
                    <span class="ml-2 text-sm text-slate-700">Active</span>
                </label>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Add Metric</button>
            </div>
        </form>
    </div>

    <!-- Existing Metrics -->
    <div class="grid gap-6">
        @foreach($impactMetrics as $metric)
        <div class="bg-white rounded-sm shadow-sm border border-slate-200">
            <form action="{{ route('admin.impact-metrics.update', $metric) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-sm flex items-center justify-center text-2xl font-bold text-blue-900">{{ $metric->value }}</div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $metric->title }}</h3>
                            <p class="text-sm text-slate-600">Metric #{{ $metric->sort_order }}</p>
                        </div>
                    </div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ $metric->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-slate-600">Active</span>
                    </label>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $metric->title) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Value <span class="text-red-500">*</span></label>
                        <input type="text" name="value" value="{{ old('value', $metric->value) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $metric->description) }}</textarea>
                </div>

                <div class="grid md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $metric->sort_order) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="1" required>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Update Metric</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
