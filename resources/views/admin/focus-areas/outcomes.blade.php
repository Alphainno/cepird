@extends('admin.layouts.app')

@section('title', 'Focus Area Outcomes')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Focus Area Outcomes</h1>
            <p class="text-slate-600 mt-1">Manage the deliverables shown under the "What We Deliver" section.</p>
        </div>
    </div>

    <!-- Existing Outcomes -->
    <div class="grid gap-6">
        @foreach($outcomes as $outcome)
        <div class="bg-white rounded-sm shadow-sm border border-slate-200 relative">
            <!-- Delete Icon -->
            <div class="absolute top-4 right-4">
                <button type="button" class="text-red-600 hover:text-red-700 transition-colors p-1 rounded hover:bg-red-50" title="Delete Outcome" onclick="openDeleteModal({{ $outcome->id }}, '{{ $outcome->title }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.focus-area-outcomes.update', $outcome) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-blue-50 rounded-sm flex items-center justify-center text-2xl">{{ $outcome->icon ?? '📌' }}</div>
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">{{ $outcome->title }}</h3>
                            <p class="text-sm text-slate-600">Outcome #{{ $outcome->sort_order }}</p>
                        </div>
                    </div>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ $outcome->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-slate-600">Active</span>
                    </label>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $outcome->title) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                        <input type="text" name="icon" value="{{ old('icon', $outcome->icon) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 📋">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $outcome->description) }}</textarea>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 1</label>
                        <input type="text" name="bullet1" value="{{ old('bullet1', $outcome->bullet1) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 2</label>
                        <input type="text" name="bullet2" value="{{ old('bullet2', $outcome->bullet2) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 3</label>
                        <input type="text" name="bullet3" value="{{ old('bullet3', $outcome->bullet3) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $outcome->sort_order) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="1" required>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Update Outcome</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>

    <!-- Add New Outcome Button -->
    <div class="flex justify-center">
        <button type="button" id="showOutcomeFormBtn" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add Outcome
        </button>
    </div>

    <!-- Create Outcome Form (hidden until button click) -->
    <div id="outcomeCreateFormContainer" class="bg-white rounded-sm shadow-sm border border-slate-200 hidden">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Add New Outcome</h2>
            <p class="text-sm text-slate-600 mt-1">Add a new deliverable card.</p>
        </div>
        <form id="outcomeCreateForm" action="{{ route('admin.focus-area-outcomes.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Policy Frameworks" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 📋">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" rows="2" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Short description">{{ old('description') }}</textarea>
            </div>
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 1</label>
                    <input type="text" name="bullet1" value="{{ old('bullet1') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Digital Transformation Strategy">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 2</label>
                    <input type="text" name="bullet2" value="{{ old('bullet2') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Startup Ecosystem Policy">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Bullet 3</label>
                    <input type="text" name="bullet3" value="{{ old('bullet3') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., SME Development Guidelines">
                </div>
            </div>
            <div class="grid md:grid-cols-2 gap-4 items-center">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', ($outcomes->max('sort_order') ?? 0) + 1) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" min="1">
                </div>
                <label class="flex items-center mt-6 md:mt-0">
                    <input type="checkbox" name="is_active" value="1" class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500" checked>
                    <span class="ml-2 text-sm text-slate-700">Active</span>
                </label>
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" id="cancelOutcomeBtn" class="px-6 py-3 bg-slate-200 text-slate-700 font-semibold rounded-sm hover:bg-slate-300 transition-colors">Cancel</button>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">Save Outcome</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
            <div class="p-6">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">Delete Outcome</h3>
                        <p class="text-sm text-gray-600 mt-1">This action cannot be undone.</p>
                    </div>
                </div>
                <p class="text-gray-700 mb-6">
                    Are you sure you want to delete "<span id="deleteOutcomeTitle" class="font-semibold"></span>"? This will permanently remove the outcome from the system.
                </p>
                <div class="flex justify-end space-x-3">
                    <button id="cancelDeleteBtn" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                        Cancel
                    </button>
                    <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition-colors">
                        Delete Outcome
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let deleteOutcomeId = null;

    function openDeleteModal(outcomeId, outcomeTitle) {
        deleteOutcomeId = outcomeId;
        document.getElementById('deleteOutcomeTitle').textContent = outcomeTitle;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
        deleteOutcomeId = null;
    }

    function confirmDelete() {
        if (deleteOutcomeId) {
            // Create and submit the delete form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/focus-area-outcomes/${deleteOutcomeId}`;

            // Add CSRF token
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken.getAttribute('content');
                form.appendChild(csrfInput);
            }

            // Add method spoofing for DELETE
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();
        }
    }

    (function() {
        const btn = document.getElementById('showOutcomeFormBtn');
        const formContainer = document.getElementById('outcomeCreateFormContainer');
        const cancelBtn = document.getElementById('cancelOutcomeBtn');

        if (btn && formContainer) {
            btn.addEventListener('click', () => {
                formContainer.classList.remove('hidden');
                btn.classList.add('hidden');
                formContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
            });
        }

        if (cancelBtn && formContainer && btn) {
            cancelBtn.addEventListener('click', () => {
                formContainer.classList.add('hidden');
                btn.classList.remove('hidden');
            });
        }

        // Modal event listeners
        const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        const deleteModal = document.getElementById('deleteModal');

        if (cancelDeleteBtn) {
            cancelDeleteBtn.addEventListener('click', closeDeleteModal);
        }

        if (confirmDeleteBtn) {
            confirmDeleteBtn.addEventListener('click', confirmDelete);
        }

        // Close modal when clicking outside
        if (deleteModal) {
            deleteModal.addEventListener('click', (e) => {
                if (e.target === deleteModal) {
                    closeDeleteModal();
                }
            });
        }

        // Close modal on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !deleteModal.classList.contains('hidden')) {
                closeDeleteModal();
            }
        });
    })();
</script>
@endpush
