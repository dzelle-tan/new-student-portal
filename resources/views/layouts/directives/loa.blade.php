<x-app-layout>
    <x-slot name="header">
        <livewire:pages.loa.header />
    </x-slot>
    
    <div class="p-4 mx-auto space-y-3 max-w-7xl sm:p-6 lg:p-8">
        <livewire:pages.loa.view 
            :loarequestExists="$loarequestExists"
            :loarequestStatus="$loarequestStatus"
            :user="$user"
        />
    </div>
</x-app-layout>