@extends('admin.layouts.app')

@section('title', 'Hero Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Hero Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the hero section content on the landing page</p>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    <!-- Hero Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Hero Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the hero section of your landing page</p>
        </div>

        <form action="{{ route('admin.hero.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text</label>
                <input type="text" name="badge_text" id="badge_text"
                    value="{{ old('badge_text', $heroSection->badge_text) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Driving Bangladesh's Future">
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title Lines -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label for="title_line1" class="block text-sm font-medium text-slate-700 mb-2">Title Line 1 <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line1" id="title_line1"
                        value="{{ old('title_line1', $heroSection->title_line1) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Empowering Ideas." required>
                    @error('title_line1')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title_line2" class="block text-sm font-medium text-slate-700 mb-2">Title Line 2 (Gradient) <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line2" id="title_line2"
                        value="{{ old('title_line2', $heroSection->title_line2) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Influencing Policy." required>
                    @error('title_line2')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="title_line3" class="block text-sm font-medium text-slate-700 mb-2">Title Line 3 <span class="text-red-500">*</span></label>
                    <input type="text" name="title_line3" id="title_line3"
                        value="{{ old('title_line3', $heroSection->title_line3) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Impacting the Future." required>
                    @error('title_line3')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the hero section description..." required>{{ old('description', $heroSection->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button 1 -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="button1_text" class="block text-sm font-medium text-slate-700 mb-2">Primary Button Text <span class="text-red-500">*</span></label>
                    <input type="text" name="button1_text" id="button1_text"
                        value="{{ old('button1_text', $heroSection->button1_text) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Explore Programs" required>
                    @error('button1_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="button1_link" class="block text-sm font-medium text-slate-700 mb-2">Primary Button Link</label>
                    <input type="text" name="button1_link" id="button1_link"
                        value="{{ old('button1_link', $heroSection->button1_link) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., /programs or #programs">
                    @error('button1_link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Button 2 -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="button2_text" class="block text-sm font-medium text-slate-700 mb-2">Secondary Button Text</label>
                    <input type="text" name="button2_text" id="button2_text"
                        value="{{ old('button2_text', $heroSection->button2_text) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Download Policy Report">
                    @error('button2_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="button2_link" class="block text-sm font-medium text-slate-700 mb-2">Secondary Button Link</label>
                    <input type="text" name="button2_link" id="button2_link"
                        value="{{ old('button2_link', $heroSection->button2_link) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., /downloads/report.pdf">
                    @error('button2_link')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Founder Name -->
            <div>
                <label for="founder_name" class="block text-sm font-medium text-slate-700 mb-2">Founder Name</label>
                <input type="text" name="founder_name" id="founder_name"
                    value="{{ old('founder_name', $heroSection->founder_name) }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Mohammad Shahriar Khan">
                @error('founder_name')
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

    <!-- Preview Section -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Live Preview</h2>
            <p class="text-sm text-slate-600 mt-1">This preview updates as you type</p>
        </div>
        <div class="p-6 bg-slate-50">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center space-x-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 mb-4">
                    <span class="flex h-2 w-2 rounded-full bg-teal-500"></span>
                    <span id="preview_badge" class="text-xs font-bold text-blue-900 uppercase tracking-wide">{{ $heroSection->badge_text ?? "Driving Bangladesh's Future" }}</span>
                </div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-900 leading-tight mb-4">
                    <span id="preview_title1">{{ $heroSection->title_line1 ?? 'Empowering Ideas.' }}</span> <br/>
                    <span id="preview_title2" class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-teal-600">
                        {{ $heroSection->title_line2 ?? 'Influencing Policy.' }}
                    </span> <br/>
                    <span id="preview_title3">{{ $heroSection->title_line3 ?? 'Impacting the Future.' }}</span>
                </h1>
                <p id="preview_description" class="text-slate-600 mb-6">{{ $heroSection->description ?? 'Driving entrepreneurial growth, policy innovation, and digital transformation.' }}</p>
                <div class="flex flex-wrap justify-center gap-3">
                    <span id="preview_btn1" class="px-4 py-2 bg-blue-900 text-white text-sm font-semibold rounded-sm">{{ $heroSection->button1_text ?? 'Explore Programs' }}</span>
                    <span id="preview_btn2" class="px-4 py-2 bg-white text-blue-900 border border-slate-200 text-sm font-semibold rounded-sm {{ !$heroSection->button2_text ? 'hidden' : '' }}">{{ $heroSection->button2_text ?? 'Secondary Button' }}</span>
                </div>
                <p id="preview_founder_container" class="mt-4 text-sm text-slate-500 {{ !$heroSection->founder_name ? 'hidden' : '' }}">
                    Founded by <span id="preview_founder" class="text-slate-800 font-bold border-b-2 border-amber-400">{{ $heroSection->founder_name ?? 'Founder Name' }}</span>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Live preview updates
    const fields = {
        'badge_text': 'preview_badge',
        'title_line1': 'preview_title1',
        'title_line2': 'preview_title2',
        'title_line3': 'preview_title3',
        'description': 'preview_description',
        'button1_text': 'preview_btn1',
        'button2_text': 'preview_btn2',
        'founder_name': 'preview_founder'
    };

    Object.keys(fields).forEach(function(inputId) {
        const input = document.getElementById(inputId);
        const preview = document.getElementById(fields[inputId]);

        if (input && preview) {
            input.addEventListener('input', function() {
                preview.textContent = this.value || preview.dataset.default || '';

                // Handle visibility for optional fields
                if (inputId === 'button2_text') {
                    document.getElementById('preview_btn2').classList.toggle('hidden', !this.value);
                }
                if (inputId === 'founder_name') {
                    document.getElementById('preview_founder_container').classList.toggle('hidden', !this.value);
                }
            });
        }
    });
});
</script>
@endsection
