<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="p-4 mx-auto space-y-3 max-w-7xl sm:p-6 lg:p-8">
        <div class="flex px-4 py-3 space-x-6 text-gray-900">
            <div class="flex items-center space-x-2">
                <div class="w-4 h-4 bg-primary-light-2 rounded-xl"></div>
                <p>Face-to-Face</p>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-4 h-4 bg-secondary-light-2 rounded-xl"></div>
                <p>Online</p>
            </div>
        </div>
        
        <livewire:pages.classes.show />
    </div>
</x-app-layout>