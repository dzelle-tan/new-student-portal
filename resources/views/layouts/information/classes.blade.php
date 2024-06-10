<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Classes') }}
        </h2>
    </x-slot>

    <div class="p-4 mx-auto space-y-3 max-w-[96rem] sm:p-6 lg:p-8">
        <div class="flex justify-between px-4 py-3 text-gray-900">
            <div class="flex space-x-6">
                <div class="flex items-center space-x-2">
                    <div class="w-4 h-4 bg-primary-light-2 rounded-xl"></div>
                    <p>Face-to-Face</p>
                </div>
                <div class="flex items-center space-x-2">
                    <div class="w-4 h-4 bg-secondary-light-2 rounded-xl"></div>
                    <p>Online</p>
                </div>         
            </div>
            <a href="{{ route('enrollmentSchedule') }}" class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                Download
            </a>
        </div>
        
        <livewire:pages.classes.show />
    </div>
</x-app-layout> 