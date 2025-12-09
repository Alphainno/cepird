<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - CEPIRD')</title>

    <!-- Favicon -->
    @php
        $headerSetting = \App\Models\HeaderSetting::where('is_active', true)->first();
    @endphp
    @if($headerSetting && $headerSetting->logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/' . $headerSetting->logo) }}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . $headerSetting->logo) }}">
    @endif

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

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

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

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed top-4 right-4 z-50 space-y-2"></div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <!-- Session Messages Toast -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                showToast("{{ session('success') }}", 'success');
            @endif
            @if(session('error'))
                showToast("{{ session('error') }}", 'error');
            @endif
            @if(session('warning'))
                showToast("{{ session('warning') }}", 'warning');
            @endif
            @if(session('info'))
                showToast("{{ session('info') }}", 'info');
            @endif
        });
    </script>

    @stack('scripts')
</body>
</html>
