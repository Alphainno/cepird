<!-- Core Focus Areas -->
@if(isset($focusAreaSection) && $focusAreaSection)
<section id="focus-areas" class="py-20 bg-slate-50">
    <div class="container mx-auto px-6">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-teal-100 text-teal-900 font-semibold rounded-full text-sm mb-4">Our Focus Areas</span>
            <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                {{ $focusAreaSection->main_title }}
            </h2>
            @if($focusAreaSection->subtitle)
            <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                {{ $focusAreaSection->subtitle }}
            </p>
            @endif
        </div>

        <!-- Focus Areas Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($focusAreaSection->focusAreas as $focusArea)
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 hover:shadow-lg transition-all duration-300 overflow-hidden group">
                <div class="p-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-{{ $focusArea->icon_color }}-900 to-{{ $focusArea->icon_color }}-700 rounded-lg flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        @php
                            $iconName = $focusArea->icon ?: 'file-text';
                            $iconSvg = match($iconName) {
                                'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
                                'cpu' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9z"/><path d="M9 1v3"/><path d="M15 1v3"/><path d="M9 20v3"/><path d="M15 20v3"/><path d="M20 9h3"/><path d="M20 15h3"/><path d="M1 9h3"/><path d="M1 15h3"/></svg>',
                                'book-open' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
                                'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
                                default => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>'
                            };
                        @endphp
                        {!! $iconSvg !!}
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-blue-900 transition-colors">
                        {{ $focusArea->title }}
                    </h3>
                    <p class="text-slate-600 leading-relaxed mb-4">
                        {{ $focusArea->description }}
                    </p>
                    <div class="flex items-center text-blue-900 font-medium text-sm group-hover:gap-3 transition-all">
                        <span>Learn More</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="ml-2 group-hover:translate-x-1 transition-transform">
                            <polyline points="9 18 15 12 9 6"/>
                        </svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
