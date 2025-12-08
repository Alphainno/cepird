@extends('admin.layouts.app')

@section('title', 'Program Sections - Admin')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Program Sections</h1>
            <p class="text-gray-600 mt-1">Manage program categories and their items</p>
        </div>
        <a href="{{ route('admin.program-sections.create') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Section
        </a>
    </div>
</div>

<!-- Sections Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($sections as $section)
        @php
            $colors = $section->getColorClasses();
            $colorBadges = [
                'blue' => 'bg-blue-100 text-blue-800 border-blue-200',
                'teal' => 'bg-teal-100 text-teal-800 border-teal-200',
                'amber' => 'bg-amber-100 text-amber-800 border-amber-200',
                'indigo' => 'bg-indigo-100 text-indigo-800 border-indigo-200',
            ];
        @endphp
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 text-xs font-semibold rounded-full border {{ $colorBadges[$section->color_theme] ?? $colorBadges['blue'] }}">
                            {{ ucfirst($section->color_theme) }}
                        </span>
                        @if(!$section->is_active)
                            <span class="px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-600">Inactive</span>
                        @endif
                    </div>
                    <span class="text-sm text-gray-500">Order: {{ $section->order }}</span>
                </div>

                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $section->title }}</h3>
                
                @if($section->badge_text)
                    <p class="text-sm {{ $colors['text'] }} font-semibold mb-2">{{ $section->badge_text }}</p>
                @endif

                <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $section->description }}</p>

                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <span class="text-sm text-gray-500">
                        {{ $section->items->count() }} {{ Str::plural('item', $section->items->count()) }}
                    </span>
                    <div class="flex items-center gap-2">
                        <a href="{{ route('admin.program-sections.show', $section) }}" class="p-2 text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors" title="View & Manage Items">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </a>
                        <a href="{{ route('admin.program-sections.edit', $section) }}" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Section">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        <button onclick="deleteSection({{ $section->id }})" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete Section">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-2 text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">No Program Sections Yet</h3>
            <p class="text-gray-500 mb-4">Create your first program section to get started.</p>
            <a href="{{ route('admin.program-sections.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Section
            </a>
        </div>
    @endforelse
</div>

@endsection

@push('scripts')
<script>
function deleteSection(id) {
    if (confirm('Are you sure you want to delete this section? All items within it will also be deleted.')) {
        fetch(`/admin/program-sections/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => location.reload(), 1000);
            } else {
                showToast('Failed to delete section', 'error');
            }
        })
        .catch(error => {
            showToast('An error occurred', 'error');
        });
    }
}
</script>
@endpush
