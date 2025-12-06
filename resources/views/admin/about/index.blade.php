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

        <form action="{{ route('admin.about.store') }}" method="POST" class="p-6 space-y-6" id="aboutForm">
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
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Mission Pillars</h3>
                    <button type="button" id="addPillarBtn"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Pillar
                    </button>
                </div>

                <div id="pillarsContainer" class="space-y-4">
                    @if($aboutSection->allPillars->count() > 0)
                        @foreach($aboutSection->allPillars as $index => $pillar)
                            <div class="pillar-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-pillar-id="{{ $pillar->id }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-md font-medium text-slate-800">Pillar {{ $index + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="pillars[{{ $index }}][is_active]"
                                                {{ $pillar->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removePillarBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="pillars[{{ $index }}][id]" value="{{ $pillar->id }}">

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="pillars[{{ $index }}][title]"
                                            value="{{ old('pillars.' . $index . '.title', $pillar->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Policy Research" required>
                                        @error('pillars.' . $index . '.title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                        <input type="text" name="pillars[{{ $index }}][icon]"
                                            value="{{ old('pillars.' . $index . '.icon', $pillar->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., file-text">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                    <textarea name="pillars[{{ $index }}][description]" rows="2"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter pillar description..." required>{{ old('pillars.' . $index . '.description', $pillar->description) }}</textarea>
                                    @error('pillars.' . $index . '.description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default pillar template -->
                        <div class="pillar-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Pillar 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="pillars[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removePillarBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="pillars[0][title]"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Policy Research" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                    <input type="text" name="pillars[0][icon]" value="file-text"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., file-text">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                <textarea name="pillars[0][description]" rows="2"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter pillar description..." required></textarea>
                            </div>
                        </div>
                    @endif
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let pillarIndex = {{ $aboutSection->allPillars->count() ?: 1 }};

    // Add new pillar
    document.getElementById('addPillarBtn').addEventListener('click', function() {
        addNewPillar();
    });

    // Remove pillar
    document.addEventListener('click', function(e) {
        if (e.target.closest('.removePillarBtn')) {
            e.target.closest('.pillar-item').remove();
            updatePillarNumbers();
        }
    });

    function addNewPillar() {
        const container = document.getElementById('pillarsContainer');
        const pillarCount = container.querySelectorAll('.pillar-item').length;

        const pillarHtml = `
            <div class="pillar-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Pillar ${pillarCount + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="pillars[${pillarIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removePillarBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="pillars[${pillarIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Policy Research" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="pillars[${pillarIndex}][icon]" value="file-text"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., file-text">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea name="pillars[${pillarIndex}][description]" rows="2"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter pillar description..." required></textarea>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', pillarHtml);
        pillarIndex++;
        updatePillarNumbers();
    }

    function updatePillarNumbers() {
        const pillars = document.querySelectorAll('.pillar-item');
        pillars.forEach((pillar, index) => {
            const title = pillar.querySelector('h4');
            title.textContent = `Pillar ${index + 1}`;

            // Show remove button only if there are more than 1 pillars
            const removeBtn = pillar.querySelector('.removePillarBtn');
            if (pillars.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize pillar numbers on page load
    updatePillarNumbers();
});
</script>
@endsection
