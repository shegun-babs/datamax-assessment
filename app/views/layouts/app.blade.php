<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>{{ $page_title ?? "Books Record" }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
    @stack('head')
    @livewireStyles

</head>

<body>

<div>
    <nav class="bg-blue-600" x-data="{open: false}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <x-icons.beaker class="w-6 h-6 text-blue-200 transform rotate-12" />
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <a href="/" class="bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium"
                               aria-current="page">Home</a>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block">
                </div>
                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button" @click="open = !open"
                            class="bg-blue-600 inline-flex items-center justify-center p-2 rounded-md text-blue-200 hover:text-white hover:bg-blue-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-600 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu" x-show="open">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="/" class="bg-blue-700 text-white block px-3 py-2 rounded-md text-base font-medium"
                   aria-current="page">Dashboard</a>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg leading-6 font-semibold text-gray-900">
                {{ !empty($page_title) ? ucfirst($page_title) : "Books Record" }}
            </h1>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <livewire:flash-container />
            {{ $slot }}
        </div>
    </main>
</div>
@livewireScripts
<script src="{{ mix('/js/app.js') }}" defer></script>
@stack('scripts')
</body>
</html>

