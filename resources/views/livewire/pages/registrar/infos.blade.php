<?php

use Livewire\Volt\Component;

new class extends Component {
    public function download()
    {
        // return Storage::disk('public')->download('downloads/OUR.pdf');
    }

}; ?>

<div>
    {{-- Modal sana kaso di ko mapagana hahaha --}}
    <x-pop-up name="TOF" title="Table of Fees">
        <x-slot name="body">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                table of fees to be placed here hehe
            </div>
        </x-slot>
    </x-pop-up>
    <button class="flex items-center py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300 w-[10rem] justify-center" x-data x-on:click="$dispatch('open-modal')">
        <x-icon name="table-cells" class="w-5 h-5 mr-2"/>
        Table of Fees
    </button>
    <a href="{{ asset('files/OUR-Request-Form.pdf') }}" download>
        <button class="flex items-center py-2 text-gray-500 bg-gray-200 rounded hover:text-gray-700 hover:bg-gray-300 w-[10rem] justify-center" wire:click="download">
            <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
            Download
        </button>
    </a>
</div>
