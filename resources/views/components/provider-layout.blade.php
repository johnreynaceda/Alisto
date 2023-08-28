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
                        <img src="{{ asset('images/alisto-logo.jpg') }}" alt="">
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
                        href="#">
                        Dashboard
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600"
                        href="{{ route('provider.services') }}">
                        Services
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                        Appointments
                    </a>
                    <a class="px-2 py-2 text-sm text-gray-500 lg:px-6 md:px-3 hover:text-blue-600" href="#">
                        Profile
                    </a>

                    <div class="inline-flex items-center gap-3 list-none lg:ml-auto">
                        <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" type="button relative"
                                    class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">
                                        Open user menu
                                    </span>
                                    {{-- <img class="object-cover w-10 h-10 rounded-full"
                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                        alt=""> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-7 h-7 fill-main ">
                                        <path
                                            d="M20 17H22V19H2V17H4V10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10V17ZM9 21H15V23H9V21Z">
                                        </path>
                                    </svg>

                                    <div class="absolute -top-2 -right-4 ">
                                        <span
                                            class="text-xs font-medium bg-red-500 p-0.5 text-white px-2 rounded-full">1</span>
                                    </div>
                                </button>
                            </div>

                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95" style="display: none"
                                class="absolute right-0 z-10 w-96 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <div class="p-2 px-4">
                                    <div class="flex justify-between items-center">
                                        <h1 class="text-gray-800">Notification</h1>
                                        <button class="text-sm">
                                            Mark as Read
                                        </button>
                                    </div>
                                    <ul class="mt-3 space-y-2">
                                        <li
                                            class="flex hover:bg-gray-100 p-1 rounded-lg cursor-pointer border-b py-2 justify-between items-center">
                                            <div class="flex items-start justify-start space-x-2">
                                                <div class="bg-main mt-2 h-2 w-2 rounded-full"></div>
                                                <div>
                                                    <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                                                    <span class="text-xs text-gray-500">August 27, 2023 At 02:30
                                                        PM</span>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="" class="h-8 w-8 bg-blue-500 rounded-full"
                                                    alt="">
                                            </div>
                                        </li>
                                        <li
                                            class="flex hover:bg-gray-100 p-1 rounded-lg cursor-pointer border-b py-2 justify-between items-center">
                                            <div class="flex items-start justify-start space-x-2">
                                                <div class="bg-main mt-2 h-2 w-2 rounded-full"></div>
                                                <div>
                                                    <p class="text-sm">Lorem ipsum dolor sit amet.</p>
                                                    <span class="text-xs text-gray-500">August 27, 2023 At 02:30
                                                        PM</span>
                                                </div>
                                            </div>
                                            <div>
                                                <img src="" class="h-8 w-8 bg-blue-500 rounded-full"
                                                    alt="">
                                            </div>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                        </div>
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

                                <a href="#" class="block px-4 py-2 text-sm text-gray-500" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">
                                    Sign out
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="mt-10 mx-auto max-w-7xl">
        <div class="pb-5">
            <h1 class="text-2xl font-semibold uppercase text-main">@yield('title')</h1>
        </div>
        {{ $slot }}
    </div>
</body>

</html>
