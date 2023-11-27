<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl p-4 mx-auto sm:p-6 lg:p-8">
        {{-- <livewire:classes.create /> --}}
        <livewire:classes.table />
    </div>
</x-app-layout>