@extends('admin.layouts.app')

@section('title', 'Add Research Category')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Add Research Category</h1>
            <p class="text-slate-600 mt-1">Create a new research category</p>
        </div>
        <a href="{{ route('admin.research-categories.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-medium rounded-sm transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Categories
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <form action="{{ route('admin.research-categories.store') }}" method="POST" class="p-6 space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter category name" required>
                <p class="mt-1 text-xs text-slate-500">The slug will be generated automatically from the name</p>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Color -->
            <div>
                <label for="color" class="block text-sm font-medium text-slate-700 mb-2">Color <span class="text-red-500">*</span></label>
                <select name="color" id="color" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="blue" {{ old('color') == 'blue' ? 'selected' : '' }}>Blue</option>
                    <option value="purple" {{ old('color') == 'purple' ? 'selected' : '' }}>Purple</option>
                    <option value="teal" {{ old('color') == 'teal' ? 'selected' : '' }}>Teal</option>
                    <option value="red" {{ old('color') == 'red' ? 'selected' : '' }}>Red</option>
                    <option value="green" {{ old('color') == 'green' ? 'selected' : '' }}>Green</option>
                    <option value="yellow" {{ old('color') == 'yellow' ? 'selected' : '' }}>Yellow</option>
                    <option value="pink" {{ old('color') == 'pink' ? 'selected' : '' }}>Pink</option>
                    <option value="indigo" {{ old('color') == 'indigo' ? 'selected' : '' }}>Indigo</option>
                </select>
                @error('color')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div>
                <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0" min="0">
                <p class="mt-1 text-xs text-slate-500">Lower numbers appear first</p>
                @error('order')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Active Status -->
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Active</label>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3 pt-4 border-t border-slate-200">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-sm transition-colors">
                    Create Category
                </button>
                <a href="{{ route('admin.research-categories.index') }}" class="px-6 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-sm transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
