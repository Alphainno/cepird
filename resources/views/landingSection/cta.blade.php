<!-- CTA Section -->
@if(isset($ctaSection) && $ctaSection)
<section class="py-20 bg-slate-900 text-center px-4">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">{{ $ctaSection->title }}</h2>
        <p class="text-slate-400 mb-10 text-lg">{{ $ctaSection->description }}</p>
        <div class="flex justify-center">
            <a href="{{ $ctaSection->button_url }}" class="px-8 py-3 bg-teal-500 text-white font-bold rounded-sm hover:bg-teal-600 transition-colors">
                {{ $ctaSection->button_text }}
            </a>
        </div>
    </div>
</section>
@endif
