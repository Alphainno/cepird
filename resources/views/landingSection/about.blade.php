<!-- About / Mission Pillars -->
@php
    $about = $aboutSection ?? null;
@endphp
<section id="about" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">{{ $about->main_title ?? 'Accelerating a Knowledge-Driven Economy' }}</h2>
            <div class="w-20 h-1 bg-teal-500 mx-auto rounded-full"></div>
            <p class="mt-4 text-slate-600 max-w-2xl mx-auto">
                {{ $about->subtitle ?? 'CEPIRD serves as the premier think-tank and execution hub for modernizing the entrepreneurial landscape.' }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Pillar 1: Policy Research -->
            <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-4 border-transparent hover:border-blue-900 group">
                <!-- FileText Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-{{ $about->pillar1_icon ?? 'file-text' }} text-blue-600 mb-6 group-hover:scale-110 transition-transform"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $about->pillar1_title ?? 'Policy Research' }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $about->pillar1_description ?? 'Data-driven insights to shape national frameworks.' }}</p>
            </div>

            <!-- Pillar 2: Innovation -->
            <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-4 border-transparent hover:border-blue-900 group">
                <!-- Lightbulb Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-{{ $about->pillar2_icon ?? 'lightbulb' }} text-amber-500 mb-6 group-hover:scale-110 transition-transform"><path d="M15 14c.2-1 .6-3 2-3a5 5 0 0 1 0 10"/><path d="M7 14c-.2-1-.6-3-2-3a5 5 0 0 0 0 10"/><path d="M9 18a5 5 0 0 0 6 0"/><path d="M12 2a4 4 0 0 0-4 4c0 3 4 5 4 5s4-2 4-5a4 4 0 0 0-4-4"/></svg>
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $about->pillar2_title ?? 'Innovation' }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $about->pillar2_description ?? 'Fostering creative solutions for systemic challenges.' }}</p>
            </div>

            <!-- Pillar 3: Entrepreneurship -->
            <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-4 border-transparent hover:border-blue-900 group">
                <!-- TrendingUp Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-{{ $about->pillar3_icon ?? 'trending-up' }} text-teal-600 mb-6 group-hover:scale-110 transition-transform"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="18 7 22 7 22 11"/></svg>
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $about->pillar3_title ?? 'Entrepreneurship' }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $about->pillar3_description ?? 'Supporting startups from ideation to scale.' }}</p>
            </div>

            <!-- Pillar 4: Skill Development -->
            <div class="bg-white p-8 rounded-sm shadow-sm hover:shadow-xl transition-shadow duration-300 border-t-4 border-transparent hover:border-blue-900 group">
                <!-- Users Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-{{ $about->pillar4_icon ?? 'users' }} text-indigo-600 mb-6 group-hover:scale-110 transition-transform"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $about->pillar4_title ?? 'Skill Development' }}</h3>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $about->pillar4_description ?? 'Equipping the workforce for the 4th Industrial Revolution.' }}</p>
            </div>
        </div>
    </div>
</section>
