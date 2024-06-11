<?php

use App\Models\StudentTerm;
use App\Models\StudyPlanValidations;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


use Livewire\Volt\Component;

new class extends Component {

    public $step = 1;
    public StudentTerm $record;
    public $studyPlanApproved = false;
    public string $studentStatus;
    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();

        // Fetches the most recent term based on 'aysem_id' to get the latest academic year and semester
        $this->record = StudentTerm::where('student_no', $this->user->student_no)
                        ->orderBy('aysem_id', 'desc')
                        ->with(['aysem', 'block.classes.course', 'block.classes.grades'])
                        ->first();
        $this->studentStatus = $this->record->registrationStatus->registration_status; // Added student status

        if($this->record->enrolled == 1) {
            $this->step = 3;
        }

        $studyPlanValidation = StudyPlanValidations::where('student_no', $this->user->student_no)->first();
        if($studyPlanValidation->exists()) {
            $this->studyPlanApproved = $studyPlanValidation->status == 'Approved';
        }
    }

    public function next()
    {
        $this->step++;
    }

    public function back()
    {
        $this->step--;
    }
}; ?>

<div x-data="{ showConfirmModal: false }">
    {{-- Page/Step Indicator --}}
    <x-progress-bar :step="$step" :descriptions="['Class Schedule', 'Assessment', 'Download SER']" />

    <div class="p-4 pt-4 bg-white sm:p-8 sm:pt-6 sm:rounded-md">

        {{-- Enrollment Step 1 --}}
        @if($step == 1)
            <div class="lg:py-2 lg:px-4">
                <x-nav-link  href="{{ route('enrollmentSchedule') }}">
                    <button class="mt-8 w-50">Download Schedule</button>
                </x-nav-link > 
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-semibold text-gray-700">
                        @if($studentStatus == 'Regular')
                            {{ __('Class Schedule') }}
                        @else
                            {{ __('Create Study Plan') }}
                        @endif
                    </h2>
                    <a href="{{ route('enrollmentSchedule') }}"
                        class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                        <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2" />
                        Download
                    </a>
                </div>
                <livewire:pages.enrollment.schedule/>
                <div class="flex justify-end">
                    <button @click="if ('{{ $studentStatus }}' === 'Irregular' && '{{ !$studyPlanApproved }}') showConfirmModal = true; else $wire.next()"
                        class="flex items-center mt-8 font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110 disabled:opacity-50 disabled:cursor-not-allowed">
                        Next
                        <x-icon name="arrow-long-right" class="w-5 h-5 ml-2"/>
                    </button>
                </div>
            </div>

            {{-- Enrollment Step 2 --}}
        @elseif($step == 2)
            <div class="lg:py-2 lg:px-4">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-semibold text-gray-700">Assessment</h2>
                    <a href="{{ route('enrollmentFee') }}"
                        class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                        <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                        Download
                    </a>
                </div>
                <livewire:pages.enrollment.fee/>
                <div class="flex justify-between mt-12">
                    <button wire:click="back"
                        class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                        <x-icon name="arrow-long-left" class="w-5 h-5 mr-2"/>
                        Back
                    </button>
                    <button wire:click="next"
                        class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                        Next
                        <x-icon name="arrow-long-right" class="w-5 h-5 ml-2"/>
                    </button>
                </div>
            </div>

        {{-- Enrollment Step 3 --}}
        @elseif($step == 3)
            <div class="lg:py-2 lg:px-4">
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-semibold text-gray-700">Download SER</h2>
                    <a href="{{ route('enrollmentSER') }}"
                        class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                        <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                        Download
                    </a>
                </div>
                <livewire:pages.enrollment.ser/>
                <button wire:click="back" class="flex items-center mt-12 font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                    <x-icon name="arrow-long-left" class="w-5 h-5 mr-2"/>
                    Back
                </button>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div x-show="showConfirmModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-10" x-cloak>
        <div class="bg-white p-6 rounded-md">
            <h2 class="text-xl font-semibold mb-4">Await Approval</h2>
            <p class="mb-4">You cannot proceed to the next step until your study plan has been approved.</p>
            <div class="flex justify-end">
                <button @click="showConfirmModal = false" class="mr-4 px-4 py-2 bg-gray-300 rounded-md">Okay</button>
            </div>
        </div>
    </div>
</div>