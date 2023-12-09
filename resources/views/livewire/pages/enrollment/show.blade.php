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
                        ->latest()
                        ->first();

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
    
    <div class="p-4 pt-3 bg-white sm:p-8 sm:pt-6 sm:rounded-md">
        <img src="{{ asset('images/plm-logo-with-header.png') }}" alt="PLM logo" class="h-16">

        {{-- Student Enrollment Status --}}
        <div>
            <x-info-label class="text-left w-28 first-letter:">{{_("Status:")}}</x-info-label>
            <span>{{ $record->status }}</span>
        </div>

        {{-- Enrollment Step 1 --}}
        @if($step == 1)
            <div>
                <x-nav-link  href="{{ route('enrollmentSchedule') }}">
                    <x-primary-button class="mt-8 w-50">Download Schedule</x-primary-button>
                </x-nav-link >
                <livewire:pages.enrollment.schedule/>
                <x-primary-button wire:click="next" class="mt-8 w-50">Next</x-primary-button>
            </div>

        {{-- Enrollment Step 2 --}}
        @elseif($step == 2)
            <div>
                <x-nav-link  href="{{ route('enrollmentFee') }}">
                    <x-primary-button class="mt-8 w-50">Download Fees</x-primary-button>
                </x-nav-link >
                <livewire:pages.enrollment.fee/>
                <x-primary-button wire:click="next" class="mt-8 w-50">Next</x-primary-button>
                <x-primary-button wire:click="back" class="mt-8 w-50">Back</x-primary-button>
            </div>

        {{-- Enrollment Step 3 --}}
        @elseif($step == 3)
            <div>
                <x-nav-link  href="{{ route('enrollmentSER') }}">
                    <x-primary-button class="mt-8 w-50">Download SER</x-primary-button>
                </x-nav-link >
                <livewire:pages.enrollment.ser/>
                <x-primary-button wire:click="back" class="mt-8 w-50">Back</x-primary-button>
            </div>
        @endif
    </div>
</div>
