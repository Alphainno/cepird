@extends('admin.layouts.app')

@section('title', 'Program Hero Section')

@section('content')
<div class="container-fluid px-4 py-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Program Hero Section</h1>
            <p class="text-slate-600 mt-1">Manage the hero section content for the Programs page</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <form action="{{ route('admin.programs-hero.update') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-semibold text-slate-700 mb-2">
                    Badge Text
                </label>
                <input 
                    type="text" 
                    id="badge_text" 
                    name="badge_text" 
                    value="{{ old('badge_text', $heroSection->badge_text ?? '') }}"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="e.g., Empowering Ideas. Influencing Policy. Impacting the Future."
                >
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
                    Title <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $heroSection->title ?? '') }}"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="e.g., Programs & Initiatives"
                    required
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                    Description
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="4"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="Enter a description for the hero section"
                >{{ old('description', $heroSection->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Background Image -->
            <div>
                <label for="background_image" class="block text-sm font-semibold text-slate-700 mb-2">
                    Background Image
                </label>
                
                @if($heroSection && $heroSection->background_image)
                    <div class="mb-3">
                        <img src="{{ asset('images/' . $heroSection->background_image) }}" alt="Current background" class="w-full max-w-md h-48 object-cover rounded-lg border border-slate-200">
                        <p class="text-xs text-slate-500 mt-1">Current background image</p>
                    </div>
                @endif

                <input 
                    type="file" 
                    id="background_image" 
                    name="background_image" 
                    accept="image/*"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                >
                <p class="text-xs text-slate-500 mt-1">Recommended size: 1920x600px. Max file size: 4MB</p>
                
                <!-- Image Preview -->
                <div id="image-preview" class="mt-3 hidden">
                    <img id="preview-img" src="" alt="Image preview" class="w-full max-w-md h-48 object-cover rounded-lg border border-slate-200">
                    <p class="text-xs text-slate-500 mt-1">New image preview</p>
                </div>
                
                @error('background_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Is Active -->
            <div class="flex items-center gap-3">
                <input 
                    type="checkbox" 
                    id="is_active" 
                    name="is_active" 
                    value="1"
                    {{ old('is_active', $heroSection->is_active ?? true) ? 'checked' : '' }}
                    class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-2 focus:ring-indigo-500"
                >
                <label for="is_active" class="text-sm font-medium text-slate-700">
                    Active (Display this hero section on the website)
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
                <button 
                    type="submit" 
                    class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all"
                >
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Hero Section
                </button>
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="px-6 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-all"
                >
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('background_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    if (file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Please select a valid image file.');
            e.target.value = '';
            preview.classList.add('hidden');
            return;
        }
        
        // Validate file size (4MB max)
        if (file.size > 4 * 1024 * 1024) {
            alert('File size must be less than 4MB.');
            e.target.value = '';
            preview.classList.add('hidden');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
});
</script>
@endsection
