<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-semibold leading-tight text-gray-800">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="pt-6 pb-3 mx-auto max-w-[96rem] sm:px-6 lg:px-8">
        <div class="relative grid grid-cols-1 col-span-1">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-md">
                @if(isset(Auth::user()->graduation_date) && !empty(Auth::user()->graduation_date) && \Carbon\Carbon::parse(Auth::user()->graduation_date)->isPast())
                    {{-- Welcome Alumni --}}
                    <livewire:pages.home.if-alumni />
                @else
                    {{-- Welcome <Name> --}}
                    <livewire:pages.home.name />
                @endif
            </div>
            <div class="absolute top-0 right-0 hidden h-full image-container lg:block">
                <img src="{{ asset('images/plm.jpg') }}" class="h-full rounded-tr-md rounded-br-md"/>
                <div class="absolute inset-0 bg-gradient-to-r from-white to-transparent"></div>
            </div>  
        </div>
    </div>
    <div class="grid grid-cols-1 gap-3 pb-6 mx-auto md:grid-cols-2 lg:grid-rows-6 lg:grid-cols-3 max-w-[96rem] sm:px-6 lg:px-8">
        <div class="col-span-1 space-y-3 md:col-span-2 lg:col-span-2 lg:row-span-6">
            
            {{-- GWA Stats --}}
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-md">
                <livewire:pages.home.grades-stats />
            </div> 
            
            {{-- University Calendar --}}
            <div class="p-4 bg-white shadow h-[40rem] sm:p-8 sm:rounded-md">
                <livewire:pages.home.calendar />
            </div>
        </div>
        <div class="grid col-span-1 space-y-3 md:col-span-2 lg:col-span-1 lg:row-span-6">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-md">
                <livewire:pages.home.links />
            </div>
            <div class="relative row-span-4 p-4 pb-20 bg-white shadow sm:p-8 sm:pb-20 sm:rounded-md">
                <livewire:pages.home.schedule /> 
                <a href="{{ route('classes') }}" class="absolute text-gray-500 underline right-8 bottom-8">See more...</a>
            </div>
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-md">
                <livewire:pages.home.quote />
            </div>
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
