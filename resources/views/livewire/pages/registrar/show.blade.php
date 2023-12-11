<?php

use Livewire\Volt\Component;

new class extends Component {

    public $view = 'Request';

    public function changeView()
    {
        $this->view = $this->view == 'Request' ? 'Records' : 'Request';
    }
}; ?>

<div>
    <button wire:click="changeView">
        {{ ($view) }}
    </button>
    @if($view == 'Records')
        <livewire:pages.registrar.records />
    @elseif ($view == 'Request')
        <livewire:pages.registrar.request />
    @endif
</div>
