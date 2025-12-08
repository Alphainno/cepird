@extends('layouts.admin')

@section('title', 'Program Overview Section - Admin')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-2">Program Overview Section</h1>
        <p class="text-slate-600">Manage the introduction section for program categories</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.program-overview.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- Badge Text -->
                <div>
                    <label for="badge_text" class="block text-sm font-semibold text-slate-700 mb-2">
                        Badge Text <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="badge_text"
                        name="badge_text"
                        value="{{ old('badge_text', $overviewSection->badge_text ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="Our Impact Initiatives"
                        required
                    >
                    @error('badge_text')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
                        Section Title <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $overviewSection->title ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="Four Core Program Areas"
                        required
                    >
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-transparent"
                        placeholder="From cutting-edge research to hands-on entrepreneurship support..."
                        required
                    >{{ old('description', $overviewSection->description ?? '') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Active Status -->
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="is_active"
                        name="is_active"
                        value="1"
                        {{ old('is_active', $overviewSection->is_active ?? true) ? 'checked' : '' }}
                        class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-2 focus:ring-teal-500"
                    >
                    <label for="is_active" class="ml-2 text-sm font-medium text-slate-700">
                        Active (Display on frontend)
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center gap-4 pt-4">
                    <button
                        type="submit"
                        class="px-6 py-2 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700 transition-colors"
                    >
                        Save Changes
                    </button>
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="px-6 py-2 bg-slate-200 text-slate-700 font-semibold rounded-lg hover:bg-slate-300 transition-colors"
                    >
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    @if($overviewSection)
    <div class="bg-slate-50 rounded-lg shadow-md p-6 mt-8">
        <h2 class="text-xl font-bold text-slate-900 mb-4">Preview</h2>
        <div class="text-center">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $overviewSection->badge_text }}</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">{{ $overviewSection->title }}</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                {{ $overviewSection->description }}
            </p>
        </div>
    </div>
    @endif
</div>
@endsection
