<!DOCTYPE html>
<html class="html h-full bg-white" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="h-full antialiased">
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h1 class="text-center text-6xl font-bold">
                    <a href="/" class=" text-gray-900">Barta</a>
                </h1>
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
