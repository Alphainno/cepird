@extends('admin.layouts.app')

@section('title', 'Program Categories')

@section('content')
<div class="container-fluid px-4 py-6">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Program Categories</h1>
            <p class="text-slate-600 mt-1">Manage the program category cards shown on the Programs page</p>
        </div>
        <button onclick="openAddModal()" class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all">
            <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Category
        </div>
    </div>

    <!-- Categories Table -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Icon</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Color</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Anchor Link</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($categories as $category)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-slate-900 font-medium">{{ $category->order }}</td>
                            <td class="px-6 py-4 text-2xl">{{ $category->icon }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $category->title }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 max-w-xs truncate">{{ $category->description }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full
                                    @if($category->color == 'blue') bg-blue-100 text-blue-800
                                    @elseif($category->color == 'teal') bg-teal-100 text-teal-800
                                    @elseif($category->color == 'amber') bg-amber-100 text-amber-800
                                    @else bg-indigo-100 text-indigo-800
                                    @endif">
                                    {{ ucfirst($category->color) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $category->anchor_link }}</td>
                            <td class="px-6 py-4">
                                @if($category->is_active)
                                    <span class="px-3 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium bg-gray-100 text-gray-800 rounded-full">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <button onclick='openEditModal(@json($category))' class="px-3 py-1.5 bg-blue-50 text-blue-600 text-sm font-medium rounded hover:bg-blue-100 transition-colors">
                                        Edit
                                    </button>
                                    <form action="{{ route('admin.program-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirmDelete(event, '{{ $category->title }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 text-sm font-medium rounded hover:bg-red-100 transition-colors">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center">
                                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-lg font-medium mb-2">No categories found</p>
                                    <p class="text-sm">Get started by adding your first program category</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add/Edit Modal -->
<div id="categoryModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-slate-200">
            <h2 id="modalTitle" class="text-2xl font-bold text-slate-900">Add Program Category</h2>
        </div>

        <form id="categoryForm" method="POST" class="p-6 space-y-6">
            @csrf
            <input type="hidden" id="methodField" name="_method" value="POST">

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
                        Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                        placeholder="e.g., Research & Publications"
                    >
                </div>

                <div>
                    <label for="icon" class="block text-sm font-semibold text-slate-700 mb-2">
                        Icon (Emoji)
                    </label>
                    <input
                        type="text"
                        id="icon"
                        name="icon"
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                        placeholder="📘"
                    >
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                    Description
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="Brief description of this program category"
                ></textarea>
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label for="color" class="block text-sm font-semibold text-slate-700 mb-2">
                        Color <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="color"
                        name="color"
                        required
                        class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    >
                        <option value="blue">Blue</option>
                        <option value="teal">Teal</option>
                        <option value="amber">Amber</option>
                        <option value="indigo">Indigo</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="anchor_link" class="block text-sm font-semibold text-slate-700 mb-2">
                    Anchor Link <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="anchor_link"
                    name="anchor_link"
                    required
                    class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                    placeholder="#research-publications"
                >
                <p class="text-xs text-slate-500 mt-1">Link to the section on the page (e.g., #research-publications)</p>
            </div>

            <div class="flex items-center gap-3">
                <input
                    type="checkbox"
                    id="is_active"
                    name="is_active"
                    value="1"
                    checked
                    class="w-5 h-5 text-indigo-600 border-slate-300 rounded focus:ring-2 focus:ring-indigo-500"
                >
                <label for="is_active" class="text-sm font-medium text-slate-700">
                    Active (Display this category on the website)
                </label>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
                <button
                    type="submit"
                    class="px-6 py-2.5 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 transition-all"
                >
                    <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Category
                </button>
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-6 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-all"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
        <div class="p-6">
            <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full">
                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 text-center mb-2">Delete Category</h3>
            <p class="text-slate-600 text-center mb-6">
                Are you sure you want to delete "<span id="deleteCategoryName" class="font-semibold text-slate-900"></span>"? This action cannot be undone.
            </p>
            <div class="flex items-center gap-3">
                <button
                    onclick="closeDeleteModal()"
                    class="flex-1 px-4 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-all"
                >
                    Cancel
                </button>
                <button
                    id="confirmDeleteBtn"
                    class="flex-1 px-4 py-2.5 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition-all"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let deleteForm = null;

function confirmDelete(event, categoryName) {
    event.preventDefault();
    deleteForm = event.target;
    document.getElementById('deleteCategoryName').textContent = categoryName;
    document.getElementById('deleteModal').classList.remove('hidden');
    return false;
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    deleteForm = null;
}

document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
    if (deleteForm) {
        deleteForm.submit();
    }
});

// Close modal on outside click
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDeleteModal();
    }
});

function openAddModal() {
    document.getElementById('modalTitle').textContent = 'Add Program Category';
    document.getElementById('categoryForm').action = '{{ route("admin.program-categories.store") }}';
    document.getElementById('methodField').value = 'POST';
    document.getElementById('categoryForm').reset();
    document.getElementById('is_active').checked = true;
    document.getElementById('categoryModal').classList.remove('hidden');
}

function openEditModal(category) {
    document.getElementById('modalTitle').textContent = 'Edit Program Category';
    document.getElementById('categoryForm').action = `/admin/program-categories/${category.id}`;
    document.getElementById('methodField').value = 'PUT';

    document.getElementById('title').value = category.title;
    document.getElementById('description').value = category.description || '';
    document.getElementById('icon').value = category.icon || '';
    document.getElementById('color').value = category.color;
    document.getElementById('anchor_link').value = category.anchor_link;
    document.getElementById('order').value = category.order;
    document.getElementById('is_active').checked = category.is_active;

    document.getElementById('categoryModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('categoryModal').classList.add('hidden');
}

// Close modal on outside click
document.getElementById('categoryModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endsection
