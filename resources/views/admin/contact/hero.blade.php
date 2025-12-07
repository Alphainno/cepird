@extends('admin.layouts.app')

@section('title', 'Contact Hero Section')

@section('content')
<div class="space-y-6">


    @if($errors->any())
        <div class="p-4 rounded-sm border border-red-200 bg-red-50 text-red-800 text-sm space-y-1">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Contact Hero Section</h1>
            <p class="text-slate-600 mt-1">Manage the hero content for the contact page</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit Contact Hero</h2>
            <p class="text-sm text-slate-600 mt-1">Update the hero heading, subtext, and background</p>
        </div>

        <form action="{{ route('admin.contact-hero.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            {{-- Keep POST route; controller handles create/update. --}}

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="badge_text" class="block text-sm font-medium text-slate-700 mb-2">Badge Text</label>
                    <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text', $heroSection->badge_text ?? '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Get In Touch">
                    @error('badge_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $heroSection->title ?? '') }}" required class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., Contact Us">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter a short description">{{ old('description', $heroSection->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid md:grid-cols-2 gap-6 items-start">
                <div>
                    <label for="background_image" class="block text-sm font-medium text-slate-700 mb-2">Background Image</label>
                    <input type="file" name="background_image" id="background_image" accept="image/*" class="block w-full text-sm text-slate-700 border border-slate-300 rounded-sm cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-2 text-xs text-slate-500">Recommended size: at least 1600px wide</p>
                    @error('background_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                @php
                    $heroPreview = $heroSection?->background_url ?? null;
                @endphp
                @if($heroPreview)
                    <div class="border border-slate-200 rounded-sm overflow-hidden">
                        <img src="{{ $heroPreview }}" alt="Contact hero background" class="w-full h-40 object-cover">
                    </div>
                @endif
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded" {{ old('is_active', $heroSection->is_active ?? true) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-slate-700">Active (display on site)</label>
            </div>

            <div class="flex justify-end pt-6 border-t border-slate-200">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
