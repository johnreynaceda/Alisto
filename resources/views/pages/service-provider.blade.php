<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/alisto-logo.jpg') }}" />


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

<body class="font-sans antialiased relative bg-white">

    <div class="">
        <div class="w-full  bg-white z-10 sticky top-0 border-b ">
            <div class="mx-auto 2xl:max-w-7xl ">
                <div x-data="{ open: false }"
                    class="relative flex flex-col w-full p-5 mx-auto bg-white md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
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
                                    d="M4 6h16M4 12h16M4 18h16">
                                </path>
                                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <nav :class="{ 'flex': open, 'hidden': !open }"
                        class="flex-col items-center flex-grow hidden md:pb-0 md:flex md:justify-end md:flex-row">



                        <div class="inline-flex items-center gap-2 list-none lg:ml-auto">
                            <a class="px-2 py-2 font-medium text-gray-500 lg:px-6 md:px-3 hover:text-main"
                                href="#">
                                Locations
                            </a>
                            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="flex flex-row items-center w-full px-4 py-2 mt-2 font-medium text-left text-gray-500 md:w-auto md:inline md:mt-0 hover:text-main focus:outline-none focus:shadow-outline">
                                    <span>
                                        Services
                                    </span>
                                    <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 rotate-0">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-10 w-screen max-w-3xl px-2 mt-3 transform -translate-x-1/2 left-1/3 sm:px-0"
                                    style="display: none;">
                                    <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                        <div class="relative grid gap-6 px-5 py-6 bg-white sm:gap-8 sm:p-8">
                                            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                                                <div class="grid grid-cols-1 gap-8">
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="search-outline" role="img"
                                                                aria-label="search outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Explore design work
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Trending designs to inspire you
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="book-outline" role="img"
                                                                aria-label="book outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Blog
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Interviews, tutorials and more
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="lock-closed-outline" role="img"
                                                                aria-label="lock closed outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Secure
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Interviews, tutorials and more
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="people-outline" role="img"
                                                                aria-label="people outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Users
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Trending designs to inspire you
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="people-outline" role="img"
                                                                aria-label="people outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Users
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Trending designs to inspire you
                                                            </p>
                                                        </div>
                                                    </a>
                                                    <a href="#"
                                                        class="inline-flex items-start p-3 -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-50">
                                                        <div class="">
                                                            <ion-icon class="w-6 h-6 text-blue-500 md hydrated"
                                                                name="people-outline" role="img"
                                                                aria-label="people outline"></ion-icon>
                                                        </div>
                                                        <div class="ml-4">
                                                            <p class="text-base font-medium text-black">
                                                                Users
                                                            </p>
                                                            <p class="mt-1 text-sm text-gray-100">
                                                                Trending designs to inspire you
                                                            </p>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="grid grid-cols-1 gap-3 p-2 lg:p-0 bg-gray-50 rounded-2xl">
                                                    <div
                                                        class="grid items-start h-full gap-6 px-5 py-6 sm:gap-8 sm:p-8">
                                                        <h3 class="text-base font-medium text-blue-400">
                                                            Getting started
                                                        </h3>
                                                        <div class="space-y-2">
                                                            <a href="#"
                                                                class="flex items-start text-sm font-medium transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Explore design work
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Register
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Adding users
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Video Tutorials
                                                            </a>
                                                            <a href="#"
                                                                class="flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Libraries and SDKs
                                                            </a>
                                                            <a href="#"
                                                                class="inline-flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Adding Plugins
                                                            </a>
                                                            <a href="#"
                                                                class="inline-flex items-start text-sm text-gray-100 transition duration-150 ease-in-out rounded-lg hover:text-blue-500">
                                                                Dashboard templates
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('signin') }}"
                                class="block px-4 py-2 mt-2 font-medium text-gray-500 md:mt-0 hover:text-main focus:outline-none focus:shadow-outline">
                                Sign In
                            </a>
                            <a href="{{ route('service-provider') }}"
                                class="inline-flex items-center justify-center px-4 py-2  font-semibold text-main hover:text-white bg-transparent border-main border-2 rounded-md group focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 hover:bg-main active:bg-main active:text-white focus-visible:outline-black">
                                Become a Service Provider
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>




        <section>
            <div class="relative items-center w-full px-5 py-24 mx-auto md:px-12 lg:px-16 max-w-7xl">
                <div class="w-full mx-auto text-left">
                    <div class="relative flex-col items-center m-auto align-middle">
                        <div class="items-center gap-12 text-left lg:gap-24 lg:inline-flex">
                            <div class="flex flex-col m-auto md:order-first">
                                <div class="max-w-xl">
                                    <div>
                                        <p class="text-2xl font-medium tracking-tight text-black sm:text-4xl">
                                            Became a Service Provider
                                        </p>
                                    </div>
                                </div>
                                <livewire:become-provider />
                            </div>
                            <div class="order-first block w-full mt-12 aspect-square lg:mt-0">
                                <img class="object-cover object-center w-full mx-auto bg-gray-300 border lg:ml-auto"
                                    alt="hero"
                                    src="https://images.unsplash.com/photo-1598257006303-031250badbdc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <footer class="bg-main relative" aria-labelledby="footer-heading">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="px-5 py-12 mx-auto max-w-7xl lg:py-16 md:px-12 lg:px-20">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="xl:col-span-1">
                        <a href="/"
                            class="text-lg font-bold tracking-tighter transition duration-500 ease-in-out transform text-black tracking-relaxed lg:pr-8">
                            <img src="{{ asset('images/alisto-logo.png') }}" alt="">
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
                                                        fill="currentColor" aria-hidden="true"
                                                        class="w-4 h-auto ml-2">
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
            <div
                class="px-5 py-6 mx-auto border-t max-w-7xl sm:px-6 md:flex md:items-center md:justify-between lg:px-20">
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
        <div>

        </div>
    </div>










</body>

</html>
