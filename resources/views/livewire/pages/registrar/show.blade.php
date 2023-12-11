<?php

use Livewire\Volt\Component;

new class extends Component {

    public $view = 'Request';

    public function changeView($view)
    {
        $this->view = $view;
    }
}; ?>

<div>
    <div class="p-1 mb-4 bg-gray-200 border rounded-md w-fit">
        <button wire:click="changeView('Request')"
                class="{{ $view == 'Request' ? 'bg-white text-gray-800 shadow-md' : 'bg-transparent text-gray-500' }} px-2 py-1 rounded">
            Request
        </button>

        <button wire:click="changeView('Records')"
                class="{{ $view == 'Records' ? 'bg-white text-gray-800 shadow-md' : 'bg-transparent text-gray-500' }} px-2 py-1 rounded">
            Records
        </button>
    </div>

    @if($view == 'Records')
        <livewire:pages.registrar.records />
    @elseif ($view == 'Request')
        <livewire:pages.registrar.request />
    @endif
</div>
