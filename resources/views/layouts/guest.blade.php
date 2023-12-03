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
    <body class="font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen bg-gray-100 sm:justify-center sm:pt-0" style="background-image: url('{{ asset('images/bg.svg') }}'); background-size: cover; background-position: center;">
            
            <div class="w-full h-screen px-6 py-4 bg-white shadow-md ov:erflow-hidden sm:mt-6 sm:max-w-md sm:rounded-lg sm:h-auto">
                <div>
                    <a href="/" wire:navigate>
                        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-16">
                    </a>
                </div>
                <h1 class="mt-8 text-3xl font-bold text-primary">PLM Student Portal</h1>
                {{ $slot }}
                <p class="mt-12">For more inquiries or concerns, please email <a href="" class="text-primary">ithelp@plm.edu.ph</a>.</p>
            </div>
        </div>
    </body>
</html>
