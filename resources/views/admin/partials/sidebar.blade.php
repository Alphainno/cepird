<!-- ================= SIDEBAR ================= -->
<aside id="sidebar"
    class="fixed lg:relative w-64 min-h-screen bg-primary-dark text-white shadow-xl flex-shrink-0">

    <div class="p-6 border-b border-indigo-700">
         <img src="{{ asset('images/logo.png') }}" alt="Nexsports Logo" class="h-16 mx-auto mb-3 object-contain transform group-hover:scale-110 transition-all duration-300">
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-4 p-3 space-y-1">

        <!-- Dashboard -->
        <a href="#"
            class="sidebar-link flex items-center px-4 py-3 rounded-xl bg-indigo-700 text-text-light shadow-md">
            <svg class="w-5 h-5 mr-3 text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <!-- Home (submenu) -->
        <div>
            <button onclick="toggleMenu('homeMenu', this)"
                class="sidebar-link w-full flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700/70 transition duration-150">
                <svg class="w-5 h-5 mr-3 text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" />
                </svg>
                <span class="flex-1 text-left">Home</span>
                <svg class="w-4 h-4 submenu-arrow text-indigo-300" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div id="homeMenu" class="submenu ml-4 space-y-1 text-sm pt-1">
                <a href="{{ route('admin.hero.index') }}" class="block pl-8 pr-4 py-2 rounded-lg text-indigo-200 hover:bg-indigo-700/50 transition">Hero Section</a>
                <a href="{{ route('admin.about.index') }}" class="block pl-8 pr-4 py-2 rounded-lg text-indigo-200 hover:bg-indigo-700/50 transition">About Section</a>
            </div>
        </div>
        <div>
            <button onclick="toggleMenu('productsMenu', this)"
                class="sidebar-link w-full flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700/70 transition duration-150">
                <svg class="w-5 h-5 mr-3 text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
                <span class="flex-1 text-left">Inventory</span>
                <svg class="w-4 h-4 submenu-arrow text-indigo-300" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div id="productsMenu" class="submenu ml-4 space-y-1 text-sm pt-1">
                <a href="#" class="block pl-8 pr-4 py-2 rounded-lg text-indigo-200 hover:bg-indigo-700/50 transition">All Products</a>
                <a href="#" class="block pl-8 pr-4 py-2 rounded-lg text-indigo-200 hover:bg-indigo-700/50 transition">Add Product</a>
                <a href="#" class="block pl-8 pr-4 py-2 rounded-lg text-indigo-200 hover:bg-indigo-700/50 transition">Categories</a>
            </div>
        </div>

        <!-- Orders -->
        <a href="#"
            class="sidebar-link flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700/70 transition duration-150">
            <svg class="w-5 h-5 mr-3 text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            Orders
        </a>

        <!-- Users -->
        <a href="#"
            class="sidebar-link flex items-center px-4 py-3 rounded-xl hover:bg-indigo-700/70 transition duration-150">
            <svg class="w-5 h-5 mr-3 text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M17 20a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v13a2 2 0 002 2h10z" />
                <path d="M12 10a3 3 0 100-6 3 3 0 000 6zM9 18h6" />
            </svg>
            Users
        </a>

    </nav>
</aside>
