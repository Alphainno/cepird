<!-- Navigation -->
<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 bg-transparent py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Logo Area -->
        <div class="flex items-center space-x-2">
            @if($headerSetting && $headerSetting->logo)
                <img src="{{ asset('storage/' . $headerSetting->logo) }}" alt="{{ $headerSetting->brand_name ?? 'Logo' }}" class="h-10 w-auto object-contain">
            @else
                <div class="bg-blue-900 text-white p-2 rounded-sm">
                    <!-- Globe Icon SVG -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                </div>
            @endif
            <div class="leading-tight">
                <h1 class="font-bold text-xl tracking-tight text-slate-900">{{ $headerSetting->brand_name ?? 'CEPIRD' }}</h1>
                @if(($headerSetting->show_tagline ?? true) && ($headerSetting->tagline ?? false))
                    <p class="text-[0.65rem] uppercase tracking-widest text-slate-500 font-semibold hidden sm:block">{{ $headerSetting->tagline }}</p>
                @endif
            </div>
        </div>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-8">
            @if($menuItems && $menuItems->count() > 0)
                @foreach($menuItems as $item)
                    <a href="{{ $item->url }}"
                       class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all"
                       @if($item->open_in_new_tab) target="_blank" rel="noopener noreferrer" @endif>
                        {{ $item->title }}
                    </a>
                @endforeach
            @else
                <a href="{{ route('home') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Home</a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">About</a>
                <a href="{{ route('focus-areas') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Focus Areas</a>
                <a href="{{ route('programs') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Programs</a>
                <a href="{{ route('research') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Research</a>
                <a href="{{ route('contact') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Contact Us</a>
            @endif
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden">
            <button id="mobile-menu-button" class="text-slate-800">
                <!-- Menu Icon SVG -->
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
                <!-- X Icon SVG (initially hidden) -->
                <svg id="x-icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div id="mobile-menu" class="mobile-menu-closed md:hidden bg-white border-t border-slate-100 absolute w-full px-4 py-6 shadow-xl flex flex-col space-y-4">
        @if($menuItems && $menuItems->count() > 0)
            @foreach($menuItems as $item)
                <a href="{{ $item->url }}"
                   class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50"
                   @if($item->open_in_new_tab) target="_blank" rel="noopener noreferrer" @endif>
                    {{ $item->title }}
                </a>
            @endforeach
        @else
            <a href="{{ route('home') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Home</a>
            <a href="{{ route('about') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">About</a>
            <a href="{{ route('focus-areas') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Focus Areas</a>
            <a href="{{ route('programs') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Programs</a>
            <a href="{{ route('research') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Research</a>
            <a href="{{ route('contact') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Contact Us</a>
        @endif
    </div>
</nav>
