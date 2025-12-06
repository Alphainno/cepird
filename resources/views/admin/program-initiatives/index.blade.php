@extends('admin.layouts.app')

@section('title', 'Programs & Initiatives Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Programs & Initiatives Management</h1>
            <p class="text-slate-600 mt-1">Manage the programs and initiatives section on the about page</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Programs & Initiatives Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the programs displayed on your about page</p>
        </div>

        <form action="{{ route('admin.program-initiatives.store') }}" method="POST" class="p-6 space-y-6" id="programsForm">
            @csrf

            <!-- Section Header -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text</label>
                    <input type="text" name="badge_text" id="badge_text"
                        value="{{ old('badge_text', $programSection->badge_text ?? 'Our Initiatives') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Our Initiatives">
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title', $programSection->title ?? 'Programs & Initiatives') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Programs & Initiatives" required>
                </div>

                <div>
                    <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Section Subtitle</label>
                    <input type="text" name="subtitle" id="subtitle"
                        value="{{ old('subtitle', $programSection->subtitle ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Transforming ideas into impact">
                </div>
            </div>

            <!-- Programs -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Program Cards</h3>
                </div>

                <div id="programsContainer" class="space-y-6">
                    @if($programSection->allPrograms && $programSection->allPrograms->count() > 0)
                        @foreach($programSection->allPrograms as $pIndex => $program)
                            <div class="program-card bg-slate-50 p-4 rounded-sm border border-slate-200" data-program-id="{{ $program->id }}">
                                <div class="flex items-center justify-between mb-4">
                                    <h4 class="text-md font-medium text-slate-800">Program Card {{ $pIndex + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="programs[{{ $pIndex }}][is_active]"
                                                {{ $program->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeProgramBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="programs[{{ $pIndex }}][id]" value="{{ $program->id }}">

                                <div class="grid md:grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="programs[{{ $pIndex }}][title]"
                                            value="{{ old('programs.' . $pIndex . '.title', $program->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Research & Publications" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Emoji)</label>
                                        <input type="text" name="programs[{{ $pIndex }}][icon]"
                                            value="{{ old('programs.' . $pIndex . '.icon', $program->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., 📘">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Color</label>
                                        <select name="programs[{{ $pIndex }}][color]"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="blue" {{ $program->color == 'blue' ? 'selected' : '' }}>Blue</option>
                                            <option value="teal" {{ $program->color == 'teal' ? 'selected' : '' }}>Teal</option>
                                            <option value="amber" {{ $program->color == 'amber' ? 'selected' : '' }}>Amber</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Items -->
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">List Items</label>
                                    <div class="items-container space-y-2" data-program-index="{{ $pIndex }}">
                                        @foreach($program->allItems as $iIndex => $item)
                                            <div class="item-row flex items-center gap-2">
                                                <input type="hidden" name="programs[{{ $pIndex }}][items][{{ $iIndex }}][id]" value="{{ $item->id }}">
                                                <input type="checkbox" name="programs[{{ $pIndex }}][items][{{ $iIndex }}][is_active]"
                                                    {{ $item->is_active ? 'checked' : '' }}
                                                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                                <input type="text" name="programs[{{ $pIndex }}][items][{{ $iIndex }}][text]"
                                                    value="{{ $item->text }}"
                                                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="Enter item text" required>
                                                <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="addItemBtn mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium" data-program-index="{{ $pIndex }}">
                                        + Add Item
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default program template -->
                        <div class="program-card bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-md font-medium text-slate-800">Program Card 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="programs[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeProgramBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-3 gap-4 mb-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="programs[0][title]" value="Research & Publications"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Research & Publications" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Emoji)</label>
                                    <input type="text" name="programs[0][icon]" value="📘"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., 📘">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Color</label>
                                    <select name="programs[0][color]"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="blue" selected>Blue</option>
                                        <option value="teal">Teal</option>
                                        <option value="amber">Amber</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Items -->
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">List Items</label>
                                <div class="items-container space-y-2" data-program-index="0">
                                    <div class="item-row flex items-center gap-2">
                                        <input type="checkbox" name="programs[0][items][0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <input type="text" name="programs[0][items][0][text]" value="Annual Report"
                                            class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Enter item text" required>
                                        <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="addItemBtn mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium" data-program-index="0">
                                    + Add Item
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add Program Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="addProgramBtn"
                        class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Program Card
                    </button>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $programSection->is_active ?? true) ? 'checked' : '' }}
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
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let programIndex = {{ $programSection->allPrograms ? $programSection->allPrograms->count() : 1 }};

    // Add program button
    document.getElementById('addProgramBtn').addEventListener('click', addProgram);

    // Remove program button (delegated)
    document.getElementById('programsContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeProgramBtn')) {
            e.target.closest('.program-card').remove();
            updateProgramNumbers();
        }
        if (e.target.closest('.removeItemBtn')) {
            e.target.closest('.item-row').remove();
        }
        if (e.target.closest('.addItemBtn')) {
            const btn = e.target.closest('.addItemBtn');
            const programIdx = btn.dataset.programIndex;
            const container = btn.previousElementSibling;
            addItem(container, programIdx);
        }
    });

    function addProgram() {
        const container = document.getElementById('programsContainer');
        const programHtml = `
            <div class="program-card bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-md font-medium text-slate-800">Program Card ${programIndex + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="programs[${programIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeProgramBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="programs[${programIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Research & Publications" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Emoji)</label>
                        <input type="text" name="programs[${programIndex}][icon]" value="📘"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., 📘">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Color</label>
                        <select name="programs[${programIndex}][color]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="blue">Blue</option>
                            <option value="teal">Teal</option>
                            <option value="amber">Amber</option>
                        </select>
                    </div>
                </div>

                <!-- Items -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">List Items</label>
                    <div class="items-container space-y-2" data-program-index="${programIndex}">
                        <div class="item-row flex items-center gap-2">
                            <input type="checkbox" name="programs[${programIndex}][items][0][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <input type="text" name="programs[${programIndex}][items][0][text]"
                                class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Enter item text" required>
                            <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <button type="button" class="addItemBtn mt-2 text-blue-600 hover:text-blue-800 text-sm font-medium" data-program-index="${programIndex}">
                        + Add Item
                    </button>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', programHtml);
        programIndex++;
        updateProgramNumbers();
    }

    function addItem(container, programIdx) {
        const itemCount = container.querySelectorAll('.item-row').length;
        const itemHtml = `
            <div class="item-row flex items-center gap-2">
                <input type="checkbox" name="programs[${programIdx}][items][${itemCount}][is_active]" checked
                    class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <input type="text" name="programs[${programIdx}][items][${itemCount}][text]"
                    class="flex-1 px-3 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter item text" required>
                <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', itemHtml);
    }

    function updateProgramNumbers() {
        const programs = document.querySelectorAll('.program-card');
        programs.forEach((program, index) => {
            const title = program.querySelector('h4');
            title.textContent = `Program Card ${index + 1}`;

            // Show remove button only if there are more than 1 programs
            const removeBtn = program.querySelector('.removeProgramBtn');
            if (programs.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize program numbers on page load
    updateProgramNumbers();
});
</script>
@endsection
