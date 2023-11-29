<?php

use App\Models\Subject; 
use Illuminate\Database\Eloquent\Collection; 
use Livewire\Volt\Component;

new class extends Component {
    public Collection $classes; 
 
    public function mount(): void
    {
        $this->classes = Subject::with('user')
            ->latest()
            ->get();
    } 
}; ?>

@php
    $days = [
        'Monday' => [
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'online']
        ],
        'Tuesday' => [
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'face-to-face'],
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'face-to-face']
        ],
        'Wednesday' => [
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'face-to-face']
        ],
        'Thursday' => [
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'online'],
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'face-to-face']
        ],
        'Friday' => [
            ['time' => '9am - 12pm', 'code' => 'CSC 0134.1', 'section' => '2', 'subject' => 'Operating System (Lab)', 'room' => 'GV 311', 'type' => 'face-to-face']
        ],
        'Saturday' => [
        ],
    ];
@endphp

<div class="grid grid-cols-1 overflow-hidden bg-white shadow-sm sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 rounded-xl lg:min-h-[38rem]">
    @foreach ($days as $day => $classes)
        <div class="-mr-px border">
            <div class="px-6 py-4 border-b-2">
                {{ $day }}
            </div>
            @foreach ($classes as $class)
                <div class="p-2 {{ $loop->first ? '' : 'pt-0' }}">
                    <x-class-block time="{{ $class['time'] }}" code="{{ $class['code'] }}" section="{{ $class['section'] }}" subject="{{ $class['subject'] }}" room="{{ $class['room'] }}" type="{{ $class['type'] }}"/>     
                </div>
            @endforeach              
        </div>
    @endforeach
</div>
    {{-- @foreach ($classes as $class)
        <div class="flex p-6 space-x-2" wire:key="{{ $class->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="text-gray-800">{{ $class->user->name }}</span>
                        <small class="ml-2 text-sm text-gray-600">{{ $class->created_at->format('j M Y, g:i a') }}</small>
                    </div>
                </div>
                <p class="mt-4 text-lg text-gray-900">{{ $class->name }}</p>
            </div>
        </div>
    @endforeach  --}}


