@extends('admin.layouts.app')

@section('title', 'Core Values Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Core Values Management</h1>
            <p class="text-slate-600 mt-1">Manage the core values content on the about page</p>
        </div>
    </div>

    <!-- Core Values Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Core Values Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the core values displayed on your about page</p>
        </div>

        <form action="{{ route('admin.core-values.store') }}" method="POST" class="p-6 space-y-6" id="coreValuesForm">
            @csrf

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text</label>
                <input type="text" name="badge_text" id="badge_text"
                    value="{{ old('badge_text', $coreValueSection->badge_text ?? 'Our Foundation') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Our Foundation">
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $coreValueSection->title ?? 'Core Values') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Core Values" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Section Subtitle</label>
                <input type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $coreValueSection->subtitle ?? 'The principles that guide everything we do') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., The principles that guide everything we do">
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Core Values -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Core Values</h3>
                </div>

                <div id="coreValuesContainer" class="space-y-4">
                    @if($coreValueSection->allCoreValues && $coreValueSection->allCoreValues->count() > 0)
                        @foreach($coreValueSection->allCoreValues as $index => $coreValue)
                            <div class="core-value-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-core-value-id="{{ $coreValue->id }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-md font-medium text-slate-800">Core Value {{ $index + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="core_values[{{ $index }}][is_active]"
                                                {{ $coreValue->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeCoreValueBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="core_values[{{ $index }}][id]" value="{{ $coreValue->id }}">

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="core_values[{{ $index }}][title]"
                                            value="{{ old('core_values.' . $index . '.title', $coreValue->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Innovation" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                        <input type="text" name="core_values[{{ $index }}][icon]"
                                            value="{{ old('core_values.' . $index . '.icon', $coreValue->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., ⭐">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                                    <textarea name="core_values[{{ $index }}][description]" rows="2"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter core value description...">{{ old('core_values.' . $index . '.description', $coreValue->description) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default core value template -->
                        <div class="core-value-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Core Value 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="core_values[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeCoreValueBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="core_values[0][title]" value="Innovation"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Innovation" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                                    <input type="text" name="core_values[0][icon]" value="⭐"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., ⭐">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                                <textarea name="core_values[0][description]" rows="2"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter core value description...">Bold thinking, creative solutions</textarea>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add Core Value Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="addCoreValueBtn"
                        class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Core Value
                    </button>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $coreValueSection->is_active ?? true) ? 'checked' : '' }}
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
    let coreValueIndex = {{ $coreValueSection->allCoreValues ? $coreValueSection->allCoreValues->count() : 1 }};

    // Add core value button
    document.getElementById('addCoreValueBtn').addEventListener('click', addCoreValue);

    // Remove core value button (delegated)
    document.getElementById('coreValuesContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeCoreValueBtn')) {
            e.target.closest('.core-value-item').remove();
            updateCoreValueNumbers();
        }
    });

    function addCoreValue() {
        const container = document.getElementById('coreValuesContainer');
        const coreValueHtml = `
            <div class="core-value-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Core Value ${coreValueIndex + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="core_values[${coreValueIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeCoreValueBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="core_values[${coreValueIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Innovation" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="core_values[${coreValueIndex}][icon]" value="⭐"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., ⭐">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="core_values[${coreValueIndex}][description]" rows="2"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter core value description..."></textarea>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', coreValueHtml);
        coreValueIndex++;
        updateCoreValueNumbers();
    }

    function updateCoreValueNumbers() {
        const coreValues = document.querySelectorAll('.core-value-item');
        coreValues.forEach((coreValue, index) => {
            const title = coreValue.querySelector('h4');
            title.textContent = `Core Value ${index + 1}`;

            // Show remove button only if there are more than 1 core values
            const removeBtn = coreValue.querySelector('.removeCoreValueBtn');
            if (coreValues.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize core value numbers on page load
    updateCoreValueNumbers();
});
</script>
@endsection
