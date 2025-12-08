@extends('admin.layouts.app')

@section('title', 'Edit Program Section - Admin')

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.program-sections.index') }}" class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit Program Section</h1>
            <p class="text-gray-600 mt-1">Update {{ $section->title }}</p>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <form id="sectionForm" action="{{ route('admin.program-sections.update', $section) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Section Title *</label>
                <input type="text" name="title" id="title" required value="{{ $section->title }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="e.g., Research & Publications">
            </div>

            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">Slug (URL)</label>
                <input type="text" name="slug" id="slug" value="{{ $section->slug }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="e.g., research-publications">
            </div>

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-semibold text-gray-700 mb-2">Badge Text</label>
                <input type="text" name="badge_text" id="badge_text" value="{{ $section->badge_text }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="e.g., Program Area 1">
            </div>

            <!-- Color Theme -->
            <div>
                <label for="color_theme" class="block text-sm font-semibold text-gray-700 mb-2">Color Theme *</label>
                <select name="color_theme" id="color_theme" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                    <option value="blue" {{ $section->color_theme === 'blue' ? 'selected' : '' }}>Blue</option>
                    <option value="teal" {{ $section->color_theme === 'teal' ? 'selected' : '' }}>Teal</option>
                    <option value="amber" {{ $section->color_theme === 'amber' ? 'selected' : '' }}>Amber</option>
                    <option value="indigo" {{ $section->color_theme === 'indigo' ? 'selected' : '' }}>Indigo</option>
                </select>
            </div>

            <!-- Section ID (Anchor) -->
            <div>
                <label for="section_id" class="block text-sm font-semibold text-gray-700 mb-2">Section ID (for anchor links)</label>
                <input type="text" name="section_id" id="section_id" value="{{ $section->section_id }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="e.g., research-publications">
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" min="0" value="{{ $section->order }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="0">
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                    placeholder="Describe this program section...">{{ $section->description }}</textarea>
            </div>

            <!-- Active Status -->
            <div class="md:col-span-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ $section->is_active ? 'checked' : '' }}
                        class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <span class="text-sm font-medium text-gray-700">Active (visible on frontend)</span>
                </label>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end gap-4">
            <a href="{{ route('admin.program-sections.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors">
                Cancel
            </a>
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Update Section
            </button>
        </div>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('sectionForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = this;
    const formData = new FormData(form);
    
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            setTimeout(() => {
                window.location.href = '{{ route("admin.program-sections.index") }}';
            }, 1000);
        } else {
            showToast(data.message || 'An error occurred', 'error');
        }
    })
    .catch(error => {
        showToast('An error occurred while saving', 'error');
    });
});
</script>
@endpush
