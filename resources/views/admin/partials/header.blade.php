<!-- ================= HEADER ================= -->
<header class="bg-white px-4 lg:px-8 py-4 shadow-lg flex justify-between items-center sticky top-0 z-40">

    <div class="flex items-center gap-4">
        <!-- Mobile Menu Button -->
        <button id="sidebarToggle" class="text-gray-600 lg:hidden p-2 rounded-full hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
        <h2 class="text-xl font-bold text-gray-800 hidden lg:block">@yield('page-title', 'Dashboard Overview')</h2>
    </div>


    <!-- User Dropdown -->
    <div class="relative dropdown">
        <button onclick="toggleDropdown()"
            class="flex items-center gap-2 p-2 rounded-full hover:bg-gray-100 transition duration-150">
            <span class="text-md font-semibold text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</span>
            <!-- User Avatar -->
            @if(Auth::user() && Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 rounded-full object-cover">
            @else
                <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-sm">
                    {{ Auth::user() ? strtoupper(substr(Auth::user()->name, 0, 1)) : 'A' }}
                </div>
            @endif
            <svg class="w-4 h-4 dropdown-arrow text-gray-500" fill="none" stroke="currentColor"
                stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 9l6 6 6-6" />
            </svg>
        </button>

        <div id="userDropdown"
            class="dropdown-menu absolute right-0 mt-3 bg-white text-gray-700 border border-gray-100 rounded-xl shadow-2xl w-48 py-2 overflow-hidden z-50">
            <div class="px-4 py-3 border-b border-gray-100">
                <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
            </div>

            <a href="{{ route('admin.profile.index') }}" class="block px-4 py-2 hover:bg-primary-light transition">
                 <!-- Lucide: User Icon -->
                 <svg class="w-4 h-4 inline mr-2 align-middle text-primary-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                 Profile
            </a>

            <div class="h-px bg-gray-100 my-1"></div>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left block px-4 py-2 hover:bg-red-50 transition text-red-500">
                    <!-- Lucide: Log Out Icon -->
                    <svg class="w-4 h-4 inline mr-2 align-middle" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>
