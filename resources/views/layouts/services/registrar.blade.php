<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('University Registrar') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-10 overflow-hidden text-gray-900 bg-white shadow-sm sm:rounded-lg h-[40rem]">
                <livewire:pages.registrar.show/>
            </div>
        </div>
    </div>
</x-app-layout>
