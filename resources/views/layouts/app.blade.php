<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CEPIRD - Center for Entrepreneurial Policy & Innovation')</title>

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <!-- Configure Tailwind Colors for the theme -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-900': '#1e3a8a', /* Deep Blue */
                        'teal-500': '#14b8a6', /* Teal Accent */
                        'amber-400': '#fbbf24', /* Amber Accent */
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    @stack('styles')
</head>
<body class="font-sans text-slate-800 antialiased bg-white selection:bg-teal-100 selection:text-teal-900">

    @include('partials.header')

    @yield('content')

    @include('partials.footer')

    <!-- Custom JavaScript -->
    <script src="{{ asset('js/landing.js') }}"></script>

    @stack('scripts')
</body>
</html>
