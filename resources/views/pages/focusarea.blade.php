@extends('layouts.app')

@section('title', 'Core Focus Areas - CEPIRD')

@section('content')

<!-- Hero Section -->
<section class="relative bg-white pt-32 pb-28 overflow-hidden mt-20 z-10">
    <div class="absolute inset-0">
        <img src="{{ $heroSection ? asset('storage/' . $heroSection->background_image) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&auto=format&fit=crop&q=80' }}"
             alt="Team collaboration"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/95 via-slate-900/90 to-blue-900/85"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center max-w-5xl mx-auto">
            <span class="text-teal-300 font-bold tracking-wider uppercase text-sm">{{ $heroSection ? $heroSection->subtitle : 'Our Strategic Focus' }}</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-3 mb-6 leading-tight tracking-tight text-white">
                {{ $heroSection ? $heroSection->title : 'Core Focus Areas' }}
            </h1>
            <p class="text-xl text-slate-200 mb-8 leading-relaxed font-light">
                {{ $heroSection ? $heroSection->description : 'CEPIRD operates at the critical intersection of policy, innovation, research, and entrepreneurship development.' }}
            </p>
        </div>
    </div>
</section>

<!-- Four Core Focus Areas -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col justify-center items-center mb-12 border-b border-slate-100 pb-4 w-full">
            <div class="text-center">
                <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $focusAreas->first()->focusAreaSection->badge_text ?? 'Our Focus Areas' }}</span>
                <h2 class="text-3xl font-bold text-slate-900 mt-2">{{ $focusAreas->first()->focusAreaSection->title ?? 'Core Focus Areas' }}</h2>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @forelse($focusAreas ?? [] as $focusArea)
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-blue-200 transition-colors group cursor-pointer">
                <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm mb-4 text-blue-900 text-xl group-hover:bg-blue-200 transition-colors">
                    {{ $focusArea->icon ?? '📋' }}
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">{{ $focusArea->title }}</h3>
                <p class="text-sm text-slate-600 mb-4">{{ $focusArea->description }}</p>
                <a href="#{{ $focusArea->slug ?: \Illuminate\Support\Str::slug($focusArea->title) }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
            @empty
            <!-- Fallback: Policy Development -->
            <div class="p-6 bg-white rounded-sm border border-slate-100 hover:border-blue-200 transition-colors group cursor-pointer">
                <div class="bg-blue-100 w-12 h-12 flex items-center justify-center rounded-sm mb-4 text-blue-900 text-xl group-hover:bg-blue-200 transition-colors">
                    📋
                </div>
                <h3 class="font-bold text-lg text-slate-900 mb-2">Policy Development</h3>
                <p class="text-sm text-slate-600 mb-4">Evidence-based frameworks strengthening entrepreneurship and digital transformation.</p>
                <a href="#policy-development" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
            </div>
            @endforelse
        </div>
    </div>
</section>

@foreach($focusAreas ?? [] as $index => $focusArea)
@php
    $sectionId = $focusArea->slug ?: \Illuminate\Support\Str::slug($focusArea->title ?? 'focus-area-' . ($index + 1));
    $isEven = $index % 2 === 1;
    $bgClass = $isEven ? 'bg-slate-50' : 'bg-white';
@endphp
<section id="{{ $sectionId }}" class="py-20 {{ $bgClass }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="{{ $isEven ? 'md:order-last' : '' }}">
                <img src="{{ $focusArea->image_path ? (str_starts_with($focusArea->image_path, 'http') ? $focusArea->image_path : asset('storage/' . $focusArea->image_path)) : 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&auto=format&fit=crop&q=80' }}"
                     alt="{{ $focusArea->title }}"
                     class="rounded-sm shadow-lg w-full object-cover">
            </div>
            <div class="{{ $isEven ? 'md:order-first' : '' }}">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">{{ $focusArea->subheading ?? 'Focus Area ' . ($index + 1) }}</span>
                <h2 class="text-4xl font-bold text-slate-900 mt-3 mb-6">{{ $focusArea->title }}</h2>
                <p class="text-lg text-slate-700 mb-6 leading-relaxed">
                    {{ $focusArea->detail_description ?? $focusArea->description }}
                </p>

                <div class="space-y-4 mb-8">
                    @if($focusArea->highlight1_title)
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">{{ $focusArea->highlight1_icon ?? '📌' }}</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">{{ $focusArea->highlight1_title }}</h4>
                            <p class="text-slate-600 text-sm mt-1">{{ $focusArea->highlight1_description }}</p>
                        </div>
                    </div>
                    @endif
                    @if($focusArea->highlight2_title)
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">{{ $focusArea->highlight2_icon ?? '📌' }}</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">{{ $focusArea->highlight2_title }}</h4>
                            <p class="text-slate-600 text-sm mt-1">{{ $focusArea->highlight2_description }}</p>
                        </div>
                    </div>
                    @endif
                    @if($focusArea->highlight3_title)
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-50 rounded-sm flex items-center justify-center text-lg">{{ $focusArea->highlight3_icon ?? '📌' }}</div>
                        <div>
                            <h4 class="font-semibold text-slate-900">{{ $focusArea->highlight3_title }}</h4>
                            <p class="text-slate-600 text-sm mt-1">{{ $focusArea->highlight3_description }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                @if($focusArea->cta_text || $focusArea->cta_link)
                {{-- <a href="{{ $focusArea->cta_link ?? '#' }}" class="inline-block px-8 py-3 bg-blue-900 text-white font-semibold rounded-sm hover:bg-blue-800 transition-colors">
                    {{ $focusArea->cta_text ?? 'Learn More' }}
                </a> --}}
                @endif
            </div>
        </div>
    </div>
</section>
@endforeach

<!-- Key Deliverables -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $focusAreaOutcomeSection->badge_text ?? 'Key Outcomes' }}</span>
            <h2 class="text-3xl font-bold text-slate-900 mt-2 mb-6">{{ $focusAreaOutcomeSection->title ?? 'What We Deliver' }}</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">
                {{ $focusAreaOutcomeSection->description ?? 'Our focus areas translate into concrete deliverables that drive real impact across Bangladesh\'s entrepreneurial ecosystem.' }}
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($focusAreaOutcomes ?? [] as $outcome)
            <div class="p-6 bg-blue-50 rounded-sm border border-blue-200">
                <div class="text-3xl mb-4">{{ $outcome->icon ?? '📌' }}</div>
                <h3 class="font-bold text-slate-900 mb-2">{{ $outcome->title }}</h3>
                <p class="text-sm text-slate-600">{{ $outcome->description }}</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    @if($outcome->bullet1)<li>✓ {{ $outcome->bullet1 }}</li>@endif
                    @if($outcome->bullet2)<li>✓ {{ $outcome->bullet2 }}</li>@endif
                    @if($outcome->bullet3)<li>✓ {{ $outcome->bullet3 }}</li>@endif
                </ul>
            </div>
            @empty
            <div class="p-6 bg-blue-50 rounded-sm border border-blue-200">
                <div class="text-3xl mb-4">📋</div>
                <h3 class="font-bold text-slate-900 mb-2">Policy Frameworks</h3>
                <p class="text-sm text-slate-600">Actionable policy recommendations for government and institutions</p>
                <ul class="mt-4 space-y-2 text-xs text-slate-600">
                    <li>✓ Digital Transformation Strategy</li>
                    <li>✓ Startup Ecosystem Policy</li>
                    <li>✓ SME Development Guidelines</li>
                </ul>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Impact Section -->
<section class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-teal-600 font-bold tracking-wider uppercase text-sm">{{ $impactSection->badge_text ?? 'Our Impact' }}</span>
            <h2 class="text-3xl font-bold text-slate-900 mt-2">{{ $impactSection->title ?? 'Driving Change Across Bangladesh' }}</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            @forelse($impactMetrics ?? [] as $metric)
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-blue-900 mb-2">{{ $metric->value }}</div>
                <p class="font-semibold text-slate-900">{{ $metric->title }}</p>
                <p class="text-sm text-slate-600 mt-2">{{ $metric->description }}</p>
            </div>
            @empty
            <div class="p-6 bg-white rounded-sm border border-slate-100 text-center">
                <div class="text-4xl font-bold text-blue-900 mb-2">500+</div>
                <p class="font-semibold text-slate-900">Entrepreneurs Supported</p>
                <p class="text-sm text-slate-600 mt-2">Through mentorship and training programs</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
@if($focusAreaCtaSection)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-blue-900 to-teal-700 rounded-sm p-12 md:p-16 text-white text-center">
            <h2 class="text-4xl font-bold mb-6">{{ $focusAreaCtaSection->title }}</h2>
            <p class="text-lg text-blue-100 mb-10 max-w-3xl mx-auto">
                {{ $focusAreaCtaSection->description }}
            </p>
            <div class="flex justify-center">
                <a href="{{ route('contact') }}" class="px-8 py-4 bg-white text-blue-900 font-bold rounded-sm hover:bg-blue-50 transition-colors">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endif

@endsection
