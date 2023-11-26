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
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div>
                    <a href="/" wire:navigate>
                        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-16">
                    </a>
                </div>
                <h1 class="text-primary font-bold text-3xl mt-8">PLM Student Portal</h1>
                {{ $slot }}
                <p class="mt-12">For more inquiries or concerns, please email <a href="" class="text-primary">ithelp@plm.edu.ph</a>.</p>
            </div>
        </div>
    </body>
</html>
