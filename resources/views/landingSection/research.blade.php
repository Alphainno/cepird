<!-- Research Section -->
@if($researchCategories && $researchCategories->count() > 0)
<section id="research" class="py-20 bg-slate-50">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-blue-100 text-blue-900 font-semibold rounded-full text-sm mb-4">Our Research</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                Research & Publications
            </h2>
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                Explore our evidence-based research that informs policy and drives social change
            </p>
        </div>

        <!-- Research Categories and Papers Section -->
        <div class="grid md:grid-cols-3 gap-6 mb-12" style="max-height: 80vh;">
            <!-- Left Side - Research Papers List (2 columns) -->
            <div class="md:col-span-2 bg-white rounded-xl shadow-sm border border-slate-200 p-6 overflow-y-auto" style="max-height: 80vh;">
                <h3 class="text-2xl font-bold text-slate-900 mb-6 sticky top-0 bg-white pb-4 border-b border-slate-200">Research Papers</h3>
                <div id="research-papers-list" class="space-y-3">
                    @php
                        $allPapers = $researchCategories->flatMap->papers->where('is_active', true)->sortByDesc('citations')->take(8);
                    @endphp
                    @foreach($allPapers as $paper)
                    <div class="flex items-center justify-between p-4 border border-slate-200 rounded-lg hover:border-blue-300 hover:bg-blue-50 transition-all group" data-category="{{ $paper->category_id }}">
                        <div class="flex-1 min-w-0 pr-4">
                            <h4 class="font-semibold text-slate-900 group-hover:text-blue-900 mb-1 truncate">
                                {{ $paper->title }}
                            </h4>
                            <div class="flex items-center gap-3 text-xs text-slate-500">
                                <span class="px-2 py-1 bg-{{ $paper->category->color }}-100 text-{{ $paper->category->color }}-900 rounded font-medium">
                                    {{ $paper->category->name }}
                                </span>
                                <span>{{ $paper->formatted_date }}</span>
                                <span>{{ $paper->citations }} citations</span>
                            </div>
                        </div>
                        @if($paper->pdf_file)
                        <a href="{{ asset('storage/' . $paper->pdf_file) }}" target="_blank" class="flex-shrink-0 inline-flex items-center gap-2 px-4 py-2 bg-blue-900 hover:bg-blue-800 text-white font-medium text-sm rounded-lg transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" x2="12" y1="15" y2="3"/>
                            </svg>
                            <span>PDF</span>
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Side - Categories Filter (1 column) -->
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 overflow-y-auto" style="max-height: 80vh;">
                <h3 class="text-xl font-bold text-slate-900 mb-6 sticky top-0 bg-white pb-4 border-b border-slate-200">Categories</h3>
                <div class="space-y-3">
                    <!-- All Categories Option -->
                    <button onclick="filterByCategory('all')" class="category-filter w-full text-left p-4 rounded-lg border-2 border-blue-900 bg-blue-50 transition-all hover:bg-blue-100 active" data-category="all">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-blue-900 mb-1">All Categories</h4>
                                <p class="text-sm text-blue-700">
                                    {{ $researchCategories->sum(function($cat) { return $cat->papers->where('is_active', true)->count(); }) }} papers
                                </p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-900">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </div>
                    </button>

                    @foreach($researchCategories->take(4) as $category)
                    <button onclick="filterByCategory({{ $category->id }})" class="category-filter w-full text-left p-4 rounded-lg border-2 border-slate-200 hover:border-{{ $category->color }}-300 hover:bg-{{ $category->color }}-50 transition-all" data-category="{{ $category->id }}">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="font-bold text-slate-900 mb-1">{{ $category->name }}</h4>
                                <p class="text-sm text-slate-600">
                                    {{ $category->papers->where('is_active', true)->count() }} {{ Str::plural('paper', $category->papers->where('is_active', true)->count()) }}
                                </p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-slate-400">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </div>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        <script>
        function filterByCategory(categoryId) {
            const papers = document.querySelectorAll('#research-papers-list > div');
            const categoryButtons = document.querySelectorAll('.category-filter');

            // Update active state on buttons
            categoryButtons.forEach(btn => {
                if (btn.dataset.category == categoryId) {
                    btn.classList.add('active', 'border-blue-900', 'bg-blue-50');
                    btn.classList.remove('border-slate-200');
                } else {
                    btn.classList.remove('active', 'border-blue-900', 'bg-blue-50');
                    btn.classList.add('border-slate-200');
                }
            });

            // Filter papers
            papers.forEach(paper => {
                if (categoryId === 'all') {
                    paper.style.display = 'flex';
                } else {
                    if (paper.dataset.category == categoryId) {
                        paper.style.display = 'flex';
                    } else {
                        paper.style.display = 'none';
                    }
                }
            });
        }
        </script>

        <!-- Featured Research Papers -->
        {{-- @if($featuredPapers && $featuredPapers->count() > 0)
        <div class="mb-12">
            <h3 class="text-2xl font-bold text-slate-900 mb-6">Featured Research</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredPapers->take(3) as $paper)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                    <div class="p-6">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-{{ $paper->icon_color }} to-{{ str_replace('-900', '-700', $paper->icon_color) }} rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                        <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                        <line x1="16" x2="8" y1="13" y2="13"/>
                                        <line x1="16" x2="8" y1="17" y2="17"/>
                                        <line x1="10" x2="8" y1="9" y2="9"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <span class="inline-block px-2 py-1 bg-{{ $paper->category->color }}-50 text-{{ $paper->category->color }}-900 text-xs font-semibold rounded-full mb-2">
                                    {{ $paper->category->name }}
                                </span>
                            </div>
                        </div>
                        <h4 class="text-lg font-bold text-slate-900 group-hover:text-blue-900 transition-colors mb-2 line-clamp-2">
                            {{ $paper->title }}
                        </h4>
                        <p class="text-sm text-slate-600 mb-3 font-medium">
                            {{ $paper->authors }}
                        </p>
                        <p class="text-slate-600 text-sm mb-4 line-clamp-3">
                            {{ $paper->description }}
                        </p>
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-4">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                    <line x1="16" x2="16" y1="2" y2="6"/>
                                    <line x1="8" x2="8" y1="2" y2="6"/>
                                    <line x1="3" x2="21" y1="10" y2="10"/>
                                </svg>
                                <span>{{ $paper->formatted_date }}</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <polyline points="9 22 9 12 15 12 15 22"/>
                                </svg>
                                <span>{{ $paper->citations }} Citations</span>
                            </div>
                        </div>
                        @if($paper->pdf_file)
                        <a href="{{ asset('storage/' . $paper->pdf_file) }}" target="_blank" class="inline-flex items-center gap-2 text-blue-900 font-medium text-sm hover:gap-3 transition-all">
                            <span>Read Paper</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"/>
                            </svg>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif --}}

        <!-- View All CTA -->
        <div class="text-center">
            <a href="{{ route('research') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded-lg transition-all duration-300 shadow-lg hover:shadow-xl hover:gap-3">
                <span>View All Research</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endif
