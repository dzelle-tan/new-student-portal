<x-app-layout>
    <x-slot name="header">
        <livewire:pages.add_drop.header />
    </x-slot>

    <div class="p-4 mx-auto space-y-3 max-w-7xl sm:p-6 lg:p-8">
        <livewire:pages.add_drop.view :addDroprequestExists="$addDroprequestExists" :addDroprequestStatus="$addDroprequestStatus"
            :user="$user" :add_drop_form="$add_drop_form" />
    </div>
</x-app-layout>