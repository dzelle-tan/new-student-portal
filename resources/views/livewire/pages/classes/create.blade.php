<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    #[Rule('required|string|max:255')]
    public string $name = '';

    public function store(): void
    {
        $validated = $this->validate();
 
        auth()->user()->classes()->create($validated);
 
        $this->name = '';
    } 
}; ?>

<div>
    <form wire:submit="store"> 
        <textarea
            wire:model="name"
            placeholder="{{ __('Create a class') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        ></textarea>
 
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
        <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
    </form> 
</div>
