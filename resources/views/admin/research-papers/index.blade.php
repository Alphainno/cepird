@extends('admin.layouts.app')

@section('title', 'Research Papers Management')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Research Papers Management</h1>
            <p class="text-slate-600 mt-1">Manage all research papers and publications</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.research-papers.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-sm shadow-sm transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New Paper
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

    <!-- Research Papers Table -->
    <div class="bg-white rounded-sm shadow-sm border border-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Authors</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($papers as $paper)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-slate-900">{{ $paper->title }}</div>
                                @if($paper->is_featured)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">
                                        Featured
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-{{ $paper->category->color }}-100 text-{{ $paper->category->color }}-800">
                                    {{ $paper->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ Str::limit($paper->authors, 30) }}</td>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $paper->formatted_date }}</td>
                            <td class="px-6 py-4">
                                @if($paper->is_active)
                                    <span class="inline-flex items-center px-2 py-1 rounded-sm text-xs font-medium bg-green-100 text-green-800">Active</span>
                                @else
                                    <span class="inline-flex items-center px-2 py-1 rounded-sm text-xs font-medium bg-slate-100 text-slate-800">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm font-medium space-x-2">
                                <a href="{{ route('admin.research-papers.edit', $paper) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="{{ route('admin.research-papers.destroy', $paper) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this paper?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                                No research papers found. <a href="{{ route('admin.research-papers.create') }}" class="text-blue-600 hover:text-blue-800">Add your first paper</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($papers->hasPages())
            <div class="px-6 py-4 border-t border-slate-200">
                {{ $papers->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
