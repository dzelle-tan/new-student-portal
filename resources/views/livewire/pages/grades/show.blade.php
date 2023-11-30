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
    public $selectedTerm = "All";
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
    }
}; ?>

<div class="space-y-3">
    <div class="p-4 pt-3 bg-white shadow sm:p-8 sm:pt-6 sm:rounded-md">
        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-16">
        
        {{-- Student Information --}}
        <div class="mt-6 lg:items-center lg:w-5/6 xl:2/3 lg:flex lg:justify-between">
            <div>
                <div>
                    <x-info-label class="w-28">{{_("Student No:")}}</x-info-label>
                    <span>{{ $user->student_no }}</span>3
                </div>
                <div>
                    <x-info-label class="w-28">{{_("Name:")}}</x-info-label>
                    <span>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</span>
                </div>           
            </div>
            <div>
                <div>
                    <x-info-label class="w-28">{{_("Program:")}}</x-info-label>
                    <span>{{ $user->degree_program }}</span>
                </div>
                <div>
                    <x-info-label class="w-28">{{_("A.Y-Term:")}}</x-info-label>
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
        @php
            $groupedGrades = $grades->groupBy('student_record_id');
            $totalUnits = 0;
        @endphp
        @foreach ($groupedGrades as $termId => $grades)
            @if ($selectedTerm == 'All' || $termId == $selectedTerm)
                @php
                    $termDetails = collect($terms)->firstWhere('id', $termId);
                @endphp
                <h2 class="mt-8">{{ $termDetails->school_year }}, Term {{ $termDetails->semester }}</h2> 
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
                            @foreach ($grades as $grade)
                                <tr class="text-sm border-b border-gray-200">
                                    <td class="px-4 py-3">{{ $grade->classes->code }}</td>
                                    <td class="px-4 py-3">{{ $grade->classes->section }}</td>
                                    <td class="px-4 py-3">{{ $grade->classes->units }}</td>
                                    <td class="px-4 py-3 min-w-[200px] max-w-[300px] whitespace-normal">{{ $grade->classes->name }}</td>
                                    <td class="px-4 py-3">{{ $grade->grade }}</td>
                                    <td class="px-4 py-3">{{ $grade->completion_grade }}</td>
                                    <td class="px-4 py-3">{{ $grade->remarks }}</td>
                                </tr>
                                @php
                                    $totalUnits += $grade->classes->units;
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
</div>
