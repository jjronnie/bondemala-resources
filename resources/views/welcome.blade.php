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

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-slide-up {
            animation: slide-up 0.8s ease-out forwards;
        }

        .animate-scale-in {
            animation: scale-in 0.5s ease-out forwards;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
        }

        .text-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        .document-icon {
            transition: transform 0.3s ease;
        }

        .card-hover:hover .document-icon {
            transform: scale(1.1);
        }

        /* Utility for x-cloak */
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50">
    <header class="glass-effect border-b border-gray-200/50 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <div class="flex items-center space-x-4">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="transition-transform hover:scale-105">
                            <x-application-logo class="block h-8 lg:h-10 w-auto fill-current text-indigo-600" />
                        </a>
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-lg lg:text-xl font-bold text-gray-900 leading-tight">
                            <span class="block sm:hidden lg:block">Bondemala Investment SMC Limited</span>
                            <span class="hidden sm:block lg:hidden">Bondemala</span>
                            <span class="text-sm lg:text-base font-medium text-gray-600 block">Gather To Grow</span>
                        </h1>
                    </div>
                </div>

                @if (Route::has('login'))
                    <div class="flex items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-medium text-sm text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out shadow-sm">
                                Log in
                            </a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <section class="hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24">
            <div class="text-center animate-fade-in">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4 leading-tight">
                    Welcome to Our
                    <span class="block text-yellow-300">Resources Repository</span>
                </h2>
                <p class="text-lg sm:text-xl text-blue-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Access and download important company documents here. 
                </p>
                {{-- <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a class="inline-flex items-center px-6 py-3 bg-white text-indigo-600 rounded-lg font-semibold text-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-indigo-600 transition duration-150 ease-in-out shadow-lg" 
                        href="http://bondemalainvestmentsmc.com?utm_source=bisl_resources_home" 
                        target="_blank">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        Visit Our Website
                    </a>
                    
                </div> --}}
            </div>
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
                <div class="absolute -top-40 -right-32 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-40 -left-32 w-96 h-96 bg-yellow-400/10 rounded-full blur-3xl"></div>
            </div>
        </div>
    </section>

    <main class="py-12 lg:py-20" x-data="{
        search: '',
        // Documents must be JSON encoded here. Make sure $documents is an Eloquent Collection or array.
        documents: @js($documents->toArray()),
        get filteredDocuments() {
            if (this.search === '') {
                return this.documents;
            }
            const lowerCaseSearch = this.search.toLowerCase();
            return this.documents.filter(doc => 
                doc.title.toLowerCase().includes(lowerCaseSearch)
            );
        }
    }" x-cloak> <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-12 animate-slide-up">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-4">
                    Available Documents
                </h3>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                    Browse and download our collection of important company documents and resources.
                </p>
                
                <div class="max-w-xl mx-auto">
                    <label for="search" class="sr-only">Search Documents</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input x-model="search" type="search" id="search" placeholder="Search by document title..." 
                               class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm shadow-sm transition duration-150 ease-in-out">
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8" x-show="filteredDocuments.length > 0" x-transition.opacity>
                
                <template x-for="(document, index) in filteredDocuments" :key="document.id">
                    
                    <div x-data="{ 
                        filePath: document.file_path,
                        get extension() {
                            return this.filePath.split('.').pop().toLowerCase();
                        },
                        get iconData() {
                            if (['pdf'].includes(this.extension)) {
                                return { text: 'text-red-500', bg: 'bg-red-50', svg: '<div class=\'text-center\'><div class=\'text-4xl font-black text-red-500 mb-1\'>PDF</div><div class=\'text-xs text-red-400 font-medium\'>Document</div></div>' };
                            } else if (['doc', 'docx'].includes(this.extension)) {
                                return { text: 'text-blue-500', bg: 'bg-blue-50', svg: '<div class=\'text-center\'><div class=\'text-4xl font-black text-blue-500 mb-1\'>DOC</div><div class=\'text-xs text-blue-400 font-medium\'>Word Document</div></div>' };
                            } else if (['xls', 'xlsx'].includes(this.extension)) {
                                return { text: 'text-green-500', bg: 'bg-green-50', svg: '<div class=\'text-center\'><div class=\'text-4xl font-black text-green-500 mb-1\'>XLS</div><div class=\'text-xs text-green-400 font-medium\'>Excel Sheet</div></div>' };
                            } else {
                                // Default icon
                                return { text: 'text-gray-400', bg: 'bg-gray-50', svg: '<svg class=\'w-12 h-12 mx-auto\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'></path></svg>' };
                            }
                        },
                        get formattedDate() {
                            // Simple formatting as Alpine.js doesn't have Laravel's Carbon
                            return new Date(document.created_at).toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                        }
                    }" 
                    class="bg-white rounded-2xl shadow-sm border border-gray-200/50 card-hover animate-scale-in overflow-hidden" 
                    :style="`animation-delay: ${index * 100}ms`">
                        
                        <div class="h-32 sm:h-40 flex items-center justify-center border-b border-gray-100 document-icon"
                             :class="iconData.bg">
                            <div :class="iconData.text" x-html="iconData.svg">
                                </div>
                        </div>

                        <div class="p-4 lg:p-6">
                            <div class="mb-4">
                                <h4 class="text-base lg:text-lg font-semibold text-gray-900 line-clamp-2 mb-2" :title="document.title" x-text="document.title">
                                    </h4>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m0 0V7a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V9a2 2 0 012-2v0"></path>
                                    </svg>
                                    <span x-text="formattedDate"></span>
                                </div>
                            </div>
                            
                            <a :href="'{{ url('documents/download') }}/' + document.id" 
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-indigo-600 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-wide hover:bg-indigo-700 active:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 group">
                                <svg class="w-4 h-4 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span x-text="'Download ' + extension.toUpperCase()"></span>
                            </a>
                        </div>
                    </div>
                </template>
            </div>
            
            <div x-show="filteredDocuments.length === 0" x-transition.opacity
                 class="text-center mt-12 animate-fade-in">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200/50 p-8 lg:p-12 max-w-md mx-auto">
                    <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2" x-text="search === '' ? 'No Documents Available' : 'No Documents Found'"></h3>
                    <p class="text-gray-600 mb-6">
                        <span x-show="search !== ''">No documents match your search for "<span x-text="search" class="font-medium text-indigo-600"></span>". Try adjusting your search terms.</span>
                        <span x-show="search === ''">No documents are currently published for public download. Please check back later.</span>
                    </p>
                    <button x-show="search !== ''" @click="search = ''" 
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        Clear Search
                    </button>
                    <a x-show="search === ''" href="http://bondemalainvestmentsmc.com?utm_source=bisl_resources_home" 
                        target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                        Visit Our Website
                    </a>
                </div>
            </div>
            
            </div>
    </main>

    <footer class="bg-gray-900 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="text-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} Bondemala Investment SMC Limited. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>