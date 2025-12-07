@extends('admin.layouts.app')

@section('title', 'Strategic Pillars')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Strategic Pillars</h1>
            <p class="text-slate-600 mt-1">Manage the four core focus areas section on the Focus Areas page</p>
        </div>
    </div>

    <!-- Create New Pillar Form (Hidden by default) -->
    <div id="createPillarForm" class="hidden bg-white rounded-sm shadow-sm border border-slate-200 overflow-hidden">
        <div class="bg-blue-50 border-b border-blue-100 px-6 py-4">
            <h2 class="text-lg font-semibold text-slate-900">Create New Strategic Pillar</h2>
        </div>
        <form action="{{ route('admin.strategic-pillars.store') }}" method="POST" class="p-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" value="{{ old('title') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Policy Development" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Emoji) <span class="text-red-500">*</span></label>
                    <input type="text" name="icon" value="{{ old('icon') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., 📋" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="2"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter description..." required>{{ old('description') }}</textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Color Theme <span class="text-red-500">*</span></label>
                    <select name="color_theme"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="blue">Blue</option>
                        <option value="teal">Teal</option>
                        <option value="amber">Amber</option>
                        <option value="indigo">Indigo</option>
                        <option value="green">Green</option>
                        <option value="red">Red</option>
                        <option value="purple">Purple</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Link Href <span class="text-red-500">*</span></label>
                    <input type="text" name="link_href" value="{{ old('link_href') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., #policy-development" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order <span class="text-red-500">*</span></label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $strategicPillars->count() + 1) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        min="1" required>
                </div>
            </div>

            <!-- Hidden fields for badge_text and section_title (will be synced from existing) -->
            <input type="hidden" name="badge_text" value="{{ $strategicPillars->first()->badge_text ?? 'Our Strategic Pillars' }}">
            <input type="hidden" name="section_title" value="{{ $strategicPillars->first()->section_title ?? 'Four Core Focus Areas' }}">

            <div class="flex items-center mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" checked
                        class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-sm text-slate-600">Active</span>
                </label>
            </div>

            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleCreateForm()"
                    class="px-6 py-2 bg-slate-200 text-slate-700 font-semibold rounded-sm hover:bg-slate-300 transition-colors">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">
                    Create Pillar
                </button>
            </div>
        </form>
    </div>

    <!-- Section Header Settings -->
    @if($strategicPillars->count() > 0)
    <div class="bg-white rounded-sm shadow-sm border border-slate-200 p-6">
        <h2 class="text-lg font-semibold text-slate-900 mb-4">Section Header</h2>
        <form action="{{ route('admin.strategic-pillars.update', $strategicPillars->first()) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Badge Text <span class="text-red-500">*</span></label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $strategicPillars->first()->badge_text) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Our Strategic Pillars" required>
                    @error('badge_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Section Title <span class="text-red-500">*</span></label>
                    <input type="text" name="section_title" value="{{ old('section_title', $strategicPillars->first()->section_title) }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Four Core Focus Areas" required>
                    @error('section_title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">
                    Update Section Header
                </button>
            </div>
        </form>
    </div>
    @endif

    <!-- Add More Pillar Button -->
    <div class="flex justify-end mt-6">
        <button type="button" onclick="toggleCreateForm()"
            class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors text-lg">
            + Add More Pillar
        </button>
    </div>

    <!-- Strategic Pillars Cards -->
    <div class="grid gap-6">
        @foreach($strategicPillars as $pillar)
        <div class="bg-white rounded-sm shadow-sm border border-slate-200 overflow-hidden">
            <!-- Update Form -->
            <form action="{{ route('admin.strategic-pillars.update', $pillar) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-{{ $pillar->color_theme }}-100 rounded-sm flex items-center justify-center text-2xl">
                                {{ $pillar->icon }}
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Pillar {{ $pillar->sort_order }}: {{ $pillar->title }}</h3>
                                <span class="text-sm text-{{ $pillar->color_theme }}-600 font-medium">{{ ucfirst($pillar->color_theme) }} Theme</span>
                            </div>
                        </div>
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ $pillar->is_active ? 'checked' : '' }}
                                class="w-4 h-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-sm text-slate-600">Active</span>
                        </label>
                    </div>

                    <input type="hidden" name="badge_text" value="{{ $pillar->badge_text }}">
                    <input type="hidden" name="section_title" value="{{ $pillar->section_title }}">

                    <div class="grid md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $pillar->title) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., Policy Development" required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Icon (Emoji) <span class="text-red-500">*</span></label>
                            <input type="text" name="icon" value="{{ old('icon', $pillar->icon) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., 📋" required>
                            @error('icon')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                        <textarea name="description" rows="2"
                            class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter description..." required>{{ old('description', $pillar->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Color Theme <span class="text-red-500">*</span></label>
                            <select name="color_theme"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                <option value="blue" {{ $pillar->color_theme == 'blue' ? 'selected' : '' }}>Blue</option>
                                <option value="teal" {{ $pillar->color_theme == 'teal' ? 'selected' : '' }}>Teal</option>
                                <option value="amber" {{ $pillar->color_theme == 'amber' ? 'selected' : '' }}>Amber</option>
                                <option value="indigo" {{ $pillar->color_theme == 'indigo' ? 'selected' : '' }}>Indigo</option>
                                <option value="green" {{ $pillar->color_theme == 'green' ? 'selected' : '' }}>Green</option>
                                <option value="red" {{ $pillar->color_theme == 'red' ? 'selected' : '' }}>Red</option>
                                <option value="purple" {{ $pillar->color_theme == 'purple' ? 'selected' : '' }}>Purple</option>
                            </select>
                            @error('color_theme')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Link Href <span class="text-red-500">*</span></label>
                            <input type="text" name="link_href" value="{{ old('link_href', $pillar->link_href) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g., #policy-development" required>
                            @error('link_href')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Sort Order <span class="text-red-500">*</span></label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $pillar->sort_order) }}"
                                class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                min="1" required>
                            @error('sort_order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-sm hover:bg-blue-700 transition-colors">
                            Update Pillar
                        </button>
                    </div>
                </div>
            </form>

            <!-- Delete Button (Outside Update Form) -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200">
                <form action="{{ route('admin.strategic-pillars.destroy', $pillar) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this pillar?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="text-sm text-red-600 hover:text-red-700 font-medium">
                        🗑️ Delete Pillar
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    @if($strategicPillars->count() === 0)
    <div class="bg-white rounded-sm shadow-sm border border-slate-200 p-12 text-center">
        <div class="text-slate-400 text-5xl mb-4">📋</div>
        <h3 class="text-lg font-semibold text-slate-900 mb-2">No Strategic Pillars Found</h3>
        <p class="text-slate-600">Run the seeder to populate the strategic pillars data.</p>
        <code class="block mt-4 bg-slate-100 px-4 py-2 rounded text-sm text-slate-700">php artisan db:seed --class=StrategicPillarSeeder</code>
    </div>
    @endif
</div>

<script>
function toggleCreateForm() {
    const form = document.getElementById('createPillarForm');
    form.classList.toggle('hidden');

    // Scroll to form when showing
    if (!form.classList.contains('hidden')) {
        form.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}
</script>
@endsection
