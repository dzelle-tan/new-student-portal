<?php

use App\Models\Student;
use Livewire\Volt\Component;

new class extends Component {
    public Student $user;

    public function mount()
    {
        $this->user = auth()->user();
    }
}; ?>

<div class="flex items-center">
    <x-icon name="fire" class="w-6 h-6 text-secondary animate-pulse"/>
    <x-icon name="building-library" class="w-6 h-6 text-primary-light-2"/>
    <h2 class="flex items-center relative w-[max-content] text-lg ml-3">Welcome,<span class="ml-1 font-medium">{{ $user->first_name }} {{ $user->last_name }}!</span>
    </h2>
</div>
