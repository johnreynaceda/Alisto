<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/alisto-logo1.png') }}" />


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative bg-white">

    <div class="w-full  bg-white border-b ">
        <div class="2xl:max-w-7xl mx-auto">
            <div x-data="{ open: false }"
                class="relative flex flex-col w-full p-4 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between lg:justify-start">
                    <a class="text-lg tracking-tight text-black uppercase focus:outline-none focus:ring lg:text-2xl"
                        href="/">
                        <img src="{{ asset('images/alisto-logo.png') }}" class="h-14" alt="">
                    </a>
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-400 hover:text-black focus:outline-none focus:text-black md:hidden">
                        <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{ 'flex': open, 'hidden': !open }"
                    class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600 lg:ml-auto"
                        href="{{ route('provider.dashboard') }}">
                        Dashboard
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600"
                        href="{{ route('provider.services') }}">
                        Services
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600"
                        href="{{ route('provider.appointments') }}">
                        Appointments
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                        Profile
                    </a>

                    <div class="inline-flex items-center gap-3 list-none lg:ml-auto">
                        <livewire:provider.provider-notification />
                        <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" type="button"
                                    class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">
                                        Open user menu
                                    </span>
                                    <img class="object-cover w-10 h-10 rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                        alt="">
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" style="display: none"
                                class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    Your Profile
                                </a>

                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="user-menu-item-1">
                                    Settings
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="#"
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-500" role="menuitem" tabindex="-1"
                                        id="user-menu-item-2">
                                        Sign out
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="my-10 mb-40 mx-auto max-w-7xl">
        <div class="pb-5">
            <h1 class="text-2xl font-semibold uppercase text-main">@yield('title')</h1>
        </div>
        {{ $slot }}
    </div>
    <footer class="bg-main relative" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="px-5 py-12 mx-auto max-w-7xl lg:py-16 md:px-12 lg:px-20">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="xl:col-span-1">
                    <a href="/"
                        class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform text-black tracking-relaxed lg:pr-8">
                        <img src="{{ asset('images/alisto-logo.png') }}" class="h-16" alt="">
                    </a>
                    <p class="w-1/2 mt-2 text-sm text-gray-100">

                    </p>
                </div>
                <div class="grid grid-cols-2 gap-8 mt-12 xl:mt-0 xl:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="font-semibold leading-6 uppercase text-white">
                                Solutions
                            </h3>
                            <ul role="list" class="mt-4 space-y-3">
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Marketing
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Analytics
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Commerce
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Insights
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-0">
                            <h3 class="font-semibold leading-6 uppercase text-white">
                                Support
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Pricing
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Alpine.js
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        Guides
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm text-gray-100 hover:text-blue-600">
                                        API Status
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden lg:justify-end md:grid md:grid-cols-1">
                        <div class="w-full mt-12 md:mt-0">
                            <div class="mt-8 lg:justify-end xl:mt-0">
                                <h3 class="font-semibold leading-6 uppercase text-white">
                                    Subscribe to our newsletter
                                </h3>
                                <p class="mt-4 text-sm font-light text-gray-100 lg:ml-auto">
                                    The latest news, articles, and resources, sent to your inbox
                                    weekly.
                                </p>
                                <div class="inline-flex items-center gap-2 mt-12 list-none lg:ml-auto">
                                    <form class="flex flex-col items-center justify-center max-w-sm mx-auto"
                                        action="">
                                        <div class="flex flex-col w-full gap-1 mt-3 sm:flex-row">
                                            <input name="email" type="email"
                                                class="block w-full px-4 py-2 text-sm font-medium text-white placeholder-gray-400 bg-white border border-gray-300 rounded-full font-spline focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50 disabled:opacity-50"
                                                placeholder="Enter your email..." required=""><button
                                                type="button"
                                                class="items-center inline-flex  justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-black border-2 border-black rounded-full nline-flex hover:bg-transparent hover:border-black hover:text-black focus:outline-none lg:w-auto focus-visible:outline-black text-sm focus-visible:ring-black">
                                                <div style="position: relative"></div>
                                                Subscribe<!-- -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true" class="w-4 h-auto ml-2">
                                                    <path fill-rule="evenodd"
                                                        d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-5 py-6 mx-auto border-t max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-20">
            <div class="flex justify-center mb-8 space-x-6 md:order-last md:mb-0">
                <span class="inline-flex justify-center w-full gap-3 lg:ml-auto md:justify-start md:w-auto">
                    <a class="w-6 h-6 transition fill-black hover:text-blue-500">
                        <span class="sr-only"> github</span>
                        <ion-icon class="w-5 h-5 md hydrated" name="logo-github" role="img"
                            aria-label="logo github"></ion-icon>

                    </a>
                    <a class="w-6 h-6 transition fill-black hover:text-blue-500">
                        <span class="sr-only"> twitter</span>
                        <ion-icon class="w-5 h-5 md hydrated" name="logo-twitter" role="img"
                            aria-label="logo twitter"></ion-icon>
                    </a>
                    <a class="w-6 h-6 transition fill-black hover:text-blue-500">
                        <span class="sr-only">Instagram</span>
                        <ion-icon class="w-5 h-5 md hydrated" name="logo-instagram" role="img"
                            aria-label="logo instagram"></ion-icon>
                    </a>
                    <a class="w-6 h-6 transition fill-black hover:text-blue-500">
                        <span class="sr-only">Linkedin</span>
                        <ion-icon class="w-5 h-5 md hydrated" name="logo-linkedin" role="img"
                            aria-label="logo linkedin"></ion-icon>
                    </a>
                </span>
            </div>
            <div class="mt-8 md:mt-0 md:order-1">
                <span class="mt-2 text-sm font-light text-gray-100">
                    Copyright © 2023
                    <a href="#" class="mx-2 text-wickedblue hover:text-gray-500"
                        rel="noopener noreferrer">@ALISTO</a>. Since 2023
                </span>
            </div>
        </div>
    </footer>
</body>

</html>
