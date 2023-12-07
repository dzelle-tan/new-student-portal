<?php

use App\Models\Classes;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;

new class extends Component {

    public Collection $classes;
    public $daysOfWeek;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch all classes associated with the authenticated student
        $this->classes = Classes::where('student_id', $user->id)
                        ->where('day', date('l'))
                        ->get();
    }
    public function formatTime($time)
    {
        return \Carbon\Carbon::parse($time)->format('g:i A');
    }
}; ?>

<div>
    <h3 class="text-lg font-medium">{{ __("Today's Schedule")}}</h3>
    <div class="flex mt-1 mb-8 space-x-1 text-sm">
        <x-icon name="calendar-days" solid class="w-5 h-5 text-gray-600"/><p>{{ date('F j, Y, l') }}</p>
    </div>
    <div class="space-y-3 ">
        @foreach ($classes as $class)
            <div class="w-full p-2 pl-3 space-y-3 border-l-4 rounded-md shadow-sm {{ $class->type === 'face-to-face' ? 'bg-indigo-50 border-primary-light-2 text-primary' : 'bg-amber-50 border-secondary-light-2 text-secondary-dark-1' }}">
                <p>{{ $this->formatTime($class->start_time) }} - {{ $this->formatTime($class->end_time) }}</p>
                <p>{{ $class->name }}</p>
            </div>  
        @endforeach
        {{-- @if ($flag)
            <div class="p-2">
               Yey! No Classes Today!!!
               <img src="{{ asset('files/dance-moves.gif') }}" alt="Celebration GIF">
            </div>

        @endif --}}
    </div>
    <a href="{{ route('classes') }}" class="flex justify-end mt-10 text-gray-500 underline">See more...</a>
</div>
