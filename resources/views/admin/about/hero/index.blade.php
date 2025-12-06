@extends('admin.layouts.app')

@section('title', 'About Hero Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">About Hero Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the hero section content on the about page</p>
        </div>
    </div>

    <!-- About Hero Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit About Hero Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the hero section of your about page</p>
        </div>

        <form action="{{ route('admin.about.hero.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Main Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $aboutHero->title ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Center for Entrepreneurial Policy, Innovation, Research & Development" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <textarea name="subtitle" id="subtitle" rows="3"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Shaping the future of entrepreneurship and socio-economic transformation in Bangladesh" required>{{ old('subtitle', $aboutHero->subtitle ?? '') }}</textarea>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tags -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label for="tag1" class="block text-sm font-medium text-slate-700 mb-2">Tag 1 <span class="text-red-500">*</span></label>
                    <input type="text" name="tag1" id="tag1"
                        value="{{ old('tag1', $aboutHero->tag1 ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Empowering Ideas" required>
                    @error('tag1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tag2" class="block text-sm font-medium text-slate-700 mb-2">Tag 2 <span class="text-red-500">*</span></label>
                    <input type="text" name="tag2" id="tag2"
                        value="{{ old('tag2', $aboutHero->tag2 ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Influencing Policy" required>
                    @error('tag2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="tag3" class="block text-sm font-medium text-slate-700 mb-2">Tag 3 <span class="text-red-500">*</span></label>
                    <input type="text" name="tag3" id="tag3"
                        value="{{ old('tag3', $aboutHero->tag3 ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Impacting the Future" required>
                    @error('tag3')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $aboutHero->is_active ?? true) ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (Show on about page)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update About Hero Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection