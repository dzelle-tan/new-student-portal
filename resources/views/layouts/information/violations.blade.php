<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Violations') }}
        </h2>
    </x-slot>
    
    <div class="py-12 mx-auto space-y-3 text-gray-900 max-w-7xl sm:px-6 lg:px-8">
        <div class="flex p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <x-icon name="information-circle" class="mr-2" /> {{ __("If violation is received, you must report to the OSDS office within three days, or it will be officially recorded.") }}
        </div>
        <div class="flex p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <h2>Light Offenses</h2>
        </div>
    </div>
</x-app-layout>