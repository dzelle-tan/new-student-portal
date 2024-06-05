<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public $record;
    public $daysOfWeek;

    public function mount(): void
    {
        // Retrieve the authenticated user
        $this->user = Auth::user();

        // Fetch the latest student term
        $latestTerm = $this->user->terms()->with('block.classes.classSchedules', 'block.classes.classSchedules.classMode', 'block.classes.classSchedules.room')->latest('id')->first();

        // Get the classes for the latest term
        if ($latestTerm && $latestTerm->block) {
            $this->record = $latestTerm->block->classes;
        } else {
            $this->record = collect();
        }

        $this->daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
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
            @foreach ($record as $classModel)
                @foreach ($classModel->classSchedules as $classSchedule)
                    @if ($classSchedule->day == $dayName)
                        <div class="p-2 pt-1">
                            <x-class-block
                                time="{{ $this->formatTime($classSchedule->start_time) }} - {{ $this->formatTime($classSchedule->end_time) }}"
                                code="{{ $classModel->course->subject_code }}"
                                subject="{{ $classModel->course->subject_title }}"
                                description="{{ $classModel->course->description }}"
                                units="{{ $classModel->course->units }}"
                                section="{{ $classModel->section }}"
                                type="{{ $classSchedule->classMode->mode_type }}"
                                room="{{ $classSchedule->room->room_name }}"
                                building="{{ $classSchedule->room->building->building_name }}"
                                professor="{{ optional($classSchedule->professor)->first_name }} {{ optional($classSchedule->professor)->middle_name }}. {{ optional($classSchedule->professor)->last_name }}"
                            />
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    @endforeach
</div>
