@extends('admin.layouts.app')

@section('title', 'Header Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Header Management</h1>
            <p class="text-slate-600 mt-1">Manage the navigation header and menu items</p>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Header Settings</h2>
            <p class="text-sm text-slate-600 mt-1">Update the logo, brand name, and navigation menu</p>
        </div>

        <form action="{{ route('admin.header.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6" id="headerForm">
            @csrf

            <!-- Brand Settings -->
            <div class="border-b border-slate-200 pb-6">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Brand Settings</h3>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Logo -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Logo</label>
                        <div class="flex items-center gap-4">
                            @if($headerSetting->logo)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $headerSetting->logo) }}" alt="Logo" class="h-16 w-auto object-contain border border-slate-200 rounded-sm p-2">
                                    <label class="flex items-center mt-2">
                                        <input type="checkbox" name="remove_logo" class="w-4 h-4 text-red-600 border-slate-300 rounded focus:ring-red-500">
                                        <span class="ml-2 text-sm text-red-600">Remove logo</span>
                                    </label>
                                </div>
                            @endif
                            <div class="flex-1">
                                <input type="file" name="logo" accept="image/*"
                                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <p class="text-xs text-slate-500 mt-1">Recommended: PNG or SVG, max 2MB</p>
                            </div>
                        </div>
                    </div>

                    <!-- Brand Name & Tagline -->
                    <div class="space-y-4">
                        <div>
                            <label for="brand_name" class="block text-sm font-medium text-slate-700 mb-2">Brand Name <span class="text-red-500">*</span></label>
                            <input type="text" name="brand_name" id="brand_name"
                                value="{{ old('brand_name', $headerSetting->brand_name ?? 'CEPIRD') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., CEPIRD" required>
                        </div>

                        <div>
                            <label for="tagline" class="block text-sm font-medium text-slate-700 mb-2">Tagline</label>
                            <input type="text" name="tagline" id="tagline"
                                value="{{ old('tagline', $headerSetting->tagline ?? 'Innovate. Lead. Inspire.') }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Innovate. Lead. Inspire.">
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="show_tagline" id="show_tagline"
                                {{ old('show_tagline', $headerSetting->show_tagline ?? true) ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <label for="show_tagline" class="ml-2 text-sm font-medium text-slate-700">Show tagline</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Items -->
            <div class="space-y-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Navigation Menu Items</h3>
                </div>

                <div class="bg-slate-50 p-4 rounded-sm mb-4">
                    <p class="text-sm text-slate-600">
                        <strong>Route Names:</strong> Use Laravel route names like <code class="bg-slate-200 px-1 rounded">home</code>, <code class="bg-slate-200 px-1 rounded">about</code>, <code class="bg-slate-200 px-1 rounded">contact</code>, etc.<br>
                        <strong>Custom URL:</strong> For external links, leave route name empty and enter the full URL.
                    </p>
                </div>

                <div id="menuItemsContainer" class="space-y-4">
                    @if($menuItems->count() > 0)
                        @foreach($menuItems as $index => $menuItem)
                            <div class="menu-item bg-slate-50 p-4 rounded-sm border border-slate-200" data-item-id="{{ $menuItem->id }}">
                                <div class="flex items-center justify-between mb-3">
                                    <h4 class="text-md font-medium text-slate-800">Menu Item {{ $index + 1 }}</h4>
                                    <div class="flex items-center space-x-2">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="menu_items[{{ $index }}][is_active]"
                                                {{ $menuItem->is_active ? 'checked' : '' }}
                                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                            <span class="ml-2 text-sm text-slate-600">Active</span>
                                        </label>
                                        <button type="button" class="removeMenuItemBtn text-red-600 hover:text-red-800 p-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <input type="hidden" name="menu_items[{{ $index }}][id]" value="{{ $menuItem->id }}">

                                <div class="grid md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                        <input type="text" name="menu_items[{{ $index }}][title]"
                                            value="{{ old('menu_items.' . $index . '.title', $menuItem->title) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., Home" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Route Name</label>
                                        <input type="text" name="menu_items[{{ $index }}][route_name]"
                                            value="{{ old('menu_items.' . $index . '.route_name', $menuItem->route_name) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., home">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">Custom URL</label>
                                        <input type="text" name="menu_items[{{ $index }}][url]"
                                            value="{{ old('menu_items.' . $index . '.url', $menuItem->getRawOriginal('url')) }}"
                                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="e.g., https://example.com">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="menu_items[{{ $index }}][open_in_new_tab]"
                                            {{ $menuItem->open_in_new_tab ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Open in new tab</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <!-- Default menu item template -->
                        <div class="menu-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                            <div class="flex items-center justify-between mb-3">
                                <h4 class="text-md font-medium text-slate-800">Menu Item 1</h4>
                                <div class="flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="menu_items[0][is_active]" checked
                                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-slate-600">Active</span>
                                    </label>
                                    <button type="button" class="removeMenuItemBtn text-red-600 hover:text-red-800 p-1" style="display: none;">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                                    <input type="text" name="menu_items[0][title]" value="Home"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., Home" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Route Name</label>
                                    <input type="text" name="menu_items[0][route_name]" value="home"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., home">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Custom URL</label>
                                    <input type="text" name="menu_items[0][url]"
                                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="e.g., https://example.com">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="flex items-center">
                                    <input type="checkbox" name="menu_items[0][open_in_new_tab]"
                                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-slate-600">Open in new tab</span>
                                </label>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Add Menu Item Button -->
                <div class="flex justify-center pt-4">
                    <button type="button" id="addMenuItemBtn"
                        class="px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-sm hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Menu Item
                    </button>
                </div>
            </div>

            <!-- Is Active -->
            <div class="flex items-center pt-4 border-t border-slate-200">
                <input type="checkbox" name="is_active" id="is_active"
                    {{ old('is_active', $headerSetting->is_active ?? true) ? 'checked' : '' }}
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
    let menuItemIndex = {{ $menuItems->count() > 0 ? $menuItems->count() : 1 }};

    // Add menu item button
    document.getElementById('addMenuItemBtn').addEventListener('click', addMenuItem);

    // Remove menu item button (delegated)
    document.getElementById('menuItemsContainer').addEventListener('click', function(e) {
        if (e.target.closest('.removeMenuItemBtn')) {
            e.target.closest('.menu-item').remove();
            updateMenuItemNumbers();
        }
    });

    function addMenuItem() {
        const container = document.getElementById('menuItemsContainer');
        const menuItemHtml = `
            <div class="menu-item bg-slate-50 p-4 rounded-sm border border-slate-200">
                <div class="flex items-center justify-between mb-3">
                    <h4 class="text-md font-medium text-slate-800">Menu Item ${menuItemIndex + 1}</h4>
                    <div class="flex items-center space-x-2">
                        <label class="flex items-center">
                            <input type="checkbox" name="menu_items[${menuItemIndex}][is_active]" checked
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                        <button type="button" class="removeMenuItemBtn text-red-600 hover:text-red-800 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                        <input type="text" name="menu_items[${menuItemIndex}][title]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., Home" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Route Name</label>
                        <input type="text" name="menu_items[${menuItemIndex}][route_name]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., home">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Custom URL</label>
                        <input type="text" name="menu_items[${menuItemIndex}][url]"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="e.g., https://example.com">
                    </div>
                </div>
                <div class="mt-3">
                    <label class="flex items-center">
                        <input type="checkbox" name="menu_items[${menuItemIndex}][open_in_new_tab]"
                            class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                        <span class="ml-2 text-sm text-slate-600">Open in new tab</span>
                    </label>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', menuItemHtml);
        menuItemIndex++;
        updateMenuItemNumbers();
    }

    function updateMenuItemNumbers() {
        const menuItems = document.querySelectorAll('.menu-item');
        menuItems.forEach((item, index) => {
            const title = item.querySelector('h4');
            title.textContent = `Menu Item ${index + 1}`;

            // Show remove button only if there are more than 1 items
            const removeBtn = item.querySelector('.removeMenuItemBtn');
            if (menuItems.length > 1) {
                removeBtn.style.display = 'block';
            } else {
                removeBtn.style.display = 'none';
            }
        });
    }

    // Initialize menu item numbers on page load
    updateMenuItemNumbers();
});
</script>
@endsection
