@extends('admin.layouts.app')

@section('title', 'Research Hero Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Research Hero Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the hero section content on the research page</p>
        </div>
    </div>

    <!-- Research Hero Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Research Hero Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the hero section of your research page</p>
        </div>

        <form action="{{ route('admin.research-hero.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text <span class="text-red-500">*</span></label>
                <input type="text" name="badge_text" id="badge_text"
                    value="{{ old('badge_text', $heroSection->badge_text) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Research Library" required>
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title Lines -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="title_line1" class="block text-sm font-medium text-slate-700 mb-2">Title Line 1 <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line1" id="title_line1"
                        value="{{ old('title_line1', $heroSection->title_line1) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Explore Our" required>
                    @error('title_line1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title_line2" class="block text-sm font-medium text-slate-700 mb-2">Title Line 2 (Gradient) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line2" id="title_line2"
                        value="{{ old('title_line2', $heroSection->title_line2) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Research" required>
                    @error('title_line2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Subtitle -->
            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Subtitle <span class="text-red-500">*</span></label>
                <textarea name="subtitle" id="subtitle" rows="3"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the research hero section subtitle..." required>{{ old('subtitle', $heroSection->subtitle) }}</textarea>
                @error('subtitle')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Background Image -->
            <div>
                <label for="background_image" class="block text-sm font-medium text-slate-700 mb-2">Background Image</label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-sm">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-slate-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-slate-600">
                            <label for="background_image" class="relative cursor-pointer bg-white rounded-sm font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                <span>Upload a file</span>
                                <input id="background_image" name="background_image" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-slate-500">PNG, JPG, GIF up to 2MB</p>
                    </div>
                </div>
                @if($heroSection->background_image)
                    <div class="mt-2">
                        <p class="text-sm text-slate-600">Current image:</p>
                        <img src="{{ asset('storage/' . $heroSection->background_image) }}" alt="Current background" class="mt-1 h-20 w-auto rounded-sm border border-slate-200">
                    </div>
                @endif
                <div id="image-preview" class="mt-2 hidden">
                    <p class="text-sm text-slate-600">New image preview:</p>
                    <img id="preview-img" src="" alt="Image preview" class="mt-1 h-20 w-auto rounded-sm border border-slate-200">
                </div>
                @error('background_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $heroSection->is_active ?? true) ? 'checked' : '' }}
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
    // Image preview functionality
    const imageInput = document.getElementById('background_image');
    const imagePreview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    if (imageInput && imagePreview && previewImg) {
        imageInput.addEventListener('change', function(e) {
            const file = e.target.files[0];

            if (file) {
                // Validate file type
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/svg+xml'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image file (PNG, JPG, GIF, SVG).');
                    return;
                }

                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB.');
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.classList.add('hidden');
                previewImg.src = '';
            }
        });
    }
});
</script>
@endsection
