<?php

use Livewire\Volt\Component;

new class extends Component {
    public function download()
    {
        return Storage::disk('public')->download('downloads/OUR.pdf');
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
    <x-primary-button class="w-full mt-8" wire:click="download">Download</x-primary-button>
    <x-primary-button class="w-full mt-8" x-data x-on:click="$dispatch('open-modal')">Table of Fees</x-primary-button>
</div>
