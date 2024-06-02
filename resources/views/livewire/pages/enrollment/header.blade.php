<?php

use Livewire\Volt\Component;

use App\Models\StudentRecord;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public StudentRecord $record;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();

        // Fetch the latest record based on 'school_year' and 'term'.
        // Assume 'term' needs to be considered after 'school_year' for proper chronological order.
        $this->record = StudentRecord::where('student_no', $this->user->student_no)
            ->orderBy('school_year', 'desc') // First order by 'school_year'
            ->orderBy('semester', 'desc')       // Then order by 'term' within the same 'school_year'
            ->first(); // Fetches the most recent record based on these fields
    }
}; ?>

<div class="flex items-center justify-between">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Enrollment') }}
    </h2>
    <div class="flex items-center space-x-4">
        {{-- Student Enrollment Status --}}
        <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
            <p class="mr-2">{{ _("Status:") }}</p>
            <div
                class="w-3 h-3 rounded-full mr-1 {{ $record->status !== 'Enrolled' ? 'bg-yellow-400' : 'bg-green-600' }}">
            </div>
            <span>{{ ucwords($record->status ?? 'Enlisted') }}</span>
        </div>
        {{-- Student Type --}}
        <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
            <p class="mr-2">{{ __("Student Type:") }}</p>
            <div class="w-3 h-3 rounded-full mr-1 bg-blue-400"></div> {{-- Default to blue for display only --}}
            <span>{{ ucwords('Regular') }}</span> {{-- Static text 'Regular' for display --}}
        </div>
    </div>
</div>