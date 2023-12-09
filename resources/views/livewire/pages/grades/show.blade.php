<?php

use App\Models\Student;
use App\Models\StudentRecord;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;


new class extends Component
{
    public $selectedTerm = "All";
    public $totalUnits = 0;
    public Collection $terms;
    public Student $user;

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->getAcademicYear();
    }

    // Fetches the authenticated user's associated grades and academic year
    public function getAcademicYear(): void
    {
        $this->terms = StudentRecord::where('student_id', $this->user->id)
                        ->with('classes', 'classes.grade')
                        ->get();
    }

    // Extracts user input from dropdown
    public function updateSelectedTerm($value): void
    {
        $this->selectedTerm = $value;
    }
}; ?>

<div class="space-y-3">
    <div class="p-4 pt-3 bg-white shadow sm:p-8 sm:pt-6 sm:rounded-md">
        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-16">

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
                    <x-info-label class="w-24">{{_("A.Y-Term:")}}</x-info-label>
                    <select class="px-2 py-0 border-gray-300 rounded-md w-36 form-control" wire:change="updateSelectedTerm($event.target.value)">
                        <option value = "All">All</option>
                        @foreach ($terms as $term)
                            <option value = "{{ $term->id }}">{{ $term->school_year }}-{{ $term->semester }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Grades --}}
        @foreach ($terms as $term)
            @if ($selectedTerm == 'All' || $term->id == $selectedTerm)
                <h2 class="mt-8">{{ $term->school_year }}, Term {{ $term->semester }}</h2>
                <div class="w-full mt-4 overflow-x-auto">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-xs tracking-wider uppercase border-b border-gray-200 text-table-header bg-gray-50">
                                <th class="px-4 py-3 font-medium">{{_("Subject Code")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Section")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Units")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Subject Title")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Grade")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Completion Grade")}}</th>
                                <th class="px-4 py-3 font-medium">{{_("Remarks")}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($term->classes as $class)
                                <tr class="text-sm border-b border-gray-200">
                                    <td class="px-4 py-3">{{ $class->code }}</td>
                                    <td class="px-4 py-3">{{ $class->section }}</td>
                                    <td class="px-4 py-3">{{ $class->units }}</td>
                                    <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $class->name }}</td>
                                    <td class="px-4 py-3">{{ $class->grade->grade }}</td>
                                    <td class="px-4 py-3">{{ $class->grade->completion_grade }}</td>
                                    <td class="px-4 py-3">{{ $class->grade->remarks }}</td>
                                </tr>
                                @php
                                    $totalUnits += $class->units;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center justify-end py-2 pr-12 space-x-8 text-sm">
                    <p>{{_("Total Units:")}} <span class="font-medium">{{ $totalUnits }}</span></p>
                    <p>{{_("GWA:")}} <span class="font-medium">1.00</span></p>
                </div>
                @php
                    $totalUnits = 0;
                @endphp
            @endif
        @endforeach
    </div>
</div>
