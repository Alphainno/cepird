<!-- Founder Section -->
@if(isset($founder) && $founder)
<section id="founder" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-sm shadow-xl overflow-hidden border border-slate-100">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-2/5 bg-slate-100 relative min-h-[300px]">
                    <!-- Founder Image -->
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-200">
                        @if($founder->image)
                        <img src="{{ asset($founder->image) }}" alt="{{ $founder->name }}" class="object-cover w-full h-full">
                        @else
                        <!-- Users Icon SVG for Placeholder -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users text-slate-400"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        @endif
                        <span class="absolute bottom-4 text-xs text-slate-500">Photo: {{ $founder->name }}</span>
                    </div>
                </div>
                <div class="md:w-3/5 p-8 md:p-12 flex flex-col justify-center">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="h-0.5 w-8 bg-amber-500"></div>
                        <span class="text-sm font-bold text-slate-500 uppercase tracking-widest">Founder Profile</span>
                    </div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-2">{{ $founder->name }}</h2>
                    <p class="text-teal-600 font-medium mb-6">{{ $founder->title }}</p>

                    <blockquote class="text-slate-600 italic text-lg leading-relaxed mb-8 border-l-4 border-slate-200 pl-4">
                        "{{ $founder->quote }}"
                    </blockquote>

                    <div class="flex gap-4">
                        @if($founder->linkedin_url)
                        @php
                            $linkedinHref = $founder->linkedin_url;
                            if (!str_starts_with($linkedinHref, 'http')) {
                                $username = ltrim($linkedinHref, '@');
                                $linkedinHref = 'https://linkedin.com/in/' . $username;
                            }
                        @endphp
                        <a href="{{ $linkedinHref }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full bg-slate-100 hover:bg-blue-100 hover:text-blue-900 transition-colors">
                            <!-- Linkedin Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                        @endif
                        @if($founder->twitter_url)
                        @php
                            $twitterHref = $founder->twitter_url;
                            if (!str_starts_with($twitterHref, 'http')) {
                                $username = ltrim($twitterHref, '@');
                                $twitterHref = 'https://twitter.com/' . $username;
                            }
                        @endphp
                        <a href="{{ $twitterHref }}" target="_blank" rel="noopener noreferrer" class="p-2 rounded-full bg-slate-100 hover:bg-blue-100 hover:text-blue-900 transition-colors">
                            <!-- Twitter Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2 1.7-1.4 3-3 3.6-5.2s-.5-4.4-1.5-5.8c-1.3-1.6-3.1-2.4-5-2.6 3.1 1.7 5.8 4.3 7 7 1.2 2.7 1.8 5.6 1.8 8.6a8.8 8.8 0 0 1-1.3 4.5c1.4-.4 2.8-.7 4-1.2"/></svg>
                        </a>
                        @endif
                        @if($founder->email)
                        <a href="mailto:{{ $founder->email }}" class="p-2 rounded-full bg-slate-100 hover:bg-blue-100 hover:text-blue-900 transition-colors">
                            <!-- Mail Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
