<x-app-layout>
    <x-slot name="header">
        <livewire:pages.shifting.header />
    </x-slot>

    <div class="p-4 mx-auto space-y-3 max-w-7xl sm:p-6 lg:p-8">
        <livewire:pages.shifting.view 
        :shiftingrequestExists="$shiftingrequestExists" 
        :shiftingrequestStatus="$shiftingrequestStatus"
        :user="$user"
        :letter_of_intent="$letter_of_intent" 
        :note_of_undertaking="$note_of_undertaking" 
        :shifting_form="$shifting_form" 
        />
    </div>
</x-app-layout>
