<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Grades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- <livewire:grades.select /> --}}
                </div>
                <div class="max-w-xl">
                    <livewire:grades.show />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>