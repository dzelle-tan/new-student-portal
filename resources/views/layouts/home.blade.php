<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Home') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 gap-3 py-6 mx-auto md:grid-cols-2 lg:grid-rows-6 lg:grid-cols-3 max-w-7xl sm:px-6 lg:px-8">
        <div class="col-span-1 space-y-3 md:col-span-2 lg:col-span-2 lg:row-span-6">
                <livewire:pages.home.name />
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-md">
                <h3 class="text-lg font-medium">{{__("General Weighted Average (GWA)")}}</h3>
                {!! $chart->container() !!}
                <p class="italic text-center">Year - Semester</p>
            </div>
            <div class="p-4 bg-white shadow h-[40rem] sm:p-8 sm:rounded-md">
                <livewire:pages.home.calendar />
            </div>
        </div>
        <div class="flex flex-col col-span-1 p-4 bg-white shadow md:col-span-1 lg:row-span-1 sm:p-8 sm:rounded-md">
            {{-- <livewire:pages.home.quote /> --}}
            <div class="flex gap-x-2">
                <p class="mb-1 font-semibold">Downloadables</p>
                <x-icon name="arrow-down-tray" class="w-5 h-5" solid/>         
            </div>
            <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="text-gray-600 underline">
                {{ __('OURRequestForm.pdf') }}
            </a>
            <a href="{{ asset('files/University-Calendar2324.pdf') }}" download class="text-gray-600 underline">
                {{ __('UniversityCalendar2324.pdf') }}
            </a>
            
            {{-- <div class="flex items-center justify-center w-full gap-x-6">
                <a href="https://web2.plm.edu.ph/sfe/" target="_blank">
                    <div class="space-y-2 text-center">
                        <x-icon name="user-group" class="h-14 w-14" solid/>
                        <p class="font-semibold">SFE</p>
                    </div>
                </a>
                <a href="https://www.angpamantasan.org/" target="_blank">
                    <div class="space-y-2 text-center">
                        <x-icon name="newspaper" class="h-14 w-14" solid/>
                        <p class="font-semibold text-[14px]">Ang <br /> Pamantasan</p>
                    </div>
                </a>
            </div> --}}
        </div>
        <div class="flex flex-col justify-between col-span-1 p-4 bg-white shadow md:col-span-1 lg:row-span-3 sm:p-8 sm:rounded-md">
            <livewire:pages.home.schedule />
            <a href="{{ route('classes') }}" class="flex justify-end text-gray-500 underline">See more...</a>
        </div>
        <div class="flex flex-col col-span-1 p-4 bg-white shadow md:col-span-1 lg:row-span-2 sm:p-8 sm:rounded-md">
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

<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
