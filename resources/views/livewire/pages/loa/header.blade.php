<?php

use Livewire\Volt\Component;

use App\Models\StudentRecord;
use App\Models\LOARequest;
use App\Models\StudentTerm;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public StudentTerm $record;
    public string $studentStatus;
    public $loaStatus;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();


        // Fetch the latest record based on 'school_year' and 'term'.
        // Assume 'term' needs to be considered after 'school_year' for proper chronological order.
        $this->record = StudentTerm::where('student_no', $this->user->student_no)
            ->latest()
            ->first(); // Fetches the most recent record based on these fields

        // Assuming 'student_status' is a field in the User model
        $this->studentStatus = $this->record->student_type;

        // Fetch the LOA request status
        $loaRequest = LOARequest::where('student_no', $this->user->student_no)->first();
        $this->loaStatus = $loaRequest ? $loaRequest->status : null;
    }
}; ?>

<div class="flex items-center justify-between">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Leave of Absence Requests') }}
    </h2>
    <div class="flex items-center space-x-4">
         {{-- Student Request Status --}}
         @if (in_array($loaStatus, ['Pending', 'Approved', 'Rejected']))
            <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
                <p class="mr-2">{{ __("Status:") }}</p>
                <div class="w-3 h-3 rounded-full mr-1 {{ 
                    $loaStatus === 'Pending' ? 'bg-yellow-400' : (
                    $loaStatus === 'Approved' ? 'bg-green-600' : (
                    $loaStatus === 'Rejected' ? 'bg-red-600' : 'bg-gray-400'
                )) }}">
                </div>
                <span>{{ $loaStatus }}</span>
            </div>
        @endif
        {{-- Student Type --}}
        <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
            <p class="mr-2">{{ __("Student Type:") }}</p>
            <div class="w-3 h-3 rounded-full mr-1 {{ $studentStatus === 'Regular' ? 'bg-green-600' : 'bg-blue-400' }}">
            </div>
            <span>{{ ucwords($studentStatus ?? 'Regular') }}</span>
        </div>
    </div>
</div>