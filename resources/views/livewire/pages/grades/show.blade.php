<?php

use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\StudentTerm;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;


new class extends Component
{
    public $selectedTerm = "All";
    public $totalUnits = 0;
    public Collection $terms;
    public Student $user;
    public $totalGradePoints = 0;
    public $latestProgramTitle;

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->getAcademicYear();
        $this->getLatestProgramTitle();
    }

    // Fetches the authenticated user's associated grades and academic year
    public function getAcademicYear(): void
    {
        // Fetch the terms taken by the student
        // $this->terms = $this->user->terms()->with('program', 'aysem', 'block', 'registrationStatus')->get();
        $this->terms = $this->user->terms()->with('aysem.academicYear')->get();
        // dd($this->terms);
    }
    // Fetches the program titles associated with the student's terms
    public function getLatestProgramTitle(): void
    {
        $latestTerm = StudentTerm::where('student_no', $this->user->student_no)
                        ->with('program')
                        ->latest('student_term_id')
                        ->first();

        if ($latestTerm) {
            $this->latestProgramTitle = $latestTerm->program->program_title;
        } else {
            $this->latestProgramTitle = "No Program Found";
        }
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
                    <span>{{ $latestProgramTitle }}</span>
                </div>
                <div>
                    <x-info-label class="w-24">{{_("A.Y-Term:")}}</x-info-label>
                    <select class="px-2 py-0 border-gray-300 rounded-md w-36 form-control" wire:change="updateSelectedTerm($event.target.value)">
                        <option value = "All">All</option>
                        @foreach ($terms as $term)
                            <option value="{{ $term->id }}">
                                {{ $term->aysem->academicYear->academic_year_code }} - {{ $term->aysem->semester_index }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

    </div>
</div>
