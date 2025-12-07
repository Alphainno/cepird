@extends('admin.layouts.app')

@section('title', 'Focus Area Hero Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Area Hero Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the hero section content on the focus areas page</p>
        </div>
    </div>

    <!-- Hero Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Hero Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the hero section of the focus areas page</p>
        </div>

        <form action="{{ route('admin.focus-area-hero.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <input type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $heroSection->subtitle ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Our Strategic Focus" required>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $heroSection->title ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Core Focus Areas" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the hero section description..." required>{{ old('description', $heroSection->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Background Image -->
            <div>
                <label for="background_image" class="block text-sm font-medium text-slate-700 mb-2">Background Image</label>
                <input type="file" name="background_image" id="background_image"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    accept="image/*">
                @error('background_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="text-sm text-slate-500 mt-1">Upload a high-quality image (JPEG, PNG, GIF). Max size: 2MB</p>

                <!-- Image Preview -->
                <div id="image_preview" class="mt-4">
                    @if($heroSection && $heroSection->background_image)
                        <p class="text-sm text-slate-600 mb-2">Current image:</p>
                        @if(str_starts_with($heroSection->background_image, 'http'))
                            <img src="{{ $heroSection->background_image }}" alt="Current background" class="w-32 h-20 object-cover rounded-sm border border-slate-200">
                        @else
                            <img src="{{ asset('storage/' . $heroSection->background_image) }}" alt="Current background" class="w-32 h-20 object-cover rounded-sm border border-slate-200">
                        @endif
                    @else
                        <p class="text-sm text-slate-600 mb-2">No image selected</p>
                        <div class="w-32 h-20 bg-slate-100 border border-slate-200 rounded-sm flex items-center justify-center">
                            <span class="text-slate-400 text-sm">Preview</span>
                        </div>
                    @endif
                </div>
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
    // Image preview functionality
    const imageInput = document.getElementById('background_image');
    const imagePreview = document.getElementById('image_preview');

    if (imageInput && imagePreview) {
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                // Validate file type
                const validTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPEG, PNG, or GIF).');
                    imageInput.value = '';
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    imageInput.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.innerHTML = `
                        <p class="text-sm text-slate-600 mb-2">New image preview:</p>
                        <img src="${e.target.result}" alt="Image preview" class="w-32 h-20 object-cover rounded-sm border border-slate-200">
                        <p class="text-xs text-slate-500 mt-1">${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</p>
                    `;
                };
                reader.readAsDataURL(file);
            } else {
                // Reset to current image or placeholder
                @if($heroSection && $heroSection->background_image)
                    @if(str_starts_with($heroSection->background_image, 'http'))
                        imagePreview.innerHTML = `
                            <p class="text-sm text-slate-600 mb-2">Current image:</p>
                            <img src="{{ $heroSection->background_image }}" alt="Current background" class="w-32 h-20 object-cover rounded-sm border border-slate-200">
                        `;
                    @else
                        imagePreview.innerHTML = `
                            <p class="text-sm text-slate-600 mb-2">Current image:</p>
                            <img src="{{ asset('storage/' . $heroSection->background_image) }}" alt="Current background" class="w-32 h-20 object-cover rounded-sm border border-slate-200">
                        `;
                    @endif
                @else
                    imagePreview.innerHTML = `
                        <p class="text-sm text-slate-600 mb-2">No image selected</p>
                        <div class="w-32 h-20 bg-slate-100 border border-slate-200 rounded-sm flex items-center justify-center">
                            <span class="text-slate-400 text-sm">Preview</span>
                        </div>
                    `;
                @endif
            }
        });
    }
});
</script>
@endsection
