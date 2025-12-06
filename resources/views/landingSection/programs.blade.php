<!-- Programs & Initiatives -->
<section id="programs" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900">Programs & Initiatives</h2>
            <p class="mt-3 text-slate-600">Actionable pathways for growth and learning.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Column 1: Research & Training -->
            <div class="space-y-8">
                <!-- Research & Publications -->
                <div class="bg-white p-8 rounded-sm shadow-md border-l-4 border-blue-900">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Research & Publications</h3>
                        <!-- FileText Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text text-slate-300"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                    </div>
                    <ul class="space-y-4">
                        @if(isset($programs['research']))
                        @foreach($programs['research'] as $program)
                        <li class="flex justify-between items-center border-b border-slate-100 pb-2">
                            <span class="text-slate-700 font-medium">{{ $program->title }}</span>
                            @if($program->link)
                            <a href="{{ $program->link }}" class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-500 hover:bg-slate-200">PDF</a>
                            @else
                            <span class="text-xs bg-slate-100 px-2 py-1 rounded text-slate-500">PDF</span>
                            @endif
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    <a href="#" class="mt-6 inline-block text-blue-900 text-sm font-bold hover:underline">View Library &rarr;</a>
                </div>

                <!-- Training & Certification -->
                <div class="bg-white p-8 rounded-sm shadow-md border-l-4 border-teal-500">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Training & Certification</h3>
                        <!-- Award Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-award text-slate-300"><path d="m15.4 11.5 2.13.787a2 2 0 0 0 1.25-3.418L17.7 7.3"/><path d="M11.3 14.7c.1-.1.2-.2.3-.3l3.6-3.6 2 2-3.6 3.6c-.1.1-.2.2-.3.3"/><path d="m8.5 13.7c.3-.3.6-.6 1-.9l1.8-1.8 2 2-1.8 1.8c-.3.3-.6.6-1 .9"/><path d="m12.7 17.5c-.3.3-.6.6-1 1l-1.8 1.8-2-2 1.8-1.8c.3-.3.6-.6 1-1"/></svg>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @if(isset($programs['training']))
                        @foreach($programs['training'] as $program)
                        <span class="bg-teal-50 text-teal-800 text-sm px-3 py-1 rounded-full font-medium">{{ $program->title }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <!-- Column 2: Innovation & Events -->
            <div class="space-y-8">
                <!-- Innovation Programs -->
                <div class="bg-white p-8 rounded-sm shadow-md border-l-4 border-amber-500">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-slate-900">Innovation Programs</h3>
                        <!-- Lightbulb Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb text-slate-300"><path d="M15 14c.2-1 .6-3 2-3a5 5 0 0 1 0 10"/><path d="M7 14c-.2-1-.6-3-2-3a5 5 0 0 0 0 10"/><path d="M9 18a5 5 0 0 0 6 0"/><path d="M12 2a4 4 0 0 0-4 4c0 3 4 5 4 5s4-2 4-5a4 4 0 0 0-4-4"/></svg>
                    </div>
                    <div class="space-y-4">
                        @if(isset($programs['innovation']))
                        @foreach($programs['innovation'] as $program)
                        <div class="p-4 bg-slate-50 rounded border border-slate-100">
                            <h4 class="font-bold text-slate-900">{{ $program->title }}</h4>
                            @if($program->description)
                            <p class="text-sm text-slate-600 mt-1">{{ $program->description }}</p>
                            @endif
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-blue-50 p-8 rounded-sm shadow-inner border border-blue-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-blue-900">Upcoming Events</h3>
                        <!-- Users Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users text-blue-300"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <div class="space-y-3">
                        @if(isset($programs['event']))
                        @foreach($programs['event'] as $program)
                        <div class="flex gap-4">
                            <div class="text-center min-w-[3rem]">
                                @if($program->event_date)
                                <span class="block text-xl font-bold text-teal-600">{{ $program->event_date->format('j') }}</span>
                                <span class="block text-xs uppercase text-slate-500">{{ $program->event_date->format('M') }}</span>
                                @else
                                <span class="block text-xl font-bold text-teal-600">--</span>
                                <span class="block text-xs uppercase text-slate-500">TBD</span>
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm">{{ $program->title }}</h4>
                                <p class="text-xs text-slate-500">{{ $program->location ?? 'Location TBD' }}</p>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
