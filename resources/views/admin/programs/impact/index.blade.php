@extends('admin.layouts.app')

@section('title', 'Program Impact Stats - Admin')

@section('content')
<div class="mb-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Program Impact Stats</h1>
            <p class="text-gray-600 mt-1">Manage the "Programs by the Numbers" section</p>
        </div>
        <a href="{{ route('admin.program-impact.create') }}" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Impact Stat
        </a>
    </div>
</div>

<!-- Section Header Form -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-800">Section Header</h2>
        <p class="text-sm text-gray-600 mt-1">Edit the title and description for the impact stats section</p>
    </div>
    <form id="sectionForm" action="{{ route('admin.program-impact.update-section') }}" method="POST" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="badge_text" class="block text-sm font-semibold text-gray-700 mb-2">Badge Text *</label>
                <input type="text" name="badge_text" id="badge_text" required value="{{ $section->badge_text ?? 'Measurable Impact' }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" id="title" required value="{{ $section->title ?? 'Programs by the Numbers' }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">{{ $section->description ?? '' }}</textarea>
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ ($section->is_active ?? true) ? 'checked' : '' }}
                        class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <span class="text-sm font-medium text-gray-700">Active (visible on frontend)</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition-colors">
                Update Section
            </button>
        </div>
    </form>
</div>

<!-- Impact Stats Grid -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100">
        <h2 class="text-xl font-bold text-gray-800">Impact Statistics</h2>
        <p class="text-sm text-gray-600 mt-1">{{ $stats->count() }} {{ Str::plural('stat', $stats->count()) }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6">
        @forelse($stats as $stat)
            @php
                $colors = $stat->getColorClasses();
            @endphp
            <div class="p-6 bg-gradient-to-br {{ $colors['gradient'] }} rounded-lg border {{ $colors['border'] }} text-center relative">
                <div class="absolute top-2 right-2 flex gap-1">
                    <a href="{{ route('admin.program-impact.edit', $stat) }}" class="p-1.5 bg-white text-gray-600 hover:text-blue-600 rounded shadow-sm" title="Edit">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <button onclick="deleteStat({{ $stat->id }})" class="p-1.5 bg-white text-gray-600 hover:text-red-600 rounded shadow-sm" title="Delete">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </div>
                
                <div class="text-5xl font-bold {{ $colors['text'] }} mb-2">{{ $stat->value }}</div>
                <p class="font-semibold text-slate-900 mb-1">{{ $stat->label }}</p>
                @if($stat->description)
                    <p class="text-sm text-slate-600">{{ $stat->description }}</p>
                @endif
                
                <div class="mt-3 flex items-center justify-center gap-2">
                    <span class="text-xs px-2 py-1 bg-white rounded">Order: {{ $stat->order }}</span>
                    @if(!$stat->is_active)
                        <span class="text-xs px-2 py-1 bg-gray-200 text-gray-700 rounded">Inactive</span>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-12">
                <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">No Impact Stats Yet</h3>
                <p class="text-gray-500 mb-4">Create your first impact statistic.</p>
                <a href="{{ route('admin.program-impact.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Impact Stat
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('scripts')
<script>
function deleteStat(id) {
    Swal.fire({
        title: 'Delete Impact Stat?',
        text: 'This action cannot be undone!',
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
            Swal.fire({
                title: 'Deleting...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            fetch(`{{ url('/admin/program-impact') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
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
                    Swal.fire('Error!', 'Failed to delete stat', 'error');
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
