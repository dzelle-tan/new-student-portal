<?php

use App\Models\Classes;

use Illuminate\Support\Collection;
use Livewire\Volt\Component;

// customize na dapat yung classes according dun sa latest enrolled term yung madidisplay
new class extends Component {

    public Collection $classes;
    public $daysOfWeek;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Fetch all classes associated with the authenticated student
        $this->classes = Classes::where('student_id', $user->id)->get();

        $this->daysOfWeek = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
    }
    public function formatTime($time)
    {
        return \Carbon\Carbon::parse($time)->format('g:i A');
    }
}; ?>

<div class="grid grid-cols-1 overflow-hidden bg-white shadow-sm sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-6 rounded-md lg:min-h-[38rem]">
    @foreach ($daysOfWeek as $dayName)
        <div class="-mr-px border">
            <div class="px-6 py-4 mb-1 text-sm font-medium tracking-wider uppercase border-b-2 text-table-header bg-gray-50">
                {{ $dayName }}
            </div>
            @foreach ($classes as $class)
                @if ($class->day == $dayName)
                    <div class="p-2 pt-1">
                        <x-class-block 
                            time="{{ $this->formatTime($class->start_time) }} - {{ $this->formatTime($class->end_time) }}"  
                            code="{{ $class->code }}" 
                            section="{{ $class->section }}" 
                            subject="{{ $class->name }}" 
                            room="{{ $class->room }}" 
                            type="{{ $class->type }}"/>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach
</div>