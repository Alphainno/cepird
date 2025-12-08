@extends('admin.layouts.app')

@section('title', 'Research Categories')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Research Categories</h1>
            <p class="text-slate-600 mt-1">Manage research paper categories</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.research-categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-sm shadow-sm transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Category
            </a>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-sm">
            {{ session('error') }}
        </div>
    @endif

    <!-- Categories Table -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Slug</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Color</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Papers</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($categories as $category)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-slate-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600 font-mono">{{ $category->slug }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 rounded text-xs font-medium bg-{{ $category->color }}-100 text-{{ $category->color }}-800">
                                    {{ ucfirst($category->color) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $category->papers_count }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $category->order }}</td>
                            <td class="px-6 py-4">
                                @if($category->is_active)
                                    <span class="inline-flex items-center px-2 py-1 rounded-sm text-xs font-medium bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-sm text-xs font-medium bg-slate-100 text-slate-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium space-x-2">
                                <a href="{{ route('admin.research-categories.edit', $category) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.research-categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this category? This will fail if there are papers associated with it.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-8 text-center text-slate-500">
                                No categories found. <a href="{{ route('admin.research-categories.create') }}" class="text-blue-600 hover:text-blue-800">Add your first category</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
