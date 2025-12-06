@extends('admin.layouts.app')

@section('title', 'Founder Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Founder Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the founder section content on the landing page</p>
        </div>
    </div>

    <!-- Founder Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Founder Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the founder section of your landing page</p>
        </div>

        <form action="{{ route('admin.founder.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Founder Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $founder->name) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Mohammad Shahriar Khan" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title/Position <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $founder->title) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Entrepreneur • Ecosystem Builder • Policy Advocate" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Quote -->
            <div>
                <label for="quote" class="block text-sm font-medium text-slate-700 mb-2">Quote <span class="text-red-500">*</span></label>
                <textarea name="quote" id="quote" rows="4"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the founder's quote..." required>{{ old('quote', $founder->quote) }}</textarea>
                @error('quote')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Founder Image</label>
                <div id="imagePreview" class="mb-2">
                    @if($founder->image)
                    <img src="{{ asset($founder->image) }}" alt="Current image" class="w-20 h-20 object-cover rounded border">
                    <p class="text-sm text-slate-600 mt-1">Current image</p>
                    @else
                    <div class="w-20 h-20 border-2 border-dashed border-slate-300 rounded flex items-center justify-center text-slate-400">
                        <span class="text-xs">No image</span>
                    </div>
                    @endif
                </div>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    onchange="previewImage(event)">
                <p class="text-sm text-slate-500 mt-1">Upload a new image (JPG, PNG, GIF). Leave empty to keep current image.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Social Links -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label for="linkedin_url" class="block text-sm font-medium text-slate-700 mb-2">LinkedIn</label>
                    <input type="text" name="linkedin_url" id="linkedin_url"
                        value="{{ old('linkedin_url', $founder->linkedin_url) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://linkedin.com/in/username or username">
                    <p class="text-sm text-slate-500 mt-1">Enter full URL or just the username</p>
                    @error('linkedin_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="twitter_url" class="block text-sm font-medium text-slate-700 mb-2">Twitter</label>
                    <input type="text" name="twitter_url" id="twitter_url"
                        value="{{ old('twitter_url', $founder->twitter_url) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="https://twitter.com/username or @username or username">
                    <p class="text-sm text-slate-500 mt-1">Enter full URL, @username, or just username</p>
                    @error('twitter_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                    <input type="email" name="email" id="email"
                        value="{{ old('email', $founder->email) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="founder@cepird.org">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $founder->is_active ?? true) ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (Show on landing page)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update Founder Section
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('imagePreview');

    if (file) {
        // Validate file type
        const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
        if (!validTypes.includes(file.type)) {
            alert('Please select a valid image file (JPG, PNG, or GIF).');
            event.target.value = '';
            return;
        }

        // Validate file size (2MB max)
        const maxSize = 2 * 1024 * 1024; // 2MB in bytes
        if (file.size > maxSize) {
            alert('File size must be less than 2MB.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="w-20 h-20 object-cover rounded border">
                <p class="text-sm text-green-600 mt-1">New image selected</p>
            `;
        };
        reader.readAsDataURL(file);
    } else {
        // Reset to original state
        previewContainer.innerHTML = `
            @if($founder->image)
            <img src="{{ asset($founder->image) }}" alt="Current image" class="w-20 h-20 object-cover rounded border">
            <p class="text-sm text-slate-600 mt-1">Current image</p>
            @else
            <div class="w-20 h-20 border-2 border-dashed border-slate-300 rounded flex items-center justify-center text-slate-400">
                <span class="text-xs">No image</span>
            </div>
            @endif
        `;
    }
}
</script>
@endsection
