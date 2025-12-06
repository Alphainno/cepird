<!-- Core Focus Areas -->
@if(isset($focusAreaSection) && $focusAreaSection)
<section id="focus-areas" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 border-b border-slate-100 pb-4">
            <div>
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Focus</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">{{ $focusAreaSection->main_title }}</h2>
                @if($focusAreaSection->subtitle)
                    <p class="text-slate-600 mt-2">{{ $focusAreaSection->subtitle }}</p>
                @endif
            </div>
            <a href="#" class="hidden md:flex items-center text-blue-900 font-semibold hover:text-teal-600 transition-colors mt-4 md:mt-0">
                View All Research
                <!-- ArrowRight Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($focusAreaSection->focusAreas as $focusArea)
            <div class="p-6 bg-slate-50 rounded-sm border border-slate-100 hover:border-teal-200 transition-colors">
                <div class="bg-{{ $focusArea->icon_color }}-100 w-12 h-12 flex items-center justify-center rounded-sm mb-4 text-{{ $focusArea->icon_color }}-800">
                    @php
                        $iconName = $focusArea->icon ?: 'file-text';
                        $iconSvg = match($iconName) {
                            'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
                            'cpu' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-cpu"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9z"/><path d="M9 1v3"/><path d="M15 1v3"/><path d="M9 20v3"/><path d="M15 20v3"/><path d="M20 9h3"/><path d="M20 15h3"/><path d="M1 9h3"/><path d="M1 15h3"/></svg>',
                            'book-open' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
                            'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award"><path d="m15.4 11.5 2.13.787a2 2 0 0 0 1.25-3.418L17.7 7.3"/><path d="M11.3 14.7c.1-.1.2-.2.3-.3l3.6-3.6 2 2-3.6 3.6c-.1.1-.2.2-.3.3"/><path d="m8.5 13.7c.3-.3.6-.6 1-.9l1.8-1.8 2 2-1.8 1.8c-.3.3-.6.6-1 .9"/><path d="m12.7 17.5c-.3.3-.6.6-1 1l-1.8 1.8-2-2 1.8-1.8c.3-.3.6-.6 1-1"/></svg>',
                            default => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>'
                        };
                    @endphp
                    {!! $iconSvg !!}
                </div>
                <h4 class="font-bold text-lg text-slate-900 mb-2">{{ $focusArea->title }}</h4>
                <p class="text-sm text-slate-600">{{ $focusArea->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
