@extends('layouts.app')

@section('title', 'Programs & Initiatives - CEPIRD')

@section('content')

<!-- Hero Section -->
@php
    $heroSection = $programHeroSection ?? null;
@endphp

<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20">
    <div class="absolute inset-0">
        @if($heroSection && $heroSection->background_image)
            <img src="{{ $heroSection->background_url }}"
                 alt="{{ $heroSection->title }}"
                 class="w-full h-full object-cover">
        @else
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&auto=format&fit=crop&q=80"
                 alt="Programs and initiatives"
                 class="w-full h-full object-cover">
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-teal-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-5xl mx-auto">
            @if($heroSection && $heroSection->badge_text)
                <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">{{ $heroSection->badge_text }}</span>
            @else
                <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">Empowering Ideas. Influencing Policy. Impacting the Future.</span>
            @endif

            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                {{ $heroSection->title ?? 'Programs & Initiatives' }}
            </h1>

            @if($heroSection && $heroSection->description)
                <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                    {{ $heroSection->description }}
                </p>
            @else
                <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                    CEPIRD's comprehensive programs drive research, innovation, entrepreneurship development, and policy transformation across Bangladesh.
                </p>
            @endif
        </div>
    </div>
</section>

<!-- Programs Overview -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $overviewSection = $programOverviewSection ?? null;
        @endphp

        <div class="text-center mb-16">
            @if($overviewSection)
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $overviewSection->badge_text }}</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">{{ $overviewSection->title }}</h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    {{ $overviewSection->description }}
                </p>
            @else
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">Our Impact Initiatives</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">Four Core Program Areas</h2>
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    From cutting-edge research to hands-on entrepreneurship support, our programs are designed to create measurable impact across Bangladesh's innovation ecosystem.
                </p>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
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
                    <a href="{{ $category->anchor_link }}" class="{{ $colors['text'] }} {{ $colors['hover_text'] }} font-semibold text-sm flex items-center gap-2">
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
                    <a href="#research-publications" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
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
                    <a href="#training-certification" class="text-teal-600 hover:text-teal-700 font-semibold text-sm flex items-center gap-2">
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
                    <a href="#innovation-programs" class="text-amber-600 hover:text-amber-700 font-semibold text-sm flex items-center gap-2">
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
                    <a href="#conferences-events" class="text-indigo-600 hover:text-indigo-700 font-semibold text-sm flex items-center gap-2">
                        View Programs
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Dynamic Program Sections -->
@forelse($programSections as $index => $section)
    @php
        $colors = $section->getColorClasses();
        $bgClass = $index % 2 === 0 ? 'bg-white' : 'bg-slate-50';
        $cardBgClass = $index % 2 === 0 ? 'bg-slate-50' : 'bg-white';
    @endphp
    <section id="{{ $section->slug }}" class="py-20 {{ $bgClass }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12">
                @if($section->badge_text)
                    <span class="{{ $colors['text'] }} font-bold tracking-wider uppercase text-sm">{{ $section->badge_text }}</span>
                @endif
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-4">{{ $section->title }}</h2>
                @if($section->description)
                    <p class="text-lg text-slate-600 max-w-4xl">
                        {{ $section->description }}
                    </p>
                @endif
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @foreach($section->activeItems as $item)
                    <div class="{{ $cardBgClass }} p-8 rounded-sm border border-slate-200 hover:{{ $colors['border'] }} transition-all">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="{{ $colors['bg'] }} w-12 h-12 flex items-center justify-center rounded-sm text-xl flex-shrink-0">
                                @include('components.program-icon', ['icon' => $item->icon])
                            </div>
                            <div>
                                <h3 class="font-bold text-xl text-slate-900 mb-2">{{ $item->title }}</h3>
                                @if($item->duration)
                                    <span class="inline-block px-3 py-1 {{ $colors['bg'] }} {{ str_replace('text-', 'text-', $colors['text']) }}-800 text-xs font-semibold rounded-full mb-3">{{ $item->duration }}</span>
                                @endif
                            </div>
                        </div>
                        @if($item->description)
                            <p class="text-slate-600 mb-4 leading-relaxed">
                                {{ $item->description }}
                            </p>
                        @endif
                        @if($item->features && count($item->features) > 0)
                            <div class="border-t border-slate-200 pt-4 mb-4">
                                <h4 class="font-semibold text-sm text-slate-900 mb-2">{{ $item->features_title ?? 'Key Features:' }}</h4>
                                <ul class="space-y-2 text-sm text-slate-600">
                                    @foreach($item->features as $feature)
                                        <li class="flex items-start gap-2">
                                            <span class="{{ $colors['text'] }} mt-1">✓</span>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($item->info_label && $item->info_value)
                            <div class="{{ str_replace('bg-', 'bg-', $colors['bg']) }}/50 p-4 rounded-sm border {{ $colors['border'] }}">
                                <p class="text-sm text-slate-700"><span class="font-semibold">{{ $item->info_label }}:</span> {{ $item->info_value }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@empty
    <!-- Fallback content if no program sections exist -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-slate-600">No program sections available at this time.</p>
        </div>
    </section>
@endforelse

<!-- Program Impact Stats -->
@if($impactSection && $impactSection->is_active && $impactStats->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $impactSection->badge_text }}</span>
            <h2 class="text-4xl font-bold text-slate-900 mt-2 mb-6">{{ $impactSection->title }}</h2>
            @if($impactSection->description)
                <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                    {{ $impactSection->description }}
                </p>
            @endif
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($impactStats as $stat)
                @php
                    $colors = $stat->getColorClasses();
                @endphp
                <div class="p-8 bg-gradient-to-br {{ $colors['gradient'] }} rounded-sm border {{ $colors['border'] }} text-center">
                    <div class="text-5xl font-bold {{ $colors['text'] }} mb-2">{{ $stat->value }}</div>
                    <p class="font-semibold text-slate-900 mb-1">{{ $stat->label }}</p>
                    @if($stat->description)
                        <p class="text-sm text-slate-600">{{ $stat->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-br from-blue-900 via-indigo-900 to-blue-800 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC40Ij48cGF0aCBkPSJNMzYgMzRjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6bTAtMjBjMC0yLjIxIDEuNzktNCA0LTRzNCAxLjc5IDQgNC0xLjc5IDQtNCA0LTQtMS43OS00LTR6Ii8+PC9nPjwvZz48L3N2Zz4=')]"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">Join Our Programs</h2>
            <p class="text-xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                Whether you're an aspiring entrepreneur, researcher, or innovator, CEPIRD has a program designed to help you achieve your goals and create meaningful impact.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="#" class="px-10 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors text-lg shadow-lg hover:shadow-xl">
                    Apply Now
                </a>
                <a href="#" class="px-10 py-4 bg-teal-600 text-white font-bold rounded-sm hover:bg-teal-700 transition-colors border border-teal-500 text-lg shadow-lg hover:shadow-xl">
                    Download Brochure
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
