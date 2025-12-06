@extends('admin.layouts.app')

@section('title', 'Vision & Mission Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Vision & Mission Management</h1>
            <p class="text-slate-600 mt-1">Manage the vision and mission content on the about page</p>
        </div>
    </div>

    <!-- Vision & Mission Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Vision & Mission Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the vision and mission content displayed on your about page</p>
        </div>

        <form action="{{ route('admin.vision-mission.store') }}" method="POST" class="p-6 space-y-8">
            @csrf

            <!-- Vision Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-200 pb-2">Vision</h3>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="vision_icon" class="block text-sm font-medium text-slate-700 mb-2">Vision Icon</label>
                        <input type="text" name="vision_icon" id="vision_icon"
                            value="{{ old('vision_icon', $visionMission->vision_icon ?? '🎯') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., 🎯">
                        @error('vision_icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="vision_title" class="block text-sm font-medium text-slate-700 mb-2">Vision Title <span class="text-red-500">*</span></label>
                        <input type="text" name="vision_title" id="vision_title"
                            value="{{ old('vision_title', $visionMission->vision_title ?? 'Our Vision') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Our Vision" required>
                        @error('vision_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="vision_paragraph1" class="block text-sm font-medium text-slate-700 mb-2">Vision Paragraph 1</label>
                    <textarea name="vision_paragraph1" id="vision_paragraph1" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the first vision paragraph...">{{ old('vision_paragraph1', $visionMission->vision_paragraph1 ?? '') }}</textarea>
                    @error('vision_paragraph1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="vision_paragraph2" class="block text-sm font-medium text-slate-700 mb-2">Vision Paragraph 2</label>
                    <textarea name="vision_paragraph2" id="vision_paragraph2" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the second vision paragraph...">{{ old('vision_paragraph2', $visionMission->vision_paragraph2 ?? '') }}</textarea>
                    @error('vision_paragraph2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Mission Section -->
            <div class="space-y-4">
                <h3 class="text-lg font-semibold text-slate-900 border-b border-slate-200 pb-2">Mission</h3>
                
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="mission_icon" class="block text-sm font-medium text-slate-700 mb-2">Mission Icon</label>
                        <input type="text" name="mission_icon" id="mission_icon"
                            value="{{ old('mission_icon', $visionMission->mission_icon ?? '📌') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., 📌">
                        @error('mission_icon')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="mission_title" class="block text-sm font-medium text-slate-700 mb-2">Mission Title <span class="text-red-500">*</span></label>
                        <input type="text" name="mission_title" id="mission_title"
                            value="{{ old('mission_title', $visionMission->mission_title ?? 'Our Mission') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Our Mission" required>
                        @error('mission_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-4">
                    <p class="text-sm text-slate-600">Enter your mission points (leave empty to hide):</p>
                    
                    <div>
                        <label for="mission_point1" class="block text-sm font-medium text-slate-700 mb-2">Mission Point 1</label>
                        <input type="text" name="mission_point1" id="mission_point1"
                            value="{{ old('mission_point1', $visionMission->mission_point1 ?? '') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Conduct high-quality research on entrepreneurship">
                    </div>
                    
                    <div>
                        <label for="mission_point2" class="block text-sm font-medium text-slate-700 mb-2">Mission Point 2</label>
                        <input type="text" name="mission_point2" id="mission_point2"
                            value="{{ old('mission_point2', $visionMission->mission_point2 ?? '') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Develop policy frameworks for startups and SMEs">
                    </div>
                    
                    <div>
                        <label for="mission_point3" class="block text-sm font-medium text-slate-700 mb-2">Mission Point 3</label>
                        <input type="text" name="mission_point3" id="mission_point3"
                            value="{{ old('mission_point3', $visionMission->mission_point3 ?? '') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Bridge gaps between academia and industry">
                    </div>
                    
                    <div>
                        <label for="mission_point4" class="block text-sm font-medium text-slate-700 mb-2">Mission Point 4</label>
                        <input type="text" name="mission_point4" id="mission_point4"
                            value="{{ old('mission_point4', $visionMission->mission_point4 ?? '') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Train future leaders in digital economy">
                    </div>
                    
                    <div>
                        <label for="mission_point5" class="block text-sm font-medium text-slate-700 mb-2">Mission Point 5</label>
                        <input type="text" name="mission_point5" id="mission_point5"
                            value="{{ old('mission_point5', $visionMission->mission_point5 ?? '') }}"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Promote sustainable equitable growth">
                    </div>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $visionMission->is_active ?? true) ? 'checked' : '' }}
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
