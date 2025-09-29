<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bondemala Resources</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- Preloader Overlay -->
    <div id="refreshPreloader" class="fixed inset-0 bg-white  flex items-center justify-center z-[9999] hidden">
        <div class="text-center">
            <!-- Spinner -->
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto mb-4"></div>
            <!-- Loading Text -->
            <p class="text-gray-600 text-sm font-medium">Loading...</p>
        </div>
    </div>



    <script>
        const preloader = document.getElementById('refreshPreloader');

    // Show preloader before unload
    window.addEventListener('beforeunload', () => {
        preloader.classList.remove('hidden');
    });

    // Hide preloader when coming back via history (back button, forward button)
    window.addEventListener('pageshow', (event) => {
        // If restored from bfcache (browser cache), hide preloader
        if (event.persisted) {
            preloader.classList.add('hidden');
        }
    });

    // Also handle popstate for SPA/PWA navigation
    window.addEventListener('popstate', () => {
        preloader.classList.add('hidden');
    });
    </script>




    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        @include('components.alerts')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>