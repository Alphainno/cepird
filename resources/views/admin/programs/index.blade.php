@extends('admin.layouts.app')

@section('title', 'Programs Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Programs Management</h1>
            <p class="text-slate-600 mt-1">Manage the programs & initiatives content on the landing page</p>
        </div>
        <button type="button" onclick="openAddModal()" class="bg-blue-600 text-white px-4 py-2 rounded-sm hover:bg-blue-700">
            Add New Program
        </button>
    </div>

    <!-- Programs by Category -->
    @foreach(['research' => 'Research & Publications', 'training' => 'Training & Certification', 'innovation' => 'Innovation Programs', 'event' => 'Upcoming Events'] as $category => $title)
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">{{ $title }}</h2>
        </div>
        <div class="p-6">
            @if(isset($programs[$category]) && $programs[$category]->count() > 0)
            <div class="space-y-4">
                @foreach($programs[$category] as $program)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-sm">
                    <div>
                        <h3 class="font-medium text-slate-900">{{ $program->title }}</h3>
                        @if($program->description)
                        <p class="text-sm text-slate-600 mt-1">{{ Str::limit($program->description, 100) }}</p>
                        @endif
                        @if($program->category === 'event' && $program->event_date)
                        <p class="text-xs text-slate-500">{{ $program->event_date->format('M j, Y') }} @if($program->location) - {{ $program->location }} @endif</p>
                        @endif
                    </div>
                    <div class="flex space-x-2">
                        <button type="button" onclick="editProgram({{ $program->id }}, '{{ $program->title }}', '{{ addslashes($program->description ?? '') }}', '{{ $program->category }}', '{{ $program->link }}', '{{ $program->event_date ? $program->event_date->format('Y-m-d') : '' }}', '{{ addslashes($program->location ?? '') }}', {{ $program->sort_order }}, {{ $program->is_active ? 1 : 0 }})" class="text-blue-600 hover:text-blue-800">Edit</button>
                        <form action="{{ route('admin.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-slate-500">No programs in this category yet.</p>
            @endif
        </div>
    </div>
    @endforeach
</div>

<!-- Add/Edit Modal -->
<div id="programModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-sm max-w-2xl w-full max-h-screen overflow-y-auto">
            <div class="p-6 border-b border-slate-200">
                <h3 id="modalTitle" class="text-lg font-semibold text-slate-900">Add New Program</h3>
            </div>
            <form id="programForm" action="{{ route('admin.programs.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <input type="hidden" name="_method" id="methodField" value="POST">
                <input type="hidden" name="program_id" id="programId">

                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Category <span class="text-red-500">*</span></label>
                    <select name="category" id="category" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="research">Research & Publications</option>
                        <option value="training">Training & Certification</option>
                        <option value="innovation">Innovation Programs</option>
                        <option value="event">Upcoming Events</option>
                    </select>
                </div>

                <div>
                    <label for="link" class="block text-sm font-medium text-slate-700 mb-2">Link</label>
                    <input type="url" name="link" id="link" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div id="eventFields" class="hidden space-y-4">
                    <div>
                        <label for="event_date" class="block text-sm font-medium text-slate-700 mb-2">Event Date</label>
                        <input type="date" name="event_date" id="event_date" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="location" class="block text-sm font-medium text-slate-700 mb-2">Location</label>
                        <input type="text" name="location" id="location" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="0">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" checked class="rounded">
                    <label for="is_active" class="ml-2 text-sm text-slate-700">Active</label>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-slate-600 border border-slate-300 rounded-sm hover:bg-slate-50">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openAddModal() {
    document.getElementById('modalTitle').textContent = 'Add New Program';
    document.getElementById('programForm').action = '{{ route('admin.programs.store') }}';
    document.getElementById('methodField').value = 'POST';
    document.getElementById('programId').value = '';
    document.getElementById('programForm').reset();
    document.getElementById('programModal').classList.remove('hidden');
    toggleEventFields();
}

function editProgram(id, title, description, category, link, eventDate, location, sortOrder, isActive) {
    document.getElementById('modalTitle').textContent = 'Edit Program';
    document.getElementById('programForm').action = '{{ route('admin.programs.update', ':id') }}'.replace(':id', id);
    document.getElementById('methodField').value = 'PUT';
    document.getElementById('programId').value = id;
    document.getElementById('title').value = title;
    document.getElementById('description').value = description;
    document.getElementById('category').value = category;
    document.getElementById('link').value = link;
    document.getElementById('event_date').value = eventDate;
    document.getElementById('location').value = location;
    document.getElementById('sort_order').value = sortOrder;
    document.getElementById('is_active').checked = isActive;
    document.getElementById('programModal').classList.remove('hidden');
    toggleEventFields();
}

function closeModal() {
    document.getElementById('programModal').classList.add('hidden');
}

function toggleEventFields() {
    const category = document.getElementById('category').value;
    const eventFields = document.getElementById('eventFields');
    if (category === 'event') {
        eventFields.classList.remove('hidden');
    } else {
        eventFields.classList.add('hidden');
    }
}

document.getElementById('category').addEventListener('change', toggleEventFields);
</script>
@endsection
