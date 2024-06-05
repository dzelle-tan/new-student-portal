<?php

use App\Models\Student;
use App\Models\StudentTerm;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {

    public $record;
    public Student $user;
    public $programTitle;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->getStudentClass();
        $latestTerm = $this->user->terms()->latest()->first();
        $this->programTitle = $latestTerm->program->program_title ?? 'N/A';
    }

    public function getStudentClass(): void
    {
        $this->record = StudentTerm::where('student_no', $this->user->student_no)
                    ->with([
                        'block.classes.course',
                        'block.classes.classSchedules.classMode',
                        'block.classes.classSchedules.room.building'
                    ])
                    ->orderBy('aysem_id', 'desc')
                    ->first();
    }
};
?>

<div>
    {{-- Student Information --}}
    <div class="mt-6 lg:items-center lg:w-5/6 xl:2/3 lg:flex lg:justify-between">
        <div>
            <div>
                <x-info-label class="w-24">{{_("Student No:")}}</x-info-label>
                <span>{{ $user->student_no }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("Name:")}}</x-info-label>
                <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
            </div>
        </div>
        <div>
            <div>
                <x-info-label class="w-24">{{_("Program:")}}</x-info-label>
                <span>{{ $programTitle }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("A.Y Term:")}} </x-info-label>
                <span>{{ $record->aysem->academic_year_code }} - Term {{ $record->aysem->semester }} </span>
            </div>
        </div>
    </div>

    {{-- Schedule --}}
    <div class="w-full mt-4 overflow-x-auto">
        <table class="w-full text-left whitespace-nowrap">
            <thead>
                <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                    <th class="px-4 py-3 font-medium">{{_("Class Code")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Section")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Subject Title")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Units")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Schedule")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Type")}}</th>
                    <th class="px-4 py-3 font-medium">{{_("Room")}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($record->block->classes as $class)
                    @foreach ($class->classSchedules as $schedule)
                        <tr class="text-sm border-b border-gray-200">
                            <td class="px-4 py-3">{{ $class->course->subject_code }}</td>
                            <td class="px-4 py-3">{{ $record->block->section }}</td>
                            <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $class->course->subject_title }}</td>
                            <td class="px-4 py-3 ">{{ $class->course->units }} </td>
                            <td class="px-4 py-3">{{ $schedule->day }} {{ date('g:i A', strtotime($schedule->start_time)) }} {{_("-")}} {{ date('g:i A', strtotime($schedule->end_time)) }}</td>
                            <td class="px-4 py-3">{{ ucfirst($schedule->classMode->mode_type) }}</td>
                            <td class="px-4 py-3">{{ $schedule->room->room_name }} - {{ $schedule->room->building->building_name }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
