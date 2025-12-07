@extends('admin.layouts.app')

@section('title', 'Focus Area Outcome Section')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Area Outcome Section</h1>
            <p class="text-slate-600 mt-1">Manage the header for the "What We Deliver" fdg section.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Edit Section -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Section Details</h2>
            <p class="text-sm text-slate-600 mt-1">Update the badge, title, and description.</p>
        </div>
        <form action="{{ route('admin.focus-area-outcome-section.update') }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Badge Text <span class="text-red-500">*</span></label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $section->badge_text ?? 'Key Outcomes') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title', $section->title ?? 'What We Deliver') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>{{ old('description', $section->description ?? 'Our focus areas translate into concrete deliverables that drive real impact across Bangladesh\'s entrepreneurial ecosystem.') }}</textarea>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $section ? $section->is_active : true) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <span class="ml-2 text-sm text-slate-700">Active</span>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Update Section</button>
            </div>
        </form>
    </div>
</div>
@endsection
