<!-- Programs & Initiatives -->
<section id="programs" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $overviewSection = $programOverviewSection ?? null;
        @endphp

        <div class="text-center mb-12">
            @if($overviewSection)
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $overviewSection->badge_text }}</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">{{ $overviewSection->title }}</h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    {{ $overviewSection->description }}
                </p>
            @else
                <h2 class="text-3xl font-bold text-slate-900">Programs & Initiatives</h2>
                <p class="mt-3 text-slate-600">Actionable pathways for growth and learning.</p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @forelse($programCategories as $category)
                @php
                    $colors = $category->getColorClasses();
                @endphp
                <div class="p-6 bg-white rounded-sm border border-slate-100 {{ $colors['border'] }} transition-all group cursor-pointer hover:shadow-lg">
                    <div class="{{ $colors['bg'] }} w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl {{ $colors['hover'] }} transition-colors">
                        {{ $category->icon ?? '📘' }}
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2">{{ $category->title }}</h3>
                    <p class="text-sm text-slate-600 mb-4">{{ $category->description }}</p>
                    <a href="{{ route('programs') }}{{ $category->anchor_link }}" class="{{ $colors['text'] }} {{ $colors['hover_text'] }} font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            @empty
                <!-- Fallback to default categories if none exist -->
                <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-blue-200 transition-all group cursor-pointer hover:shadow-lg">
                    <div class="bg-blue-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-blue-200 transition-colors">
                        📘
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2">Research & Publications</h3>
                    <p class="text-sm text-slate-600 mb-4">Evidence-based research driving policy innovation and entrepreneurial development.</p>
                    <a href="{{ route('programs') }}#research-publications" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-teal-200 transition-all group cursor-pointer hover:shadow-lg">
                    <div class="bg-teal-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-teal-200 transition-colors">
                        🎓
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2">Training & Certification</h3>
                    <p class="text-sm text-slate-600 mb-4">Building future-ready skills and leadership for a digital economy.</p>
                    <a href="{{ route('programs') }}#training-certification" class="text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-amber-200 transition-all group cursor-pointer hover:shadow-lg">
                    <div class="bg-amber-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-amber-200 transition-colors">
                        💡
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2">Innovation Programs</h3>
                    <p class="text-sm text-slate-600 mb-4">Accelerating startups and fostering youth-led innovation.</p>
                    <a href="{{ route('programs') }}#innovation-programs" class="text-amber-600 hover:text-amber-700 font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-indigo-200 transition-all group cursor-pointer hover:shadow-lg">
                    <div class="bg-indigo-100 w-14 h-14 flex items-center justify-center rounded-sm mb-4 text-2xl group-hover:bg-indigo-200 transition-colors">
                        📣
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2">Conferences & Events</h3>
                    <p class="text-sm text-slate-600 mb-4">National-level summits connecting stakeholders and thought leaders.</p>
                    <a href="{{ route('programs') }}#conferences-events" class="text-indigo-600 hover:text-indigo-700 font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>
