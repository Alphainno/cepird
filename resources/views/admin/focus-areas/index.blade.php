@extends('admin.layouts.app')

@section('title', 'Focus Areas Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Areas Management</h1>
            <p class="text-slate-600 mt-1">Manage the focus areas content on the landing page</p>
        </div>
    </div>

    <!-- Focus Areas Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Focus Areas Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the focus areas section of your landing page</p>
        </div>

        <form action="{{ route('admin.focus-areas.store') }}" method="POST" class="p-6 space-y-6" id="focusAreasForm">
            @csrf

            <!-- Main Title -->
            <div>
                <label for="main_title" class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                <input type="text" name="main_title" id="main_title"
                    value="{{ old('main_title', $focusAreaSection->main_title ?? 'Core Strategic Areas') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Core Strategic Areas" required>
                @error('main_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Section Subtitle</label>
                <textarea name="subtitle" id="subtitle" rows="2"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the focus areas section subtitle...">{{ old('subtitle', $focusAreaSection->subtitle) }}</textarea>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Focus Areas -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Focus Areas</h3>
                    <button type="button" id="addFocusAreaBtn"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Focus Area
                    </button>
                </div>

                <div id="focusAreasContainer" class="space-y-4">
                    @if($focusAreaSection->allFocusAreas->count() > 0)
                        @foreach($focusAreaSection->allFocusAreas as $index => $focusArea)
                            <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-focus-area-id="{{ $focusArea->id }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-md font-medium text-slate-800">Focus Area {{ $index + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="focus_areas[{{ $index }}][is_active]"
                                                {{ $focusArea->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="focus_areas[{{ $index }}][id]" value="{{ $focusArea->id }}">

                                <div class="grid md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="focus_areas[{{ $index }}][title]"
                                            value="{{ old('focus_areas.' . $index . '.title', $focusArea->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Policy Development" required>
                                        @error('focus_areas.' . $index . '.title')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                        <input type="text" name="focus_areas[{{ $index }}][icon]"
                                            value="{{ old('focus_areas.' . $index . '.icon', $focusArea->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., file-text">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon Color</label>
                                        <select name="focus_areas[{{ $index }}][icon_color]"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="blue" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'blue') ? 'selected' : '' }}>Blue</option>
                                            <option value="teal" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'teal') ? 'selected' : '' }}>Teal</option>
                                            <option value="amber" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'amber') ? 'selected' : '' }}>Amber</option>
                                            <option value="indigo" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'indigo') ? 'selected' : '' }}>Indigo</option>
                                            <option value="green" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'green') ? 'selected' : '' }}>Green</option>
                                            <option value="red" {{ (old('focus_areas.' . $index . '.icon_color', $focusArea->icon_color) == 'red') ? 'selected' : '' }}>Red</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                    <textarea name="focus_areas[{{ $index }}][description]" rows="2"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter focus area description..." required>{{ old('focus_areas.' . $index . '.description', $focusArea->description) }}</textarea>
                                    @error('focus_areas.' . $index . '.description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default focus area template -->
                        <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Focus Area 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="focus_areas[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="focus_areas[0][title]" value="Policy Development"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Policy Development" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                    <input type="text" name="focus_areas[0][icon]" value="file-text"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., file-text">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon Color</label>
                                    <select name="focus_areas[0][icon_color]"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="blue" selected>Blue</option>
                                        <option value="teal">Teal</option>
                                        <option value="amber">Amber</option>
                                        <option value="indigo">Indigo</option>
                                        <option value="green">Green</option>
                                        <option value="red">Red</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                                <textarea name="focus_areas[0][description]" rows="2"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter focus area description..." required>Drafting frameworks for digital commerce and SME growth.</textarea>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $focusAreaSection->is_active ?? true) ? 'checked' : '' }}
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
    let focusAreaIndex = {{ $focusAreaSection->allFocusAreas->count() ?: 1 }};

    // Add new focus area
    document.getElementById('addFocusAreaBtn').addEventListener('click', function() {
        addNewFocusArea();
    });

    // Remove focus area
    document.addEventListener('click', function(e) {
        if (e.target.closest('.removeFocusAreaBtn')) {
            e.target.closest('.focus-area-item').remove();
            updateFocusAreaNumbers();
        }
    });

    function addNewFocusArea() {
        const container = document.getElementById('focusAreasContainer');
        const focusAreaCount = container.querySelectorAll('.focus-area-item').length;

        const focusAreaHtml = `
            <div class="focus-area-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Focus Area ${focusAreaCount + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="focus_areas[${focusAreaIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeFocusAreaBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="focus_areas[${focusAreaIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Policy Development" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="focus_areas[${focusAreaIndex}][icon]" value="file-text"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., file-text">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon Color</label>
                        <select name="focus_areas[${focusAreaIndex}][icon_color]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="blue" selected>Blue</option>
                            <option value="teal">Teal</option>
                            <option value="amber">Amber</option>
                            <option value="indigo">Indigo</option>
                            <option value="green">Green</option>
                            <option value="red">Red</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea name="focus_areas[${focusAreaIndex}][description]" rows="2"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter focus area description..." required></textarea>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', focusAreaHtml);
        focusAreaIndex++;
        updateFocusAreaNumbers();
    }

    function updateFocusAreaNumbers() {
        const focusAreas = document.querySelectorAll('.focus-area-item');
        focusAreas.forEach((focusArea, index) => {
            const title = focusArea.querySelector('h4');
            title.textContent = `Focus Area ${index + 1}`;

            // Show remove button only if there are more than 1 focus areas
            const removeBtn = focusArea.querySelector('.removeFocusAreaBtn');
            if (focusAreas.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize focus area numbers on page load
    updateFocusAreaNumbers();
});
</script>
@endsection