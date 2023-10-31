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
                            <div @click.away="data = false" class="relative" x-data="{ data: false }">
                                <a href="{{ route('location') }}"
                                    class="flex flex-row items-center w-full px-4 py-2 mt-2 font-medium text-left text-gray-500 md:w-auto md:inline md:mt-0 hover:text-main focus:outline-none focus:shadow-outline">
                                    <span>
                                        Locations
                                    </span>
                                    {{-- <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 rotate-0">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> --}}
                                </a>
                                {{-- <div x-show="data" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-10 w-screen max-w-3xl px-2 mt-3 transform -translate-x-1/2 left-1/3 sm:px-0"
                                    style="display: none;">
                                    <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                        <div class="relative grid gap-6  py-6 bg-white bg-opacity-90 sm:gap-8 sm:p-8">
                                            <div class="">
                                                <div class="grid grid-cols-3 gap-8">
                                                    @foreach (\App\Models\Location::get() as $item)
                                                        <a href="{{ route('login') }}"
                                                            class="inline-flex items-start p-3 border hover:shadow hover:shadow-main group -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-100">
                                                            <div class="ml-4 flex w-full justify-between items-center">
                                                                <div class="flex items-center space-x-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-5 w-5 fill-red-500"
                                                                        viewBox="0 0 24 24">
                                                                        <path
                                                                            d="M2 5L9 2L15 5L21.303 2.2987C21.5569 2.18992 21.8508 2.30749 21.9596 2.56131C21.9862 2.62355 22 2.69056 22 2.75827V19L15 22L9 19L2.69696 21.7013C2.44314 21.8101 2.14921 21.6925 2.04043 21.4387C2.01375 21.3765 2 21.3094 2 21.2417V5ZM15 19.7639V7.17594L14.9352 7.20369L9 4.23607V16.8241L9.06476 16.7963L15 19.7639Z">
                                                                        </path>
                                                                    </svg>
                                                                    <p class="text-base font-medium text-gray-700">
                                                                        {{ $item->location }}
                                                                    </p>
                                                                </div>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24"
                                                                    class="h-5 w-5 fill-transparent group-hover:fill-main">
                                                                    <path
                                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <div @click.away="data = false" class="relative" x-data="{ data: false }">
                                <a href="{{ route('services') }}"
                                    class="flex flex-row items-center w-full px-4 py-2 mt-2 font-medium text-left text-gray-500 md:w-auto md:inline md:mt-0 hover:text-main focus:outline-none focus:shadow-outline">
                                    <span>
                                        Services
                                    </span>
                                    {{-- <svg fill="currentColor" viewBox="0 0 20 20"
                                        :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1 rotate-0">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg> --}}
                                </a>
                                {{-- <div x-show="data" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="absolute z-10 w-screen max-w-3xl px-2 mt-3 transform -translate-x-1/2 left-1/3 sm:px-0"
                                    style="display: none;">
                                    <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                                        <div class="relative grid gap-6  py-6 bg-white bg-opacity-90 sm:gap-8 sm:p-8">
                                            <div class="">
                                                <div class="grid grid-cols-3 gap-8">
                                                    @foreach (\App\Models\ServiceCategory::get() as $item)
                                                        <a href="{{ route('login') }}"
                                                            class="inline-flex items-start p-3 border hover:shadow hover:shadow-main group -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-100">
                                                            <div class="ml-4 flex w-full justify-between items-center">
                                                                <p class="text-base font-medium text-gray-700">
                                                                    {{ $item->name }}
                                                                </p>
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24"
                                                                    class="h-5 w-5 fill-transparent group-hover:fill-main">
                                                                    <path
                                                                        d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                        </a>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
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


        <section class="mx-auto max-w-7xl py-20">
            <a href="/" class="flex space-x-1 items-center mb-5 fill-main text-main">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-7 w-7">
                    <path
                        d="M7.82843 10.9999H20V12.9999H7.82843L13.1924 18.3638L11.7782 19.778L4 11.9999L11.7782 4.22168L13.1924 5.63589L7.82843 10.9999Z">
                    </path>
                </svg>
                <span class="font-bold text-xl">BACK</span>
            </a>
            <h1 class="2xl:text-3xl text-xl  font-bold text-main">SERVICES</h1>
            <div class="grid grid-cols-3 mt-10 gap-8">
                @foreach (\App\Models\ServiceCategory::get() as $item)
                    <a href="{{ route('login') }}"
                        class="inline-flex items-start p-3 border hover:shadow hover:shadow-main group -m-3 transition duration-150 ease-in-out rounded-xl hover:bg-gray-100">
                        <div class="ml-4 flex w-full justify-between items-center">
                            <p class="text-base font-medium text-gray-700">
                                {{ $item->name }}
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                class="h-5 w-5 fill-transparent group-hover:fill-main">
                                <path
                                    d="M11.602 13.7599L13.014 15.1719L21.4795 6.7063L22.8938 8.12051L13.014 18.0003L6.65 11.6363L8.06421 10.2221L10.189 12.3469L11.6025 13.7594L11.602 13.7599ZM11.6037 10.9322L16.5563 5.97949L17.9666 7.38977L13.014 12.3424L11.6037 10.9322ZM8.77698 16.5873L7.36396 18.0003L1 11.6363L2.41421 10.2221L3.82723 11.6352L3.82604 11.6363L8.77698 16.5873Z">
                                </path>
                            </svg>
                        </div>
                    </a>
                @endforeach

            </div>
        </section>






        <x-shared.footer />
    </div>










</body>

</html>
