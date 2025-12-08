@extends('layouts.app')

@section('title', 'Research Library - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-teal-700 pt-32 pb-20 overflow-hidden mt-16">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-block mb-6 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                <span class="text-white text-sm font-medium">Research Library</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight text-white">
                Explore Our <span class="text-amber-400">Research</span>
            </h1>
            <p class="text-xl text-blue-100 leading-relaxed">
                Evidence-based insights shaping policy, innovation, and sustainable development
            </p>
        </div>
    </div>
</section>

<!-- Main Research Content -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-12 gap-8">

            <!-- Left Sidebar - Filters & Search -->
            <aside class="lg:col-span-3">
                <div class="sticky top-24 space-y-6">

                    <!-- Search Box -->
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-5">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-900"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                            Search Research
                        </h3>
                        <div class="relative">
                            <input
                                type="text"
                                id="research-search"
                                placeholder="Search papers, topics..."
                                class="w-full pl-10 pr-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-slate-900 placeholder-slate-400"
                            >
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="absolute left-3 top-3.5 text-slate-400"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        </div>
                    </div>

                    <!-- Categories Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-5">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-900"><path d="M3 3h7v7H3z"/><path d="M14 3h7v7h-7z"/><path d="M14 14h7v7h-7z"/><path d="M3 14h7v7H3z"/></svg>
                            Categories
                        </h3>
                        <div class="space-y-2">
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500" checked>
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">All Research</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">24</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Policy & Governance</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">8</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Entrepreneurship</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">12</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Innovation & Tech</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">6</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Education</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">5</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Sustainability</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">4</span>
                            </label>
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group">
                                <input type="checkbox" class="w-4 h-4 text-blue-900 border-slate-300 rounded focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">Economic Development</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">7</span>
                            </label>
                        </div>
                    </div>

                    <!-- Year Filter -->
                    <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-5">
                        <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-900"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                            Publication Year
                        </h3>
                        <select class="w-full px-4 py-2.5 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900">
                            <option>All Years</option>
                            <option>2025</option>
                            <option>2024</option>
                            <option>2023</option>
                            <option>2022</option>
                            <option>2021</option>
                        </select>
                    </div>

                    <!-- Clear Filters -->
                    <button class="w-full px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">
                        Clear All Filters
                    </button>
                </div>
            </aside>

            <!-- Right Content - Research Papers Grid -->
            <main class="lg:col-span-9">

                <!-- Results Header -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-900">Research Papers</h2>
                        <p class="text-slate-600 mt-1">Showing <span class="font-semibold text-slate-900">24</span> results</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-slate-600">Sort by:</span>
                        <select class="px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-slate-900 text-sm">
                            <option>Most Recent</option>
                            <option>Most Cited</option>
                            <option>Alphabetical</option>
                        </select>
                    </div>
                </div>

                <!-- Research Papers Grid -->
                <div id="research-grid" class="grid gap-6">

                    <!-- Research Paper Card 1 -->
                    <div class="research-card bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-900 to-blue-700 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between gap-4 mb-3">
                                        <div class="flex-1">
                                            <span class="inline-block px-3 py-1 bg-blue-50 text-blue-900 text-xs font-semibold rounded-full mb-2">Policy & Governance</span>
                                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-900 transition-colors leading-tight">
                                                Digital Transformation Strategies for Entrepreneurial Ecosystems in Bangladesh
                                            </h3>
                                        </div>
                                    </div>

                                    <p class="text-slate-600 text-sm mb-2 font-medium">
                                        Mohammad Shahriar Khan, Dr. Ahmed Rahman, Prof. Sarah Ahmed
                                    </p>

                                    <p class="text-slate-600 leading-relaxed mb-4">
                                        This research explores comprehensive digital transformation frameworks specifically designed for emerging entrepreneurial ecosystems. Through extensive case studies and empirical data from Bangladesh's startup landscape...
                                    </p>

                                    <!-- Meta Information -->
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-4">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <span>December 2024</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                            <span>35 Pages</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            <span>128 Citations</span>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Digital Economy</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Startup Ecosystem</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Policy Framework</span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-100">
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                            Download PDF
                                        </a>
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                            View Details
                                        </a>
                                        <button class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
                                            Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Research Paper Card 2 -->
                    <div class="research-card bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gradient-to-br from-teal-600 to-teal-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between gap-4 mb-3">
                                        <div class="flex-1">
                                            <span class="inline-block px-3 py-1 bg-teal-50 text-teal-900 text-xs font-semibold rounded-full mb-2">Entrepreneurship</span>
                                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-900 transition-colors leading-tight">
                                                Impact of Youth Entrepreneurship Programs on Economic Growth
                                            </h3>
                                        </div>
                                    </div>

                                    <p class="text-slate-600 text-sm mb-2 font-medium">
                                        Dr. Fatima Hassan, Mohammad Rahman
                                    </p>

                                    <p class="text-slate-600 leading-relaxed mb-4">
                                        A comprehensive analysis of youth-focused entrepreneurship initiatives and their measurable impact on regional economic development. This study examines program outcomes across multiple districts...
                                    </p>

                                    <!-- Meta Information -->
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-4">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <span>November 2024</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                            <span>42 Pages</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            <span>95 Citations</span>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Youth Development</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Economic Impact</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Skills Training</span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-100">
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                            Download PDF
                                        </a>
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                            View Details
                                        </a>
                                        <button class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
                                            Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Research Paper Card 3 -->
                    <div class="research-card bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M12 2v20M2 12h20"/><circle cx="12" cy="12" r="10"/></svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between gap-4 mb-3">
                                        <div class="flex-1">
                                            <span class="inline-block px-3 py-1 bg-amber-50 text-amber-900 text-xs font-semibold rounded-full mb-2">Innovation & Tech</span>
                                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-900 transition-colors leading-tight">
                                                Sustainable Innovation Models for SME Development
                                            </h3>
                                        </div>
                                    </div>

                                    <p class="text-slate-600 text-sm mb-2 font-medium">
                                        Prof. Kamal Ahmed, Dr. Nusrat Jahan
                                    </p>

                                    <p class="text-slate-600 leading-relaxed mb-4">
                                        This research presents innovative frameworks for sustainable growth in small and medium enterprises, emphasizing technological adoption and environmental responsibility in business operations...
                                    </p>

                                    <!-- Meta Information -->
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-4">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <span>October 2024</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                            <span>28 Pages</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            <span>67 Citations</span>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">SME Growth</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Sustainability</span>
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">Technology Adoption</span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-100">
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                            Download PDF
                                        </a>
                                        <a href="#" class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                            View Details
                                        </a>
                                        <button class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>
                                            Share
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-2">
                        <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed" disabled>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                        </button>
                        <button class="px-4 py-2 bg-blue-900 text-white rounded-lg font-medium">1</button>
                        <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors">2</button>
                        <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors">3</button>
                        <span class="px-2 text-slate-400">...</span>
                        <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors">8</button>
                        <button class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 hover:bg-slate-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                        </button>
                    </nav>
                </div>

            </main>
        </div>
    </div>
</section>

<!-- JavaScript for Search and Filter -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('research-search');
    const researchCards = document.querySelectorAll('.research-card');

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();

            researchCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const tags = Array.from(card.querySelectorAll('.px-3.py-1.bg-slate-100'))
                    .map(tag => tag.textContent.toLowerCase())
                    .join(' ');

                if (title.includes(searchTerm) || description.includes(searchTerm) || tags.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
</script>

@endsection
