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

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts
    @stack('scripts')
</head>

<body class="font-sans antialiased relative bg-gray-100">

    <div class="flex h-screen overflow-hidden bg-gray-200">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-white border-r">
                    <div class="flex flex-col flex-shrink-0 px-4">
                        <a class="text-lg font-semibold tracking-tighter text-black focus:outline-none focus:ring "
                            href="/">
                            <img src="{{ asset('images/alisto-logo.png') }}" class="h-9" alt="">
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow mt-5">
                        <nav class="flex-1 px-2 bg-white">
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2ZM12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4ZM12 5C13.018 5 13.9852 5.21731 14.8579 5.60806L13.2954 7.16944C12.8822 7.05892 12.448 7 12 7C9.23858 7 7 9.23858 7 12C7 13.3807 7.55964 14.6307 8.46447 15.5355L7.05025 16.9497L6.89445 16.7889C5.71957 15.5368 5 13.8525 5 12C5 8.13401 8.13401 5 12 5ZM18.3924 9.14312C18.7829 10.0155 19 10.9824 19 12C19 13.933 18.2165 15.683 16.9497 16.9497L15.5355 15.5355C16.4404 14.6307 17 13.3807 17 12C17 11.552 16.9411 11.1178 16.8306 10.7046L18.3924 9.14312ZM16.2426 6.34315L17.6569 7.75736L13.9325 11.483C13.9765 11.6479 14 11.8212 14 12C14 13.1046 13.1046 14 12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C12.1788 10 12.3521 10.0235 12.517 10.0675L16.2426 6.34315Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Dashboard
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.service-providers') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.service-providers') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M15 4H5V20H19V8H15V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H16L20.9997 7L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM12 11.5C10.6193 11.5 9.5 10.3807 9.5 9C9.5 7.61929 10.6193 6.5 12 6.5C13.3807 6.5 14.5 7.61929 14.5 9C14.5 10.3807 13.3807 11.5 12 11.5ZM7.52746 17C7.77619 14.75 9.68372 13 12 13C14.3163 13 16.2238 14.75 16.4725 17H7.52746Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Service Providers
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.clients') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.clients') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M12 14V16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM20.8284 21.0711L18 24L15.1716 21.0711C13.6095 19.4535 13.6095 16.8308 15.1716 15.2132C16.7337 13.5956 19.2663 13.5956 20.8284 15.2132C22.3905 16.8308 22.3905 19.4535 20.8284 21.0711ZM19.3897 19.6818C20.2034 18.8392 20.2034 17.4451 19.3897 16.6025C18.614 15.7992 17.386 15.7992 16.6103 16.6025C15.7966 17.4451 15.7966 18.8392 16.6103 19.6818L18 21.1209L19.3897 19.6818Z">
                                            </path>
                                        </svg>
                                        <span class="ml-3">
                                            Clients
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div>
                            <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                Settings
                            </p>
                            <ul>
                                <li>
                                    <a class="{{ request()->routeIs('admin.accounts') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.accounts') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M12 14V16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM14.5946 18.8115C14.5327 18.5511 14.5 18.2794 14.5 18C14.5 17.7207 14.5327 17.449 14.5945 17.1886L13.6029 16.6161L14.6029 14.884L15.5952 15.4569C15.9883 15.0851 16.4676 14.8034 17 14.6449V13.5H19V14.6449C19.5324 14.8034 20.0116 15.0851 20.4047 15.4569L21.3971 14.8839L22.3972 16.616L21.4055 17.1885C21.4673 17.449 21.5 17.7207 21.5 18C21.5 18.2793 21.4673 18.551 21.4055 18.8114L22.3972 19.3839L21.3972 21.116L20.4048 20.543C20.0117 20.9149 19.5325 21.1966 19.0001 21.355V22.5H17.0001V21.3551C16.4677 21.1967 15.9884 20.915 15.5953 20.5431L14.603 21.1161L13.6029 19.384L14.5946 18.8115ZM18 19.5C18.8284 19.5 19.5 18.8284 19.5 18C19.5 17.1716 18.8284 16.5 18 16.5C17.1716 16.5 16.5 17.1716 16.5 18C16.5 18.8284 17.1716 19.5 18 19.5Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Accounts
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.category') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }}  inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.category') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Services Category
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('admin.location') ? 'bg-gray-200 in ease-in-out transfom scale-95' : '' }} inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="{{ route('admin.location') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M11 17.9381C7.05369 17.446 4 14.0796 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 14.0796 16.9463 17.446 13 17.9381V20.0116C16.9463 20.1039 20 20.7351 20 21.5C20 22.3284 16.4183 23 12 23C7.58172 23 4 22.3284 4 21.5C4 20.7351 7.05369 20.1039 11 20.0116V17.9381ZM12 16C15.3137 16 18 13.3137 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 13.3137 8.68629 16 12 16ZM12 12C10.8954 12 10 11.1046 10 10C10 8.89543 10.8954 8 12 8C13.1046 8 14 8.89543 14 10C14 11.1046 13.1046 12 12 12Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Locations
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-main fill-main transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-main hover:fill-main"
                                        href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-5 h-5 md hydrated">
                                            <path
                                                d="M15 5.25C16.7949 5.25 18.25 3.79493 18.25 2H19.75C19.75 3.79493 21.2051 5.25 23 5.25V6.75C21.2051 6.75 19.75 8.20507 19.75 10H18.25C18.25 8.20507 16.7949 6.75 15 6.75V5.25ZM4 7C4 5.89543 4.89543 5 6 5H13V3H6C3.79086 3 2 4.79086 2 7V17C2 19.2091 3.79086 21 6 21H18C20.2091 21 22 19.2091 22 17V12H20V17C20 18.1046 19.1046 19 18 19H6C4.89543 19 4 18.1046 4 17V7Z">
                                            </path>
                                        </svg>
                                        <span class="ml-4">
                                            Ratings & Feedbacks
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2">
                                <div
                                    class="flex flex-col items-start p-3 transition duration-150 ease-in-out bg-main bg-opacity-50 rounded-lg">
                                    <div>
                                        <img class="inline-block rounded-full h-9 object-cover w-9"
                                            src="{{ asset('images/alisto-logo.png') }}" alt="">
                                    </div>
                                    <div>
                                        <p class="mt-2 text-base font-medium text-black">
                                            ALISTO
                                        </p>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">
                                        Alisto is a web application that helps you to manage your business
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-shrink-0 p-4 px-4 bg-gray-50">
                        <div @click.away="open = false" class="relative inline-flex items-center w-full"
                            x-data="{ open: false }">
                            <button @click="open = !open"
                                class="inline-flex items-center justify-between w-full px-4 py-3 text-lg font-medium text-center text-white transition duration-500 ease-in-out transform rounded-xl hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span>
                                    <span class="flex-shrink-0 block group">
                                        <div class="flex items-center">
                                            <div>
                                                <img class="inline-block object-cover rounded-full h-9 w-9"
                                                    src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                                                    alt="">
                                            </div>
                                            <div class="ml-3 text-left">
                                                <p class="text-sm font-medium text-gray-500 group-hover:text-blue-500">
                                                    {{ auth()->user()->name }}
                                                </p>
                                                <p class="text-xs font-medium text-gray-500 group-hover:text-blue-500">
                                                    {{ auth()->user()->user_type }}
                                                </p>
                                            </div>
                                        </div>
                                    </span>
                                </span>
                                <svg :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="inline w-5 h-5 ml-4 text-black transition-transform duration-200 transform rotate-0"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute bottom-0 z-50 w-full mx-auto mt-2 origin-bottom-right bg-white rounded-xl"
                                style="display: none">
                                <div class="px-2 py-2 bg-white rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                    <ul>
                                        <li>
                                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500"
                                                href="#">
                                                <ion-icon class="w-4 h-4 md hydrated" name="body-outline"
                                                    role="img" aria-label="body outline"></ion-icon>
                                                <span class="ml-4">
                                                    Account
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 fill-gray-700 hover:text-red-500 hover:fill-red-500"
                                                    href="#"
                                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="h-4 w-4 rotate-90 ">
                                                        <path
                                                            d="M5 11H13V13H5V16L0 12L5 8V11ZM3.99927 18H6.70835C8.11862 19.2447 9.97111 20 12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C9.97111 4 8.11862 4.75527 6.70835 6H3.99927C5.82368 3.57111 8.72836 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C8.72836 22 5.82368 20.4289 3.99927 18Z">
                                                        </path>
                                                    </svg>
                                                    <span class="ml-4">
                                                        Logout
                                                    </span>
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="px-4 mx-auto  sm:px-6 md:px-8">
                        <!-- === Remove and replace with your own content... === -->
                        <div class="py-4">
                            <div class="header">
                                <h1 class="text-2xl font-medium text-gray-700">Good Morning
                                    {{ auth()->user()->name }}!
                                </h1>
                                <span class="text-gray-600 mt-3">@yield('title')</span>
                            </div>
                            <div class="mt-10">
                                {{ $slot }}
                            </div>
                        </div>
                        <!-- === End ===  -->
                    </div>
                </div>
            </main>
        </div>
    </div>

    @livewire('notifications')
</body>

</html>
