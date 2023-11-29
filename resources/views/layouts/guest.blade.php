<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/alisto-logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center p-2 pt-6 sm:pt-0 bg-main relative ">
        <div class="fixed top-0 bottom-0 left-0 right-0">
            <img src="{{ asset('images/bg1.jpg') }}" class="absolute top-0 h-full w-full object-cover opacity-50"
                alt="">
        </div>

        <div
            class="w-full relative sm:max-w-md mt-6 px-6 py-6 bg-white rounded-lg shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center items-center">
                <a href="/">
                    <img src="{{ asset('images/alisto-logo.png') }}" class="h-32" alt="">
                </a>
            </div>
            @if (request()->routeIs('admin-login'))
                <div class="mb-4">
                    <H1 class="text-center font-bold text-xl text-main"> HELLO ADMIN</H1>
                </div>
            @endif
            <div class="mt-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
