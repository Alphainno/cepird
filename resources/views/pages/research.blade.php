@extends('layouts.app')

@section('title', 'Research Library - CEPIRD')

@section('content')

@php
    $heroSection = App\Models\ResearchHeroSection::getActive();
@endphp

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-900 via-blue-800 to-teal-700 pt-32 pb-20 overflow-hidden mt-16 {{ $heroSection && $heroSection->background_image ? 'bg-cover bg-center bg-no-repeat' : '' }}"
         @if($heroSection && $heroSection->background_image)
         style="background-image: linear-gradient(to bottom right, rgba(30, 58, 138, 0.9), rgba(30, 58, 138, 0.8), rgba(20, 184, 166, 0.7)), url('{{ asset('storage/' . $heroSection->background_image) }}');"
         @endif>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <div class="inline-block mb-6 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                <span class="text-white text-sm font-medium">{{ $heroSection ? $heroSection->badge_text : 'Research Library' }}</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight text-white">
                {{ $heroSection ? $heroSection->title_line1 : 'Explore Our' }} <span class="text-amber-400">{{ $heroSection ? $heroSection->title_line2 : 'Research' }}</span>
            </h1>
            <p class="text-xl text-blue-100 leading-relaxed">
                {{ $heroSection ? $heroSection->subtitle : 'Evidence-based insights shaping policy, innovation, and sustainable development' }}
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
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group category-filter" data-category="all">
                                <input type="radio" name="category-filter" class="w-4 h-4 text-blue-900 border-slate-300 focus:ring-blue-500" checked>
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">All Research</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">{{ $papers->count() }}</span>
                            </label>
                            @foreach($categories as $category)
                            <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-slate-50 cursor-pointer transition-colors group category-filter" data-category="{{ $category->id }}">
                                <input type="radio" name="category-filter" class="w-4 h-4 text-blue-900 border-slate-300 focus:ring-blue-500">
                                <span class="text-slate-700 group-hover:text-slate-900 font-medium">{{ $category->name }}</span>
                                <span class="ml-auto text-xs bg-slate-100 px-2 py-1 rounded-full text-slate-600">{{ $category->paper_count }}</span>
                            </label>
                            @endforeach
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
                        <p class="text-slate-600 mt-1">Showing <span class="font-semibold text-slate-900">{{ $papers->count() }}</span> results</p>
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

                    @forelse($papers as $paper)
                    <!-- Research Paper Card -->
                    <div class="research-card bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group" data-category-id="{{ $paper->category_id }}">
                        <div class="p-6">
                            <div class="flex items-start gap-4">
                                <!-- Icon -->
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gradient-to-br from-{{ $paper->icon_color }} to-{{ str_replace('-900', '-700', $paper->icon_color) }} rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between gap-4 mb-3">
                                        <div class="flex-1">
                                            <span class="inline-block px-3 py-1 bg-{{ $paper->category->color }}-50 text-{{ $paper->category->color }}-900 text-xs font-semibold rounded-full mb-2">{{ $paper->category->name }}</span>
                                            <h3 class="text-xl font-bold text-slate-900 group-hover:text-blue-900 transition-colors leading-tight">
                                                {{ $paper->title }}
                                            </h3>
                                        </div>
                                    </div>

                                    <p class="text-slate-600 text-sm mb-2 font-medium">
                                        {{ $paper->authors }}
                                    </p>

                                    <p class="text-slate-600 leading-relaxed mb-4">
                                        {{ Str::limit($paper->description, 200) }}
                                    </p>

                                    <!-- Meta Information -->
                                    <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500 mb-4">
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                            <span>{{ $paper->formatted_date }}</span>
                                        </div>
                                        @if($paper->pages)
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                            <span>{{ $paper->pages }} Pages</span>
                                        </div>
                                        @endif
                                        <div class="flex items-center gap-1.5">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                            <span>{{ $paper->citations }} Citations</span>
                                        </div>
                                    </div>

                                    <!-- Tags -->
                                    @if($paper->tags && count($paper->tags) > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach($paper->tags as $tag)
                                        <span class="px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded-full">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="flex flex-wrap gap-3 pt-4 border-t border-slate-100">
                                        @if($paper->pdf_file)
                                        <a href="{{ asset('storage/' . $paper->pdf_file) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                            Download PDF
                                        </a>
                                        @endif
                                        <button onclick="showPaperDetails({{ $paper->id }})" class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 font-medium rounded-lg border border-slate-300 transition-colors text-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                            View Details
                                        </button>
                                          <!-- Hidden data for modal -->
                                        <div class="hidden paper-data"
                                             data-id="{{ $paper->id }}"
                                             data-title="{{ $paper->title }}"
                                             data-authors="{{ $paper->authors }}"
                                             data-category="{{ $paper->category->name }}"
                                             data-category-color="{{ $paper->category->color }}"
                                             data-description="{{ $paper->description }}"
                                             data-date="{{ $paper->formatted_date }}"
                                             data-pages="{{ $paper->pages }}"
                                             data-citations="{{ $paper->citations }}"
                                             data-tags="{{ $paper->tags ? json_encode($paper->tags) : '[]' }}"
                                             data-pdf="{{ $paper->pdf_file ? asset('storage/' . $paper->pdf_file) : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full text-center py-16">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-slate-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="text-lg font-semibold text-slate-900 mb-2">No Research Papers Found</h3>
                        <p class="text-slate-600">There are currently no research papers available.</p>
                    </div>
                    @endforelse

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

<!-- Paper Details Modal -->
<div id="paperModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
        <!-- Modal Header -->
        <div class="bg-gradient-to-r from-blue-900 to-blue-800 px-6 py-4 flex items-center justify-between">
            <h2 class="text-xl font-bold text-white">Research Paper Details</h2>
            <button onclick="closePaperModal()" class="text-white hover:text-gray-200 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>

        <!-- Modal Body -->
        <div class="overflow-y-auto max-h-[calc(90vh-80px)] p-6">
            <!-- Category Badge -->
            <div class="mb-4">
                <span id="modalCategory" class="inline-block px-3 py-1 text-xs font-semibold rounded-full"></span>
            </div>

            <!-- Title -->
            <h3 id="modalTitle" class="text-3xl font-bold text-slate-900 mb-4"></h3>

            <!-- Authors -->
            <p id="modalAuthors" class="text-lg text-slate-600 font-medium mb-6"></p>

            <!-- Meta Information -->
            <div class="flex flex-wrap items-center gap-6 mb-6 pb-6 border-b border-slate-200">
                <div class="flex items-center gap-2 text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                    <span id="modalDate" class="font-medium"></span>
                </div>
                <div id="modalPagesWrapper" class="flex items-center gap-2 text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span id="modalPages" class="font-medium"></span>
                </div>
                <div class="flex items-center gap-2 text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span id="modalCitations" class="font-medium"></span>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h4 class="text-lg font-bold text-slate-900 mb-3">Abstract</h4>
                <p id="modalDescription" class="text-slate-700 leading-relaxed text-justify"></p>
            </div>

            <!-- Tags -->
            <div id="modalTagsWrapper" class="mb-6">
                <h4 class="text-lg font-bold text-slate-900 mb-3">Keywords</h4>
                <div id="modalTags" class="flex flex-wrap gap-2"></div>
            </div>

            <!-- Actions -->
            <div class="flex gap-3 pt-6 border-t border-slate-200">
                <a id="modalDownload" href="#" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Download PDF
                </a>
                <button onclick="closePaperModal()" class="inline-flex items-center gap-2 px-6 py-3 bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium rounded-lg transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Search and Filter -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('research-search');
    const researchCards = document.querySelectorAll('.research-card');
    const categoryFilters = document.querySelectorAll('.category-filter');

    // Category filter functionality
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const selectedCategory = this.dataset.category;
            filterPapers(selectedCategory);
        });
    });

    function filterPapers(categoryId) {
        let visibleCount = 0;

        researchCards.forEach(card => {
            if (categoryId === 'all') {
                card.style.display = 'block';
                visibleCount++;
            } else {
                if (card.dataset.categoryId === categoryId) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            }
        });

        // Update results count
        updateResultsCount(visibleCount);
    }

    function updateResultsCount(count) {
        const resultsText = document.querySelector('.text-slate-600.mt-1');
        if (resultsText) {
            resultsText.innerHTML = `Showing <span class="font-semibold text-slate-900">${count}</span> results`;
        }
    }

    // Search functionality
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            let visibleCount = 0;

            researchCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                const tags = Array.from(card.querySelectorAll('.px-3.py-1.bg-slate-100'))
                    .map(tag => tag.textContent.toLowerCase())
                    .join(' ');

                // Check if card matches search and is visible due to category filter
                const matchesSearch = title.includes(searchTerm) || description.includes(searchTerm) || tags.includes(searchTerm);

                if (matchesSearch && card.style.display !== 'none') {
                    card.style.display = 'block';
                    visibleCount++;
                } else if (!matchesSearch) {
                    card.style.display = 'none';
                } else if (card.style.display === 'none') {
                    // Hidden by category filter
                    visibleCount++;
                }
            });

            if (searchTerm) {
                updateResultsCount(visibleCount);
            }
        });
    }
});

// Modal functions
function showPaperDetails(paperId) {
    const paperData = document.querySelector(`.paper-data[data-id="${paperId}"]`);
    if (!paperData) return;

    // Get data attributes
    const title = paperData.dataset.title;
    const authors = paperData.dataset.authors;
    const category = paperData.dataset.category;
    const categoryColor = paperData.dataset.categoryColor;
    const description = paperData.dataset.description;
    const date = paperData.dataset.date;
    const pages = paperData.dataset.pages;
    const citations = paperData.dataset.citations;
    const tags = JSON.parse(paperData.dataset.tags || '[]');
    const pdfUrl = paperData.dataset.pdf;

    // Populate modal
    document.getElementById('modalTitle').textContent = title;
    document.getElementById('modalAuthors').textContent = authors;
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('modalDate').textContent = date;
    document.getElementById('modalCitations').textContent = `${citations} Citations`;

    // Category badge
    const categoryBadge = document.getElementById('modalCategory');
    categoryBadge.textContent = category;
    categoryBadge.className = `inline-block px-3 py-1 text-xs font-semibold rounded-full bg-${categoryColor}-50 text-${categoryColor}-900`;

    // Pages (hide if null)
    const pagesWrapper = document.getElementById('modalPagesWrapper');
    if (pages && pages !== 'null') {
        pagesWrapper.style.display = 'flex';
        document.getElementById('modalPages').textContent = `${pages} Pages`;
    } else {
        pagesWrapper.style.display = 'none';
    }

    // Tags
    const tagsContainer = document.getElementById('modalTags');
    const tagsWrapper = document.getElementById('modalTagsWrapper');
    if (tags && tags.length > 0) {
        tagsWrapper.style.display = 'block';
        tagsContainer.innerHTML = tags.map(tag =>
            `<span class="px-3 py-1 bg-slate-100 text-slate-700 text-sm font-medium rounded-full">${tag}</span>`
        ).join('');
    } else {
        tagsWrapper.style.display = 'none';
    }

    // Download button
    const downloadBtn = document.getElementById('modalDownload');
    if (pdfUrl) {
        downloadBtn.href = pdfUrl;
        downloadBtn.style.display = 'inline-flex';
    } else {
        downloadBtn.style.display = 'none';
    }

    // Show modal
    document.getElementById('paperModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePaperModal() {
    document.getElementById('paperModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
document.getElementById('paperModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closePaperModal();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePaperModal();
    }
});
</script>

@endsection
