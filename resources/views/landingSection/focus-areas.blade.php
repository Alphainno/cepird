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
            @foreach($focusAreaSection->focusAreas->unique('id') as $focusArea)
            <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-4 border-transparent hover:border-blue-900 group">
                @php
                    $iconName = $focusArea->icon ?: 'file-text';
                    $iconSvg = match($iconName) {
                        'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 mb-6 group-hover:scale-110 transition-transform"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
                        'cpu' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 mb-6 group-hover:scale-110 transition-transform"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M9 9h6v6H9z"/><path d="M9 1v3"/><path d="M15 1v3"/><path d="M9 20v3"/><path d="M15 20v3"/><path d="M20 9h3"/><path d="M20 15h3"/><path d="M1 9h3"/><path d="M1 15h3"/></svg>',
                        'lightbulb' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-amber-500 mb-6 group-hover:scale-110 transition-transform"><path d="M15 14c.2-1 .6-3 2-3a5 5 0 0 1 0 10"/><path d="M7 14c-.2-1-.6-3-2-3a5 5 0 0 0 0 10"/><path d="M9 18a5 5 0 0 0 6 0"/><path d="M12 2a4 4 0 0 0-4 4c0 3 4 5 4 5s4-2 4-5a4 4 0 0 0-4-4"/></svg>',
                        'book-open' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-teal-600 mb-6 group-hover:scale-110 transition-transform"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>',
                        'award' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600 mb-6 group-hover:scale-110 transition-transform"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>',
                        'rocket' => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-indigo-600 mb-6 group-hover:scale-110 transition-transform"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg>',
                        default => '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 mb-6 group-hover:scale-110 transition-transform"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>'
                    };
                @endphp
                {!! $iconSvg !!}
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $focusArea->title }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $focusArea->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
