<?php

use Livewire\Volt\Component;

use App\Models\StudentRecord;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public StudentRecord $record;
    public string $studentStatus;

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
            ->orderBy('semester', 'desc')    // Then order by 'term' within the same 'school_year'
            ->first(); // Fetches the most recent record based on these fields

        // Assuming 'student_status' is a field in the User model
        $this->studentStatus = $this->user->student_status;
    }
}; ?>

<div class="flex items-center justify-between">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Leave of Absence Requests') }}
    </h2>
    <div class="flex items-center space-x-4">
        {{-- Student Request Status --}}
        <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
            <p class="mr-2">{{ _("Status:") }}</p>
            <div class="w-3 h-3 rounded-full mr-1 bg-yellow-400">
            </div> <!-- To display status dynamically, add from model the status from LOA requests table -->
            <span>{{ _("Pending") }}</span>
        </div>
        {{-- Student Type --}}
        <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
            <p class="mr-2">{{ __("Student Type:") }}</p>
            <div class="w-3 h-3 rounded-full mr-1 {{ $studentStatus === 'Regular' ? 'bg-green-600' : 'bg-blue-400' }}">
            </div>
            <span>{{ ucwords($studentStatus ?? 'Regular') }}</span>
        </div>
    </div>
</div>