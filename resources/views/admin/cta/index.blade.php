@extends('admin.layouts.app')

@section('title', 'CTA Section Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">CTA Section Management</h1>
            <p class="text-slate-600 mt-1">Manage the call-to-action section content on the landing page</p>
        </div>
    </div>

    <!-- CTA Section Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="p-6 border-b border-slate-200">
            <h2 class="text-lg font-semibold text-slate-900">Edit CTA Section</h2>
            <p class="text-sm text-slate-600 mt-1">Update the content displayed in the call-to-action section of your landing page</p>
        </div>

        <form action="{{ route('admin.cta.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title"
                    value="{{ old('title', $cta->title ?? '') }}"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g., Join the Movement Toward a Future-Ready Bangladesh." required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="3"
                    class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter the CTA description..." required>{{ old('description', $cta->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Primary Button -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="primary_button_text" class="block text-sm font-medium text-slate-700 mb-2">Primary Button Text <span class="text-red-500">*</span></label>
                    <input type="text" name="primary_button_text" id="primary_button_text"
                        value="{{ old('primary_button_text', $cta->primary_button_text ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Become a Member" required>
                    @error('primary_button_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="primary_button_url" class="block text-sm font-medium text-slate-700 mb-2">Primary Button URL <span class="text-red-500">*</span></label>
                    <input type="text" name="primary_button_url" id="primary_button_url"
                        value="{{ old('primary_button_url', $cta->primary_button_url ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., # or https://example.com" required>
                    @error('primary_button_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Secondary Button -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="secondary_button_text" class="block text-sm font-medium text-slate-700 mb-2">Secondary Button Text <span class="text-red-500">*</span></label>
                    <input type="text" name="secondary_button_text" id="secondary_button_text"
                        value="{{ old('secondary_button_text', $cta->secondary_button_text ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., Contact CEPIRD" required>
                    @error('secondary_button_text')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="secondary_button_url" class="block text-sm font-medium text-slate-700 mb-2">Secondary Button URL <span class="text-red-500">*</span></label>
                    <input type="text" name="secondary_button_url" id="secondary_button_url"
                        value="{{ old('secondary_button_url', $cta->secondary_button_url ?? '') }}"
                        class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="e.g., # or https://example.com" required>
                    @error('secondary_button_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $cta->is_active ?? true) ? 'checked' : '' }} class="rounded">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active (Show on landing page)</label>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end pt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-sm hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Update CTA Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
