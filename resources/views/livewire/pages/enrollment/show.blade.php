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

        {{-- Enrollment Step 1 --}}
        @if($step == 1)
            <div>
                {{-- <x-nav-link  href="{{ route('enrollmentSchedule') }}">
                    <button class="mt-8 w-50">Download Schedule</button>
                </x-nav-link > --}}
                <a href="{{ route('enrollmentSchedule') }}" class="flex items-center py-2 text-gray-500 rounded-md hover:border-secondary w-[10rem] justify-center border-gray-400 border hover:text-secondary">
                    <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                    Download
                </a>
                <livewire:pages.enrollment.schedule/>
                <div class="flex justify-end">
                    <x-primary-button wire:click="next" class="mt-8 w-50">Next</x-primary-button>
                </div>
            </div>

        {{-- Enrollment Step 2 --}}
        @elseif($step == 2)
            <div>
                <a href="{{ route('enrollmentFee') }}" class="flex items-center py-2 text-gray-500 rounded-md hover:border-secondary w-[10rem] justify-center border-gray-400 border hover:text-secondary">
                    <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                    Download
                </a>
                <livewire:pages.enrollment.fee/>
                <div class="flex justify-between">
                    <x-primary-button wire:click="back" class="mt-8 w-50">Back</x-primary-button>
                    <x-primary-button wire:click="next" class="mt-8 w-50">Next</x-primary-button>
                </div>
            </div>

        {{-- Enrollment Step 3 --}}
        @elseif($step == 3)
            <div>
                <a href="{{ route('enrollmentSER') }}" class="flex items-center py-2 text-gray-500 rounded-md hover:border-secondary w-[10rem] justify-center border-gray-400 border hover:text-secondary">
                    <x-icon name="arrow-down-tray" class="w-5 h-5 mr-2"/>
                    Download
                </a>
                <livewire:pages.enrollment.ser/>
                <x-primary-button wire:click="back" class="mt-8 w-50">Back</x-primary-button>
            </div>
        @endif
    </div>
</div>
