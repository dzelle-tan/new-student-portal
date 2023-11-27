<?php
use App\Models\Grade;
use App\Models\Student;
use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;


new class extends Component
{
    public $selectedTerm;
    public Collection $terms;
    public Collection $grades;
    public Student $user;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();
        $this->getAcademicYear();
    }

    public function getStudentGrades(): void
    {
        $this->grades = Grade::where('student_id', $this->user->id)
        ->with('classes')
        ->get();
    }


    public function getAcademicYear(): void
    {
        $this->getStudentGrades();
        $this->terms = StudentRecord::where('student_id', $this->user->id)
        ->get();
    }

    public function updateSelectedTerm($value): void
    {
        $this->selectedTerm = $value;
        $this->getStudentGrades();
    }
}; ?>

<section>

<div>
    <header>

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Student Information') }}
        </h2>
    </header>
    <div class="mt-6 space-y-2">
        <div>
            <x-info-label>{{_("Student No:")}}</x-info-label>
            <span>{{ $user->student_no }}</span>3
        </div>
        <div>
            <x-info-label>{{_("Name:")}}</x-info-label>
            <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
        </div>
        <div>
            <x-info-label>{{_("Degree Program:")}}</x-info-label>
            <span>{{ $user->degree_program }}</span>
        </div>
    </div>

    <div class="mt-6 space-y-2">
        <select class="form-control" wire:change="updateSelectedTerm($event.target.value)">
            <option value = "All">All</option>
        @foreach ($terms as $term)
            <option value = "{{ $term->id }}">{{ $term->school_year }}, Term {{ $term->semester }}</option>
        @endforeach
        </select>
        <div>
            @if ($selectedTerm == null)
                shet
            @endif

        </div>
    </div>

    <div class="mt-6 space-y-2">
        <div class="grid grid-cols-1 bg-white shadow-sm gap-x-44 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-7 rounded-xl">
            <x-info-label>{{_("Subject Code")}}</x-info-label>
            <x-info-label>{{_("Section")}}</x-info-label>
            <x-info-label>{{_("Units")}}</x-info-label>
            <x-info-label>{{_("Subject Title")}}</x-info-label>
            <x-info-label>{{_("Grade")}}</x-info-label>
            <x-info-label>{{_("Completion Grade")}}</x-info-label>
            <x-info-label>{{_("Remarks")}}</x-info-label>

            @foreach ($grades as $grade)
            @if ($selectedTerm == $grade->student_record_id)
                <div>
                    <span class="inline-block">{{ ($grade->classes)->code }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ ($grade->classes)->section }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ ($grade->classes)->units }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ ($grade->classes)->name }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ $grade->grade }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ $grade->completion_grade }}</span>
                </div>
                <div>
                    <span class="inline-block">{{ $grade->remarks}}</span>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</section>
