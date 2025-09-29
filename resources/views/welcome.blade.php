<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
<body class="antialiased">
    <div class="relative min-h-screen bg-gray-100 selection:bg-indigo-500 selection:text-white">
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex">

                     <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <div class="">
                <h1 class=" font-bold text-gray-900">Bondemala Investment - SMC Limited </h1>

                </div>
                </div>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">Log in</a>
                       
                        @endauth
                    </div>
                @endif
            </div>
        </header>

        <main>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <p class="text-center">Welcome to Bondemala Investment SMC Limited - Resources Repository</p>
                
                <h3 class="text-lg text-center font-bold mb-6 text-gray-900">Access and download important company documents here.
You can also <a class="text-green-600 underline" href="http://bondemalainvestmentsmc.com?utm_source=bisl_resources_home" target="_blank">
    visit our website
</a>
 for more information.</h3>

                @forelse ($documents as $document)
                    {{-- 
                        We need to access the file extension to conditionally show an icon 
                        (assuming the file_path is something like 'documents/unique-name.pdf')
                    --}}
                    @php
                        $filePath = $document->file_path;
                        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
                        
                        // Map extension to a color and icon (using heroicns for simplicity)
                        $iconClass = 'text-gray-400';
                        $iconSvg = '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'; // Generic File Icon

                        if (in_array($extension, ['pdf'])) {
                            $iconClass = 'text-red-500';
                            $iconSvg = '<svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 14h-2v-4H9V8h6v2h-2v4z"/></svg>'; // Simplified PDF icon (needs a custom SVG for PDF)
                            // A better approach would be:
                            $iconSvg = '<span class="text-4xl font-black text-red-600">PDF</span>';
                        } elseif (in_array($extension, ['doc', 'docx'])) {
                            $iconClass = 'text-blue-500';
                            $iconSvg = '<span class="text-4xl font-black text-blue-600">W</span>'; // Word Icon Placeholder
                        } elseif (in_array($extension, ['xls', 'xlsx'])) {
                            $iconClass = 'text-green-500';
                            $iconSvg = '<span class="text-4xl font-black text-green-600">X</span>'; // Excel Icon Placeholder
                        }
                    @endphp

                    @if ($loop->first)
                        {{-- Start the grid container on the first iteration --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @endif
                    
                    {{-- Document Card --}}
                    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex flex-col overflow-hidden">
                        
                        {{-- Placeholder for Document Preview/Icon --}}
                        <div class="h-40 bg-gray-50 flex items-center justify-center border-b p-4 {{ $iconClass }}">
                            {!! $iconSvg !!}
                        </div>

                        {{-- Document Details and Action --}}
                        <div class="p-4 flex flex-col justify-between flex-grow">
                            <div class="mb-3">
                                <h4 class="text-base font-semibold text-gray-800 line-clamp-2" title="{{ $document->title }}">
                                    {{ $document->title }}
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">
                                    Uploaded: {{ $document->created_at->format('M d, Y') }} 
                                </p>
                            </div>
                            
                            <a href="{{ route('document.download', $document) }}" class="flex items-center justify-center px-3 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Download ({{ strtoupper($extension) }})
                            </a>
                        </div>
                    </div>

                    @if ($loop->last)
                        {{-- End the grid container on the last iteration --}}
                        </div>
                    @endif

                @empty
                    <div class="bg-white shadow sm:rounded-lg">
                        <div class="p-6 text-center">
                            <p class="text-gray-500">No documents are currently published for public download.</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </main>
    </div>
</body>
</html>