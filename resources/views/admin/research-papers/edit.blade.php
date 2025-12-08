@extends('admin.layouts.app')

@section('title', 'Edit Research Paper')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Research Paper</h1>
            <p class="text-slate-600 mt-1">Update research paper details</p>
        </div>
        <a href="{{ route('admin.research-papers.index') }}" class="inline-flex items-center px-4 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-medium rounded-sm transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Back to Papers
        </a>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <form action="{{ route('admin.research-papers.update', $paper) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-slate-700 mb-2">Category <span class="text-red-500">*</span></label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $paper->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Title <span class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $paper->title) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter paper title" required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Authors -->
            <div>
                <label for="authors" class="block text-sm font-medium text-slate-700 mb-2">Authors <span class="text-red-500">*</span></label>
                <input type="text" name="authors" id="authors" value="{{ old('authors', $paper->authors) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., John Doe, Jane Smith" required>
                @error('authors')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Description <span class="text-red-500">*</span></label>
                <textarea name="description" id="description" rows="4" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter paper description" required>{{ old('description', $paper->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Publication Date, Pages, Citations -->
            <div class="grid md:grid-cols-3 gap-4">
                <div>
                    <label for="publication_date" class="block text-sm font-medium text-slate-700 mb-2">Publication Date <span class="text-red-500">*</span></label>
                    <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', $paper->publication_date ? $paper->publication_date->format('Y-m-d') : '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    @error('publication_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="pages" class="block text-sm font-medium text-slate-700 mb-2">Pages</label>
                    <input type="number" name="pages" id="pages" value="{{ old('pages', $paper->pages) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="e.g., 12" min="1">
                    @error('pages')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="citations" class="block text-sm font-medium text-slate-700 mb-2">Citations</label>
                    <input type="number" name="citations" id="citations" value="{{ old('citations', $paper->citations) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0" min="0">
                    @error('citations')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Tags -->
            <div>
                <label for="tags" class="block text-sm font-medium text-slate-700 mb-2">Tags</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', is_array($paper->tags) ? implode(', ', $paper->tags) : '') }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter tags separated by commas (e.g., Climate Change, Policy, Research)">
                <p class="mt-1 text-xs text-slate-500">Separate multiple tags with commas</p>
                @error('tags')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Icon Color and Order -->
            <div class="grid md:grid-cols-2 gap-4">
                <div>
                    <label for="icon_color" class="block text-sm font-medium text-slate-700 mb-2">Icon Color <span class="text-red-500">*</span></label>
                    <select name="icon_color" id="icon_color" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="blue-900" {{ old('icon_color', $paper->icon_color) == 'blue-900' ? 'selected' : '' }}>Blue</option>
                        <option value="purple-900" {{ old('icon_color', $paper->icon_color) == 'purple-900' ? 'selected' : '' }}>Purple</option>
                        <option value="teal-900" {{ old('icon_color', $paper->icon_color) == 'teal-900' ? 'selected' : '' }}>Teal</option>
                        <option value="red-900" {{ old('icon_color', $paper->icon_color) == 'red-900' ? 'selected' : '' }}>Red</option>
                        <option value="green-900" {{ old('icon_color', $paper->icon_color) == 'green-900' ? 'selected' : '' }}>Green</option>
                        <option value="yellow-900" {{ old('icon_color', $paper->icon_color) == 'yellow-900' ? 'selected' : '' }}>Yellow</option>
                    </select>
                    @error('icon_color')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Display Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $paper->order) }}" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="0" min="0">
                    @error('order')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- PDF File -->
            <div>
                <label for="pdf_file" class="block text-sm font-medium text-slate-700 mb-2">PDF File</label>
                @if($paper->pdf_file)
                    <div class="mb-2 text-sm text-slate-600">
                        Current file: <a href="{{ asset('storage/' . $paper->pdf_file) }}" target="_blank" class="text-blue-600 hover:text-blue-800">View PDF</a>
                    </div>
                @endif
                <input type="file" name="pdf_file" id="pdf_file" accept=".pdf" class="w-full px-4 py-2 border border-slate-300 rounded-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <p class="mt-1 text-xs text-slate-500">Upload new PDF to replace existing file (max 10MB)</p>
                @error('pdf_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Checkboxes -->
            <div class="space-y-3">
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured', $paper->is_featured) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="is_featured" class="ml-2 text-sm text-slate-700">Featured Paper</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $paper->is_active) ? 'checked' : '' }} class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                    <label for="is_active" class="ml-2 text-sm text-slate-700">Active</label>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex gap-3 pt-4 border-t border-slate-200">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-sm transition-colors">
                    Update Paper
                </button>
                <a href="{{ route('admin.research-papers.index') }}" class="px-6 py-2 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-sm transition-colors">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
