@extends('admin.layouts.app')

@section('title', 'What We Do Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">What We Do Management</h1>
            <p class="text-slate-600 mt-1">Manage the what we do section on the about page</p>
        </div>
    </div>

    <!-- What We Do Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit What We Do Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the services displayed on your about page</p>
        </div>

        <form action="{{ route('admin.what-we-do.store') }}" method="POST" class="p-6 space-y-6" id="whatWeDoForm">
            @csrf

            <!-- Badge Text -->
            <div>
                <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text</label>
                <input type="text" name="badge_text" id="badge_text"
                    value="{{ old('badge_text', $whatWeDoSection->badge_text ?? 'Our Services') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Our Services">
                @error('badge_text')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $whatWeDoSection->title ?? 'What We Do') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., What We Do" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Service Items -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Service Items</h3>
                </div>

                <div id="itemsContainer" class="space-y-4">
                    @if($whatWeDoSection->allItems && $whatWeDoSection->allItems->count() > 0)
                        @foreach($whatWeDoSection->allItems as $index => $item)
                            <div class="item-card bg-slate-50 p-4 rounded-sm border border-slate-200" data-item-id="{{ $item->id }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-md font-medium text-slate-800">Service Item {{ $index + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="items[{{ $index }}][is_active]"
                                                {{ $item->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="items[{{ $index }}][id]" value="{{ $item->id }}">

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="items[{{ $index }}][title]"
                                            value="{{ old('items.' . $index . '.title', $item->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Policy & Economic Research" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Font Awesome class)</label>
                                        <input type="text" name="items[{{ $index }}][icon]"
                                            value="{{ old('items.' . $index . '.icon', $item->icon) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., fas fa-file-alt">
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                                    <textarea name="items[{{ $index }}][description]" rows="3"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Enter service description...">{{ old('items.' . $index . '.description', $item->description) }}</textarea>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default item template -->
                        <div class="item-card bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Service Item 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="items[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="items[0][title]" value="Policy & Economic Research"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Policy & Economic Research" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Font Awesome class)</label>
                                    <input type="text" name="items[0][icon]" value="fas fa-file-alt"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., fas fa-file-alt">
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                                <textarea name="items[0][description]" rows="3"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter service description...">Conducting rigorous policy analysis and economic studies.</textarea>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add Item Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="addItemBtn"
                        class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Service Item
                    </button>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $whatWeDoSection->is_active ?? true) ? 'checked' : '' }}
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
    let itemIndex = {{ $whatWeDoSection->allItems ? $whatWeDoSection->allItems->count() : 1 }};

    // Add item button
    document.getElementById('addItemBtn').addEventListener('click', addItem);

    // Remove item button (delegated)
    document.getElementById('itemsContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeItemBtn')) {
            e.target.closest('.item-card').remove();
            updateItemNumbers();
        }
    });

    function addItem() {
        const container = document.getElementById('itemsContainer');
        const itemHtml = `
            <div class="item-card bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Service Item ${itemIndex + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="items[${itemIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeItemBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="items[${itemIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Policy & Economic Research" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Font Awesome class)</label>
                        <input type="text" name="items[${itemIndex}][icon]" value="fas fa-lightbulb"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., fas fa-file-alt">
                    </div>
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                    <textarea name="items[${itemIndex}][description]" rows="3"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter service description..."></textarea>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', itemHtml);
        itemIndex++;
        updateItemNumbers();
    }

    function updateItemNumbers() {
        const items = document.querySelectorAll('.item-card');
        items.forEach((item, index) => {
            const title = item.querySelector('h4');
            title.textContent = `Service Item ${index + 1}`;

            // Show remove button only if there are more than 1 items
            const removeBtn = item.querySelector('.removeItemBtn');
            if (items.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize item numbers on page load
    updateItemNumbers();
});
</script>
@endsection
