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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased relative bg-main overflow-hidden">
    <img src="{{ asset('images/bg1.jpg') }}" class="absolute top-0 opacity-50" alt="">
    <section class="h-screen grid place-content-center" class="" x-data="{ fullscreenModal: false }" x-init="$watch('fullscreenModal', function(value) {
        if (value === true) {
            document.body.classList.add('overflow-hidden');
        } else {
            document.body.classList.remove('overflow-hidden');
        }
    })"
        @keydown.escape="fullscreenModal=false">
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-16 max-w-7xl">
            <div class="flex w-full mx-auto">
                <div class="relative inline-flex items-center m-auto align-middle">
                    <div class="relative max-w-6xl p-10 overflow-hidden bg-white bg-opacity-80 rounded-3xl lg:p-10">
                        <div class="relative max-w-lg">
                            <div>
                                <img src="{{ asset('images/alisto-logo.jpg') }}" alt="">
                                <div class="py-12 flex flex-col items-center space-y-4">
                                    <a href="{{ route('register') }}"
                                        class="rounded-full p-3 bg-main px-20 text-lg font-semibold text-white">
                                        <span>Sign Up</span>
                                    </a>
                                    <a href="{{ route('login') }}"
                                        class="rounded-full p-3 border-2 border-main px-20 text-lg font-semibold text-main">
                                        <span>Log In</span>
                                    </a>
                                </div>
                                <p class="max-w-xl text-center mt-4 text-base tracking-tight text-gray-600">
                                    By signing in, you agree to Alisto's <a href="#" class="text-main">Terms
                                        of Service</a> and <a href="#" class="text-main">Privacy Policy</a>.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <template x-teleport="body">

                <div x-show="fullscreenModal" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="flex fixed inset-0 z-[99] w-screen h-screen bg-white">
                    <button @click="fullscreenModal=false"
                        class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-3 mr-3 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        <span>Close</span>
                    </button>
                    <div
                        class="relative top-0 bottom-0 right-0 flex-shrink-0 hidden w-1/3 overflow-hidden bg-cover lg:block">
                        <a href="#_"
                            class="absolute bottom-0 left-0 z-30 inline-flex items-end mb-4 ml-3 font-sans text-2xl font-extrabold text-left text-white no-underline bg-transparent cursor-pointer group focus:no-underline">
                            <img src="{{ asset('images/alisto-logo.jpg') }}" alt="">
                        </a>
                        <div class="absolute inset-0 z-20 w-full h-full opacity-70 bg-gradient-to-t from-main"></div>
                        <img src="https://plus.unsplash.com/premium_photo-1679775634064-93628bf1d0cd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Y2xlYW5pbmclMjBzZXJ2aWNlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                            class="z-10 object-cover w-full h-full" />
                    </div>
                    <div class="relative flex flex-wrap items-center w-full h-full px-8">

                        <div class="relative w-full max-w-sm mx-auto lg:mb-0">
                            <div class="relative text-center">

                                <div class="flex flex-col mb-6 space-y-2">
                                    <h1 class="text-3xl font-semibold text-main tracking-tight">Create an account</h1>
                                    <p class="text-sm text-neutral-500">Enter your email below to create your account
                                    </p>
                                </div>
                                <form onsubmit="event.preventDefault();" class="space-y-2">
                                    <input type="text" placeholder="Name"
                                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                                    <input type="text" placeholder="juandelacruz@gmail.com"
                                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                                    <input type="text" placeholder="Password"
                                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                                    <input type="text" placeholder="Confirm Password"
                                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-main focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-main disabled:cursor-not-allowed disabled:opacity-50">
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-full h-10 px-4 py-2 text-sm font-medium tracking-wide text-white transition-colors duration-200 rounded-md bg-main hover:bg-gray-700 focus:ring-2 focus:ring-offset-2 focus:ring-neutral-900 focus:shadow-outline focus:outline-none">
                                        Submit
                                    </button>
                                </form>
                            </div>
                            <p class="mt-6 text-sm text-center text-neutral-500">Already have an account? <a
                                    href="#_" class="relative font-medium text-blue-600 group"><span>Login
                                        here</span><span
                                        class="absolute bottom-0 left-0 w-0 group-hover:w-full ease-out duration-300 h-0.5 bg-blue-600"></span></a>
                            </p>
                            <p class="px-8 mt-1 text-sm text-center text-neutral-500">By continuing, you agree to our
                                <a class="underline underline-offset-4 hover:text-primary" href="/terms">Terms</a>
                                and
                                <a class="underline underline-offset-4 hover:text-primary" href="/privacy">Policy</a>.
                            </p>
                        </div>
                    </div>
                </div>

            </template>
        </div>
    </section>

</body>

</html>
