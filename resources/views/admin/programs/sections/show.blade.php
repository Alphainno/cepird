@extends('admin.layouts.app')

@section('title', $section->title . ' - Program Section')

@section('content')
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.program-sections.index') }}" class="p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">{{ $section->title }}</h1>
                <p class="text-gray-600 mt-1">Manage program items in this section</p>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.program-sections.edit', $section) }}" class="px-4 py-2 bg-gray-100 text-gray-700 font-semibold rounded-lg hover:bg-gray-200 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Section
            </a>
            <a href="{{ route('admin.program-items.create', $section) }}" class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Item
            </a>
        </div>
    </div>
</div>

<!-- Section Info Card -->
@php
    $colors = $section->getColorClasses();
    $colorBadges = [
        'blue' => 'bg-blue-100 text-blue-800 border-blue-200',
        'teal' => 'bg-teal-100 text-teal-800 border-teal-200',
        'amber' => 'bg-amber-100 text-amber-800 border-amber-200',
        'indigo' => 'bg-indigo-100 text-indigo-800 border-indigo-200',
    ];
@endphp
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex items-start justify-between">
        <div>
            @if($section->badge_text)
                <span class="{{ $colors['text'] }} text-sm font-semibold uppercase tracking-wider">{{ $section->badge_text }}</span>
            @endif
            <p class="text-gray-600 mt-2 max-w-3xl">{{ $section->description }}</p>
        </div>
        <div class="flex items-center gap-3">
            <span class="px-3 py-1 text-xs font-semibold rounded-full border {{ $colorBadges[$section->color_theme] ?? $colorBadges['blue'] }}">
                {{ ucfirst($section->color_theme) }} Theme
            </span>
            @if($section->is_active)
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
            @else
                <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-600">Inactive</span>
            @endif
        </div>
    </div>
</div>

<!-- Items List -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100">
        <h2 class="text-lg font-bold text-gray-800">Program Items ({{ $section->items->count() }})</h2>
    </div>

    @if($section->items->count() > 0)
        <div class="divide-y divide-gray-100">
            @foreach($section->items as $item)
                <div class="p-6 hover:bg-gray-50 transition-colors">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start gap-4">
                            <div class="{{ $colors['bg'] }} w-12 h-12 flex items-center justify-center rounded-lg text-xl">
                                {{ $item->icon ?? '📋' }}
                            </div>
                            <div>
                                <div class="flex items-center gap-3">
                                    <h3 class="font-bold text-gray-900">{{ $item->title }}</h3>
                                    @if($item->duration)
                                        <span class="px-2 py-1 text-xs font-medium rounded {{ $colors['badge_bg'] }} {{ $colors['badge_text'] }}">{{ $item->duration }}</span>
                                    @endif
                                    @if(!$item->is_active)
                                        <span class="px-2 py-1 text-xs font-medium rounded bg-gray-100 text-gray-600">Inactive</span>
                                    @endif
                                </div>
                                <p class="text-gray-600 text-sm mt-1 max-w-2xl line-clamp-2">{{ $item->description }}</p>
                                @if($item->features && count($item->features) > 0)
                                    <div class="mt-2 flex flex-wrap gap-2">
                                        @foreach(array_slice($item->features, 0, 3) as $feature)
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">{{ Str::limit($feature, 30) }}</span>
                                        @endforeach
                                        @if(count($item->features) > 3)
                                            <span class="text-xs text-gray-500">+{{ count($item->features) - 3 }} more</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-gray-500 mr-4">Order: {{ $item->order }}</span>
                            <a href="{{ route('admin.program-items.edit', $item) }}" class="p-2 text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Edit Item">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <button onclick="deleteItem({{ $item->id }})" class="p-2 text-gray-600 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors" title="Delete Item">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">No Items Yet</h3>
            <p class="text-gray-500 mb-4">Add program items to this section.</p>
            <a href="{{ route('admin.program-items.create', $section) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Item
            </a>
        </div>
    @endif
</div>

@endsection

@push('scripts')
<script>
function deleteItem(id) {
    Swal.fire({
        title: 'Delete Program Item?',
        text: 'This will permanently delete this program item. This action cannot be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        focusCancel: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Deleting...',
                text: 'Please wait while we delete the item.',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`/admin/program-items/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Deleted!',
                        text: data.message,
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire('Error!', 'Failed to delete item', 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error!', 'An error occurred while deleting', 'error');
            });
        }
    });
}
</script>
@endpush
