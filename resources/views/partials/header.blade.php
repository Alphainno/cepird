<!-- Navigation -->
<nav id="navbar" class="fixed w-full z-50 transition-all duration-300 bg-transparent py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Logo Area -->
        <div class="flex items-center space-x-2">
            <div class="bg-blue-900 text-white p-2 rounded-sm">
                <!-- Globe Icon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-globe"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
            </div>
            <div class="leading-tight">
                <h1 class="font-bold text-xl tracking-tight text-slate-900">CEPIRD</h1>
                <p class="text-[0.65rem] uppercase tracking-widest text-slate-500 font-semibold hidden sm:block">Innovate. Lead. Inspire.</p>
            </div>
        </div>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('home') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Home</a>
            <a href="{{ route('about') }}" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">About</a>
            <button onclick="scrollToSection('focus-areas')" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Focus Areas</button>
            <button onclick="scrollToSection('programs')" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Programs</button>
            <button onclick="scrollToSection('vision')" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Vision</button>
            <button onclick="scrollToSection('founder')" class="text-sm font-medium text-slate-600 hover:text-blue-900 hover:underline decoration-teal-500 decoration-2 underline-offset-4 transition-all">Founder</button>
            <a href="#" class="bg-blue-900 hover:bg-blue-800 text-white px-5 py-2 rounded-sm text-sm font-semibold transition-colors shadow-sm">
                Get Involved
            </a>
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
        <a href="{{ route('home') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Home</a>
        <a href="{{ route('about') }}" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">About</a>
        <button onclick="scrollToSection('focus-areas')" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Focus Areas</button>
        <button onclick="scrollToSection('programs')" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Programs</button>
        <button onclick="scrollToSection('vision')" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Vision</button>
        <button onclick="scrollToSection('founder')" class="text-left text-lg font-medium text-slate-800 py-2 border-b border-slate-50">Founder</button>
        <a href="#" class="bg-blue-900 text-white w-full py-3 rounded-sm font-semibold mt-4 text-center">
            Get Involved
        </a>
    </div>
</nav>
