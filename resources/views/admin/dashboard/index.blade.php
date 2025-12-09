@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl p-8 text-white">
        <h1 class="text-3xl font-bold mb-2">Dashboard Overview</h1>
        <p class="text-indigo-100">Welcome to CEPIRD Admin Panel. Here's your site summary.</p>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Research Papers -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Total Research Papers</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['total_research_papers'] }}</h3>
                    <p class="text-green-600 text-xs mt-2">
                        <span class="font-semibold">{{ $stats['active_research_papers'] }}</span> active
                    </p>
                </div>
                <div class="bg-blue-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                        <polyline points="14 2 14 8 20 8"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Research Categories -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Research Categories</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['research_categories'] }}</h3>
                    <p class="text-gray-400 text-xs mt-2">Active categories</p>
                </div>
                <div class="bg-purple-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Program Categories -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Program Categories</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['program_categories'] }}</h3>
                    <p class="text-gray-400 text-xs mt-2">Total programs</p>
                </div>
                <div class="bg-green-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Contact Messages -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-orange-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Contact Messages</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['contact_messages'] }}</h3>
                    <p class="text-orange-600 text-xs mt-2">
                        <span class="font-semibold">{{ $stats['unread_messages'] }}</span> unread
                    </p>
                </div>
                <div class="bg-orange-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Focus Areas -->
        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-indigo-500 hover:shadow-xl transition-shadow duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-medium mb-1">Focus Areas</p>
                    <h3 class="text-3xl font-bold text-gray-800">{{ $stats['focus_areas'] }}</h3>
                    <p class="text-gray-400 text-xs mt-2">Active focus areas</p>
                </div>
                <div class="bg-indigo-100 rounded-full p-4">
                    <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Research Papers -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                    </svg>
                    Recent Research Papers
                </h2>
            </div>
            <div class="p-6">
                @if($recentPapers->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentPapers as $paper)
                        <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 rounded-lg flex items-center justify-center text-white font-bold" style="background-color: {{ $paper->icon_color ?? '#4F46E5' }}">
                                    {{ strtoupper(substr($paper->title, 0, 1)) }}
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-gray-900 truncate">{{ $paper->title }}</h4>
                                <p class="text-xs text-gray-500 mt-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $paper->category->name ?? 'Uncategorized' }}
                                    </span>
                                </p>
                                <p class="text-xs text-gray-400 mt-1">{{ $paper->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex-shrink-0">
                                @if($paper->is_featured)
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    Featured
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.research-papers.index') }}" class="mt-4 block text-center text-blue-600 hover:text-blue-800 font-medium text-sm">
                        View All Research Papers →
                    </a>
                @else
                    <p class="text-gray-500 text-center py-8">No research papers yet.</p>
                @endif
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-orange-600 to-orange-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Recent Contact Messages
                </h2>
            </div>
            <div class="p-6">
                @if($recentMessages->count() > 0)
                    <div class="space-y-4">
                        @foreach($recentMessages as $message)
                        <div class="flex items-start space-x-4 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr($message->name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-sm font-semibold text-gray-900">{{ $message->name }}</h4>
                                    @if(!$message->is_read)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                        New
                                    </span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-600 mt-1">{{ $message->email }}</p>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ Str::limit($message->message, 80) }}</p>
                                <p class="text-xs text-gray-400 mt-2">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="{{ route('admin.contact.submissions.index') }}" class="mt-4 block text-center text-orange-600 hover:text-orange-800 font-medium text-sm">
                        View All Messages →
                    </a>
                @else
                    <p class="text-gray-500 text-center py-8">No contact messages yet.</p>
                @endif
            </div>
        </div>

        <!-- Research Papers by Category -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-purple-600 to-purple-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                    Papers by Category
                </h2>
            </div>
            <div class="p-6">
                @if($papersByCategory->count() > 0)
                    <div class="space-y-3">
                        @foreach($papersByCategory as $category)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-3 h-3 rounded-full" style="background-color: {{ $category->color ?? '#8B5CF6' }}"></div>
                                <span class="text-sm font-medium text-gray-900">{{ $category->name }}</span>
                            </div>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-purple-100 text-purple-800">
                                {{ $category->papers_count }} {{ Str::plural('paper', $category->papers_count) }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500 text-center py-8">No categories yet.</p>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-6 py-4">
                <h2 class="text-xl font-bold text-white flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    Quick Actions
                </h2>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('admin.research-papers.create') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl hover:from-blue-100 hover:to-blue-200 transition-all duration-200 group">
                        <svg class="w-10 h-10 text-blue-600 mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="text-sm font-semibold text-blue-900">Add Research Paper</span>
                    </a>

                    <a href="{{ route('admin.research-categories.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl hover:from-purple-100 hover:to-purple-200 transition-all duration-200 group">
                        <svg class="w-10 h-10 text-purple-600 mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        <span class="text-sm font-semibold text-purple-900">Categories</span>
                    </a>

                    <a href="{{ route('admin.program-categories.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl hover:from-green-100 hover:to-green-200 transition-all duration-200 group">
                        <svg class="w-10 h-10 text-green-600 mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <span class="text-sm font-semibold text-green-900">Programs</span>
                    </a>

                    <a href="{{ route('admin.contact.submissions.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl hover:from-orange-100 hover:to-orange-200 transition-all duration-200 group">
                        <svg class="w-10 h-10 text-orange-600 mb-3 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-sm font-semibold text-orange-900">View Messages</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
