<?php

use App\Models\StudentRecord;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;


use Livewire\Volt\Component;

new class extends Component {

    public $step = 1;
    public StudentRecord $record;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();

        $this->record = StudentRecord::where('student_id', $this->user->id)
                        ->orderBy('school_year', 'desc') // First order by 'school_year'
                        ->orderBy('semester', 'desc')       // Then order by 'term' within the same 'school_year'
                        ->first(); // Fetches the most recent record based on these fields

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

<div>
    {{-- Page/Step Indicator --}}
    <x-progress-bar :step="$step" :descriptions="['Class Schedule', 'Assessment', 'Download SER']"/>
    
    <div class="p-4 pt-4 bg-white sm:p-8 sm:pt-6 sm:rounded-md">

        {{-- Enrollment Step 1 --}}
        @if($step == 1)
            <div class="lg:py-2 lg:px-4">
                {{-- <x-nav-link  href="{{ route('enrollmentSchedule') }}">
                    <button class="mt-8 w-50">Download Schedule</button>
                </x-nav-link > --}}
                <div class="flex items-center justify-between mb-10">
                    <h2 class="text-2xl font-semibold text-gray-700">Class Schedule</h2>
                    <a href="{{ route('enrollmentSchedule') }}" class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                        <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                        Download
                    </a>
                </div>
                <livewire:pages.enrollment.schedule/>
                <div class="flex justify-end">
                    <button wire:click="next" class="flex items-center mt-8 font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
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
                    <a href="{{ route('enrollmentFee') }}" class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
                        <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                        Download
                    </a>
                </div>
                <livewire:pages.enrollment.fee/>
                <div class="flex justify-between mt-12">
                    <button wire:click="back" class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
                        <x-icon name="arrow-long-left" class="w-5 h-5 mr-2"/>
                        Back
                    </button>
                    <button wire:click="next" class="flex items-center font-medium underline transition-all duration-100 text-md w-50 text-primary hover:text-secondary hover:scale-110">
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
                    <a href="{{ route('enrollmentSER') }}" class="flex items-center justify-center px-4 py-1 text-sm text-gray-500 border border-gray-400 rounded-md hover:border-secondary hover:text-secondary">
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
</div>
