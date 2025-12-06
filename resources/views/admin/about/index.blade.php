@extends('admin.layouts.app')

@section('title', 'About Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">About Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the about section content on the landing page</p>
        </div>
    </div>

    <!-- About Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit About Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the about section of your landing page</p>
        </div>

        <form action="{{ route('admin.about.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Main Title -->
            <div>
                <label for="main_title" class="block text-sm font-medium text-slate-700 mb-2">Main Title <span class="text-red-500">*</span></label>
                <input type="text" name="main_title" id="main_title"
                    value="{{ old('main_title', $aboutSection->main_title) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Accelerating a Knowledge-Driven Economy" required>
                @error('main_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <textarea name="subtitle" id="subtitle" rows="3"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the about section subtitle..." required>{{ old('subtitle', $aboutSection->subtitle) }}</textarea>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Pillars -->
            <div class="space-y-6">
                <h3 class="text-lg font-semibold text-slate-900">Mission Pillars</h3>

                <!-- Pillar 1 -->
                <div class="bg-slate-50 p-4 rounded-sm">
                    <h4 class="text-md font-medium text-slate-800 mb-3">Pillar 1</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="pillar1_title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="pillar1_title" id="pillar1_title"
                                value="{{ old('pillar1_title', $aboutSection->pillar1_title) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Policy Research" required>
                            @error('pillar1_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pillar1_icon" class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                            <input type="text" name="pillar1_icon" id="pillar1_icon"
                                value="{{ old('pillar1_icon', $aboutSection->pillar1_icon ?? 'file-text') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., file-text">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="pillar1_description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea name="pillar1_description" id="pillar1_description" rows="2"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter pillar description..." required>{{ old('pillar1_description', $aboutSection->pillar1_description) }}</textarea>
                        @error('pillar1_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pillar 2 -->
                <div class="bg-slate-50 p-4 rounded-sm">
                    <h4 class="text-md font-medium text-slate-800 mb-3">Pillar 2</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="pillar2_title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="pillar2_title" id="pillar2_title"
                                value="{{ old('pillar2_title', $aboutSection->pillar2_title) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Innovation" required>
                            @error('pillar2_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pillar2_icon" class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                            <input type="text" name="pillar2_icon" id="pillar2_icon"
                                value="{{ old('pillar2_icon', $aboutSection->pillar2_icon ?? 'lightbulb') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., lightbulb">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="pillar2_description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea name="pillar2_description" id="pillar2_description" rows="2"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter pillar description..." required>{{ old('pillar2_description', $aboutSection->pillar2_description) }}</textarea>
                        @error('pillar2_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pillar 3 -->
                <div class="bg-slate-50 p-4 rounded-sm">
                    <h4 class="text-md font-medium text-slate-800 mb-3">Pillar 3</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="pillar3_title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="pillar3_title" id="pillar3_title"
                                value="{{ old('pillar3_title', $aboutSection->pillar3_title) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Entrepreneurship" required>
                            @error('pillar3_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pillar3_icon" class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                            <input type="text" name="pillar3_icon" id="pillar3_icon"
                                value="{{ old('pillar3_icon', $aboutSection->pillar3_icon ?? 'trending-up') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., trending-up">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="pillar3_description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea name="pillar3_description" id="pillar3_description" rows="2"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter pillar description..." required>{{ old('pillar3_description', $aboutSection->pillar3_description) }}</textarea>
                        @error('pillar3_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Pillar 4 -->
                <div class="bg-slate-50 p-4 rounded-sm">
                    <h4 class="text-md font-medium text-slate-800 mb-3">Pillar 4</h4>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="pillar4_title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="pillar4_title" id="pillar4_title"
                                value="{{ old('pillar4_title', $aboutSection->pillar4_title) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Skill Development" required>
                            @error('pillar4_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="pillar4_icon" class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                            <input type="text" name="pillar4_icon" id="pillar4_icon"
                                value="{{ old('pillar4_icon', $aboutSection->pillar4_icon ?? 'users') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., users">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label for="pillar4_description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea name="pillar4_description" id="pillar4_description" rows="2"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter pillar description..." required>{{ old('pillar4_description', $aboutSection->pillar4_description) }}</textarea>
                        @error('pillar4_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $aboutSection->is_active ?? true) ? 'checked' : '' }}
                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <label for="is_active" class="ml-2 text-sm font-medium text-slate-700">Active (Display on website)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4 border-t border-slate-200">
                <button type="submit"
                    class="px-6 py-3 bg-blue-900 text-white font-semibold rounded-sm hover:bg-blue-800 transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
