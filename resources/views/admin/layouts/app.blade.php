<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - CEPIRD')</title>

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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @stack('styles')
</head>

<body class="bg-gray-50 font-sans antialiased">

    <!-- === Main Wrapper === -->
    <div class="flex min-h-screen">

        @include('admin.partials.sidebar')

        <!-- ================= MAIN CONTENT ================= -->
        <div class="flex-1 overflow-x-hidden">

            @include('admin.partials.header')

            <!-- ================= CONTENT ================= -->
            <main class="p-4 md:p-8">
                @yield('content')
            </main>

        </div>
    </div>
    
    <!-- Sidebar Backdrop for mobile -->
    <div id="sidebarBackdrop" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/admin.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
