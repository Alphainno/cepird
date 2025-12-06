@extends('admin.layouts.app')

@section('title', 'About Introduction Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">About Introduction Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the introduction section content on the about page</p>
        </div>
    </div>

    <!-- About Introduction Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit About Introduction Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the introduction section of your about page</p>
        </div>

        <form action="{{ route('admin.about.introduction.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text <span class="text-red-500">*</span></label>
                <input type="text" name="badge_text" id="badge_text"
                    value="{{ old('badge_text', $aboutIntroduction->badge_text ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Who We Are" required>
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title Lines -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="title_line1" class="block text-sm font-medium text-slate-700 mb-2">Title Line 1 <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line1" id="title_line1"
                        value="{{ old('title_line1', $aboutIntroduction->title_line1 ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Where Research Meets" required>
                    @error('title_line1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title_line2" class="block text-sm font-medium text-slate-700 mb-2">Title Line 2 (Highlighted) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line2" id="title_line2"
                        value="{{ old('title_line2', $aboutIntroduction->title_line2 ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Real-World Impact" required>
                    @error('title_line2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Paragraphs -->
            <div class="space-y-4">
                <div>
                    <label for="paragraph1" class="block text-sm font-medium text-slate-700 mb-2">Paragraph 1 <span class="text-red-500">*</span></label>
                    <textarea name="paragraph1" id="paragraph1" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the first paragraph content..." required>{{ old('paragraph1', $aboutIntroduction->paragraph1 ?? '') }}</textarea>
                    @error('paragraph1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="paragraph2" class="block text-sm font-medium text-slate-700 mb-2">Paragraph 2 <span class="text-red-500">*</span></label>
                    <textarea name="paragraph2" id="paragraph2" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the second paragraph content..." required>{{ old('paragraph2', $aboutIntroduction->paragraph2 ?? '') }}</textarea>
                    @error('paragraph2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="paragraph3" class="block text-sm font-medium text-slate-700 mb-2">Paragraph 3 (Highlighted) <span class="text-red-500">*</span></label>
                    <textarea name="paragraph3" id="paragraph3" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter the third paragraph content..." required>{{ old('paragraph3', $aboutIntroduction->paragraph3 ?? '') }}</textarea>
                    @error('paragraph3')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Upload Image</label>
                <input type="file" name="image" id="image"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    accept="image/*">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Image Preview -->
                <div id="image-preview" class="mt-2 hidden">
                    <p class="text-sm text-slate-600 mb-1">Preview:</p>
                    <img id="preview-img" src="" alt="Image preview" class="h-32 w-auto border border-slate-300 rounded shadow-sm">
                </div>

                @if($aboutIntroduction && $aboutIntroduction->image)
                    <div class="mt-2">
                        <p class="text-sm text-slate-600">Current image:</p>
                        <img src="{{ asset('storage/' . $aboutIntroduction->image) }}" alt="Current image" class="mt-1 h-20 w-auto border border-slate-300 rounded">
                    </div>
                @endif
                <p class="mt-1 text-sm text-slate-500">Accepted formats: JPEG, PNG, JPG, GIF, SVG. Max size: 2MB</p>
            </div>

            <!-- Image URL (Fallback) -->
            <div>
                <label for="image_url" class="block text-sm font-medium text-slate-700 mb-2">Or Image URL (Optional)</label>
                <input type="url" name="image_url" id="image_url"
                    value="{{ old('image_url', $aboutIntroduction->image_url ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="https://example.com/image.jpg">
                @error('image_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-sm text-slate-500">If no image is uploaded, this URL will be used as fallback</p>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $aboutIntroduction->is_active ?? true) ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (Show on about page)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Introduction Section
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const previewContainer = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];

        if (file) {
            // Validate file type
            const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!validTypes.includes(file.type)) {
                alert('Please select a valid image file (JPEG, PNG, JPG, GIF, SVG).');
                imageInput.value = '';
                previewContainer.classList.add('hidden');
                return;
            }

            // Validate file size (2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('File size must be less than 2MB.');
                imageInput.value = '';
                previewContainer.classList.add('hidden');
                return;
            }

            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            // Hide preview if no file selected
            previewContainer.classList.add('hidden');
        }
    });
});
</script>
@endpush

@endsection
