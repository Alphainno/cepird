<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Admin Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Custom Tailwind config for the professional Indigo theme
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-dark': '#3730a3',   // Indigo 800 (Sidebar BG)
                        'primary-accent': '#4f46e5', // Indigo 600 (Borders, Active Links)
                        'primary-light': '#eef2ff',  // Indigo 100 (Light BG/Hovers)
                        'text-light': '#f5f7fa',     // Near white for readability on dark BG
                    }
                }
            }
        }
    </script>

    <style>
        /* Sidebar Menu Arrow Animation */
        .submenu-arrow {
            transition: transform 0.3s ease;
        }

        .submenu-arrow.rotated {
            transform: rotate(90deg);
        }

        /* Submenu */
        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }

        .submenu.open {
            max-height: 500px; /* Arbitrary large number for smooth transition */
            transition: max-height 0.5s ease-in;
        }

        /* Dropdown */
        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-arrow {
            transition: transform 0.3s ease;
        }

        .dropdown-arrow.rotate {
            transform: rotate(180deg);
        }

        /* Sidebar overlay for mobile */
        #sidebar {
            /* Fixed position on mobile, slide in/out */
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 50; /* Above content */
        }

        #sidebar.open {
            transform: translateX(0);
        }

        /* On large screens, the sidebar is always visible and pushes content */
        @media (min-width: 1024px) {
            #sidebar {
                transform: translateX(0);
                position: relative;
            }
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">

    <!-- === Main Wrapper === -->
    <div class="flex min-h-screen">

        <!-- ================= SIDEBAR ================= -->
        <aside id="sidebar"
            class="fixed lg:relative w-64 min-h-screen bg-primary-dark text-white shadow-xl flex-shrink-0">

            <div class="p-6 border-b border-indigo-700">
                <h1 class="text-xl font-extrabold tracking-wider text-text-light">Enterprise Connect</h1>
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

                <!-- Products (submenu) -->
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

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 overflow-x-hidden">

            <!-- ================= HEADER ================= -->
            <header class="bg-white px-4 lg:px-8 py-4 shadow-lg flex justify-between items-center sticky top-0 z-40">

                <div class="flex items-center gap-4">
                    <!-- Mobile Menu Button -->
                    <button id="sidebarToggle" class="text-gray-600 lg:hidden p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                    <h2 class="text-xl font-bold text-gray-800 hidden lg:block">Dashboard Overview</h2>
                </div>


                <!-- User Dropdown -->
                <div class="relative dropdown">
                    <button onclick="toggleDropdown()"
                        class="flex items-center gap-2 p-2 rounded-full hover:bg-gray-100 transition duration-150">
                        <span class="text-md font-semibold text-gray-700">Jitendra</span>
                        <!-- Placeholder Avatar -->
                        <div class="w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-sm">J</div>
                        <svg class="w-4 h-4 dropdown-arrow text-gray-500" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path d="M6 9l6 6 6-6" />
                        </svg>
                    </button>

                    <div id="userDropdown"
                        class="dropdown-menu absolute right-0 mt-3 bg-white text-gray-700 border border-gray-100 rounded-xl shadow-2xl w-48 py-2 overflow-hidden z-50">
                        <a href="#" class="block px-4 py-2 hover:bg-primary-light transition">
                             <!-- Lucide: User Icon -->
                             <svg class="w-4 h-4 inline mr-2 align-middle text-primary-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                             Profile
                        </a>
                        <a href="#" class="block px-4 py-2 hover:bg-primary-light transition">
                            <!-- Lucide: Settings Icon -->
                            <svg class="w-4 h-4 inline mr-2 align-middle text-primary-accent" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.22a2 2 0 0 0-1.22 1.22l-.22.44a2 2 0 0 0 1.22 2.82l.44.22a2 2 0 0 0 1.22 1.22v.44a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.44a2 2 0 0 0 1.22-1.22l.22-.44a2 2 0 0 0-1.22-2.82l-.44-.22a2 2 0 0 0-1.22-1.22V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                            Settings
                        </a>
                        <div class="h-px bg-gray-100 my-1"></div>
                        <a href="#" class="block px-4 py-2 hover:bg-red-50 transition text-red-500">
                            <!-- Lucide: Log Out Icon -->
                            <svg class="w-4 h-4 inline mr-2 align-middle" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>
                            Logout
                        </a>
                    </div>
                </div>
            </header>

            <!-- ================= CONTENT ================= -->
            <main class="p-4 md:p-8">
                <!-- Stat Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

                    <!-- Card 1: Total Users -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-primary-accent">
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-medium uppercase text-sm">Total Users</h3>
                            <div class="bg-indigo-100 p-2 rounded-full text-indigo-600">
                                <!-- Lucide: Users Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-gray-800 mt-2">1,204</p>
                        <p class="text-sm text-gray-400 mt-1"><span class="text-green-500 font-semibold">+12%</span> since last month</p>
                    </div>

                    <!-- Card 2: Orders Today -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-yellow-500">
                         <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-medium uppercase text-sm">Orders Today</h3>
                            <div class="bg-yellow-100 p-2 rounded-full text-yellow-600">
                                <!-- Lucide: Shopping Cart Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 12.31a2 2 0 0 0 2 1.69h9.72a2 2 0 0 0 2-1.69L23 5H6"/></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-gray-800 mt-2">32</p>
                        <p class="text-sm text-gray-400 mt-1"><span class="text-red-500 font-semibold">-5%</span> compared to yesterday</p>
                    </div>

                    <!-- Card 3: Revenue -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-primary-accent/70">
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-medium uppercase text-sm">Total Revenue</h3>
                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                <!-- Lucide: Dollar Sign Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-gray-800 mt-2">$4,320</p>
                        <p class="text-sm text-gray-400 mt-1"><span class="text-green-500 font-semibold">+8.1%</span> this week</p>
                    </div>

                    <!-- Card 4: Product Views -->
                    <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-purple-500">
                        <div class="flex justify-between items-center">
                            <h3 class="text-gray-500 font-medium uppercase text-sm">Product Views</h3>
                            <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                <!-- Lucide: Eye Icon -->
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </div>
                        </div>
                        <p class="text-4xl font-extrabold text-gray-800 mt-2">15,890</p>
                        <p class="text-sm text-gray-400 mt-1">Highest peak today</p>
                    </div>

                </div>

                <!-- Recent Activity Table -->
                <div class="mt-8 bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr class="hover:bg-primary-light/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#9876</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Alice Johnson</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-light text-primary-dark">
                                            Completed
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$120.50</td>
                                </tr>
                                <tr class="hover:bg-primary-light/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#9877</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Robert Smith</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Processing
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$85.00</td>
                                </tr>
                                <tr class="hover:bg-primary-light/50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#9878</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Ella Davis</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Cancelled
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">$5.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>

        </div>
    </div>
    <!-- Sidebar Backdrop for mobile -->
    <div id="sidebarBackdrop" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>

    <!-- ================= JS ================= -->
    <script>
        // Submenu Toggle with localStorage persistence
        function toggleMenu(menuId, element) {
            const submenu = document.getElementById(menuId);
            const arrow = element.querySelector(".submenu-arrow");

            submenu.classList.toggle("open");
            arrow.classList.toggle("rotated");

            // Save submenu state to localStorage
            const isOpen = submenu.classList.contains("open");
            localStorage.setItem('submenu_' + menuId, isOpen ? 'open' : 'closed');
        }

        // User Dropdown Toggle
        function toggleDropdown() {
            const menu = document.getElementById("userDropdown");
            const arrow = document.querySelector(".dropdown-arrow");

            menu.classList.toggle("show");
            arrow.classList.toggle("rotate");
        }

        // Close dropdown on outside click
        document.addEventListener("click", function (event) {
            const dropdown = document.querySelector(".dropdown");
            const menu = document.getElementById("userDropdown");
            const arrow = document.querySelector(".dropdown-arrow");

            if (!dropdown.contains(event.target) && menu.classList.contains("show")) {
                menu.classList.remove("show");
                arrow.classList.remove("rotate");
            }
        });

        // ================= Responsive Sidebar Logic =================
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('sidebarToggle');
        const backdrop = document.getElementById('sidebarBackdrop');

        function openSidebar() {
            sidebar.classList.add('open');
            backdrop.classList.remove('hidden');
            // Save sidebar state to localStorage
            localStorage.setItem('sidebarState', 'open');
        }

        function closeSidebar() {
            sidebar.classList.remove('open');
            backdrop.classList.add('hidden');
            // Save sidebar state to localStorage
            localStorage.setItem('sidebarState', 'closed');
        }

        // Toggle button event
        toggleButton.addEventListener('click', openSidebar);

        // Close sidebar when clicking backdrop on mobile
        backdrop.addEventListener('click', closeSidebar);

        // Close sidebar when clicking any sidebar link on mobile/tablet (to mimic navigation)
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 1024) { // Only on small screens
                    closeSidebar();
                }
            });
        });

        // Restore sidebar and submenu states on page load
        window.addEventListener('load', () => {
            // Restore sidebar state
            const sidebarState = localStorage.getItem('sidebarState');

            if (window.innerWidth < 1024) {
                // On mobile: respect saved state or default to closed
                if (sidebarState === 'open') {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            }

            // Restore submenu states
            document.querySelectorAll('[id$="Menu"]').forEach(submenu => {
                const menuId = submenu.id;
                const savedState = localStorage.getItem('submenu_' + menuId);

                if (savedState === 'open') {
                    submenu.classList.add('open');
                    // Find and rotate the arrow
                    const button = submenu.previousElementSibling;
                    if (button) {
                        const arrow = button.querySelector('.submenu-arrow');
                        if (arrow) {
                            arrow.classList.add('rotated');
                        }
                    }
                }
            });
        });

        // Close sidebar when resizing from small to large (optional: prevents visual glitch)
        let isLargeScreen = window.innerWidth >= 1024;
        window.addEventListener('resize', () => {
            const currentlyLarge = window.innerWidth >= 1024;
            if (currentlyLarge && !isLargeScreen) {
                // If transitioning from small to large
                sidebar.classList.remove('open');
                backdrop.classList.add('hidden');
            }
            isLargeScreen = currentlyLarge;
        });

    </script>

</body>
</html>
