<!-- Vision & Mission -->
@if(isset($visionSection) && $visionSection)
<section id="vision" class="py-24 bg-blue-900 text-white relative overflow-hidden">
    <!-- Decorative Circles -->
    <div class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/2 w-96 h-96 border-4 border-white/10 rounded-full"></div>
    <div class="absolute bottom-0 left-0 transform -translate-x-1/2 translate-y-1/2 w-64 h-64 bg-teal-500/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-amber-400 font-bold tracking-widest uppercase text-sm mb-2 block">{{ $visionSection->vision_title }}</span>
                <h2 class="text-3xl md:text-5xl font-bold leading-tight mb-6">
                    {{ $visionSection->vision_heading }}
                </h2>
                <p class="text-blue-100 text-lg leading-relaxed opacity-90">
                    {{ $visionSection->vision_description }}
                </p>
            </div>

            <div class="bg-white/5 backdrop-blur-sm p-8 rounded-sm border border-white/10">
                <h3 class="text-2xl font-bold mb-6">{{ $visionSection->mission_title }}</h3>
                <ul class="space-y-4">
                    @foreach($visionSection->missionPoints as $missionPoint)
                    <li class="flex items-start gap-3">
                        <!-- CheckCircle2 Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-circle-2 text-teal-400 mt-1 flex-shrink-0"><path d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20z"/><path d="m9 12 2 2 4-4"/></svg>
                        <span class="text-blue-50">{{ $missionPoint->point }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endif
