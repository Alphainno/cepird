<!-- Hero Section -->
@php
    $hero = $heroSection ?? null;
@endphp
<header id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
    <!-- Background Elements -->
    <div class="absolute inset-0 z-0 opacity-10">
        <svg class="h-full w-full" viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M0 100 L100 0 L100 100 Z" fill="#0f172a" />
            <defs>
                <pattern id="grid" width="4" height="4" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" class="text-blue-900" fill="currentColor" />
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#grid)" />
        </svg>
    </div>

    <!-- Abstract Blue Accent -->
    <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-teal-100 rounded-full blur-3xl opacity-50"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-blue-100 rounded-full blur-3xl opacity-50"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center space-x-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 mb-8">
            <span class="flex h-2 w-2 rounded-full bg-teal-500"></span>
            <span class="text-xs font-bold text-blue-900 uppercase tracking-wide">{{ $hero->badge_text ?? "Driving Bangladesh's Future" }}</span>
        </div>

        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-slate-900 leading-tight mb-6">
            {{ $hero->title_line1 ?? 'Empowering Ideas.' }} <br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-teal-600">
                {{ $hero->title_line2 ?? 'Influencing Policy.' }}
            </span> <br/>
            {{ $hero->title_line3 ?? 'Impacting the Future.' }}
        </h1>

        <p class="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 mb-10 leading-relaxed">
            {{ $hero->description ?? 'Driving entrepreneurial growth, policy innovation, and digital transformation. Bridging the gap between academic research and real-world economic impact.' }}
        </p>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="{{ $hero->button1_link ?? '#' }}" class="w-full sm:w-auto px-8 py-4 bg-blue-900 text-white font-semibold rounded-sm hover:bg-blue-800 transition-colors shadow-lg flex items-center justify-center gap-2">
                {{ $hero->button1_text ?? 'Explore Programs' }}
                <!-- ArrowRight Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
            </a>
            {{-- <a href="{{ $hero->button2_link ?? '#' }}" class="w-full sm:w-auto px-8 py-4 bg-white text-blue-900 border border-slate-200 font-semibold rounded-sm hover:bg-slate-50 transition-colors shadow-sm flex items-center justify-center gap-2">
                {{ $hero->button2_text ?? 'Download Policy Report' }}
                <!-- FileText Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
            </a> --}}
        </div>

        <p class="mt-8 text-sm text-slate-500 font-medium">
            Founded by <span class="text-slate-800 font-bold border-b-2 border-amber-400">{{ $hero->founder_name ?? 'Mohammad Shahriar Khan' }}</span>
        </p>
    </div>
</header>
