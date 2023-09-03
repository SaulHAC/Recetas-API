<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased inset-0">
        <div class="min-h-screen flex sm:justify-center items-center">

            <div class="w-1/2 flex flex-col">
                <div class="m-20 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <img src="{{asset('images/happy-recipes-green.png')}}" alt="imagen" class="mb-6 w-3/4">
                    {{ $slot }}
                </div>
            </div>
            <div class="bg-red-700 w-1/">
                <img src="{{ asset('images/login.jpg') }}" alt="" class="h-screen">
            </div>
        </div>
    </body>
</html>
