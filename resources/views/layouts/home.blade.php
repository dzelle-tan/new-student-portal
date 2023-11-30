<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-0 sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative shadow-md">
                <img src="{{ asset('images/plm-facade.png') }}" alt="plm facade" class="object-cover object-top w-full h-32 sm:rounded-md sm:h-36 md:h-60 lg:h-64 xl:h-72 2xl:h-72">
                <div class="absolute bottom-0 w-full px-4 py-3 sm:rounded-b-md bg-slate-600/80">
                    <p class="text-xl font-semibold text-white lg:text-2xl xl:text-3xl"> Welcome, Dzelle Faith Tan!</p>
                </div>
            </div>
            <div class="bg-[url('{{ asset('images/hero-banner-facade.jpg') }}')] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
