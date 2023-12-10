<?php

use App\Models\Student;
use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

use Livewire\Volt\Component;

new class extends Component {

    public StudentRecord $record;
    public Student $user;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->getStudentClass();
    }

    public function getStudentClass(): void
    {
        $this->record = StudentRecord::where('student_id', $this->user->id)
                        ->with('classes')
                        ->latest()
                        ->first();

    }
}; ?>

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
                <span>{{ $user->degree_program }}</span>
            </div>
            <div>
                <x-info-label class="w-24">{{_("A.Y Term:")}} </x-info-label>
                <span>{{ $record->school_year }} - Term {{ $record->semester }} </span>
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
                @foreach ($record->classes as $class)
                    <tr class="text-sm border-b border-gray-200">
                        <td class="px-4 py-3">{{ $class->code }}</td>
                        <td class="px-4 py-3">{{ $class->section }}</td>
                        <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $class->name }}</td>
                        <td class="px-4 py-3 ">{{ $class->units }} </td>
                        <td class="px-4 py-3">{{ $class->day }} {{ date('g:i A', strtotime($class->start_time)) }} {{_("-")}} {{ date('g:i A', strtotime($class->end_time)) }}</td>
                        <td class="px-4 py-3">{{ ucfirst($class->type) }}</td>
                        <td class="px-4 py-3">{{ $class->room }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
