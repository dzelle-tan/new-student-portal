<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 gap-3 py-6 mx-auto md:grid-cols-2 lg:grid-rows-3 lg:grid-cols-3 max-w-7xl sm:px-6 lg:px-8">
        <div class="col-span-1 space-y-3 md:col-span-2 lg:col-span-2 lg:row-span-3">
            <div class="flex items-center p-4 bg-white shadow sm:p-8 sm:rounded-md">
                <x-icon name="fire" class="w-6 h-6 text-secondary animate-pulse"/>
                <x-icon name="building-library" class="w-6 h-6 text-primary-light-2"/>
                <h2 class="flex items-center relative w-[max-content]
                    before:absolute before:inset-0 before:animate-typewriter
                    before:bg-white
                    after:absolute after:inset-0 after:w-[0.125em] after:animate-caret
                    after:bg-black text-lg ml-3">Welcome,<span class="ml-1 font-medium">Dzelle Faith Tan!</span> 
                </h2>
            </div>
            <div class="p-4 bg-white shadow h-[40rem] sm:p-8 sm:rounded-md">
                <livewire:pages.home.calendar />
            </div>
        </div>
        <div class="flex flex-col col-span-1 p-4 bg-white shadow md:col-span-1 lg:row-span-2 sm:p-8 sm:rounded-md">
            <livewire:pages.home.schedule />
        </div>
        <div class="flex flex-col col-span-1 p-4 bg-white shadow md:col-span-1 lg:row-span-1 sm:p-8 sm:rounded-md">
            <livewire:pages.home.quote />
        </div>
    </div>
    {{-- <div class="py-0 sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative shadow-md">
                <img src="{{ asset('images/plm-facade.png') }}" alt="plm facade" class="object-cover object-top w-full h-32 sm:rounded-md sm:h-36 md:h-60 lg:h-64 xl:h-72 2xl:h-72">
                <div class="absolute bottom-0 w-full px-4 py-3 sm:rounded-b-md bg-slate-600/80">
                    <p class="text-xl font-semibold text-white lg:text-2xl xl:text-3xl"> Welcome, Dzelle Faith Tan!</p>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
