<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="p-4 mx-auto max-w-7xl sm:p-6 lg:p-8">
        {{-- <livewire:classes.create /> --}}
        <livewire:classes.show />
    </div>
</x-app-layout>