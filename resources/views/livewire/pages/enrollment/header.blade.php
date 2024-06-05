<?php

use Livewire\Volt\Component;

use App\Models\StudentTerm;
use Illuminate\Support\Facades\Auth;

new class extends Component {
    public StudentTerm $record;

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user();

        // Fetch the latest record based on 'school_year' and 'term'.
        // Assume 'term' needs to be considered after 'school_year' for proper chronological order.
        $this->record = StudentTerm::where('student_no', $this->user->student_no)
                        ->orderBy('aysem_id', 'desc')
                        ->with(['aysem', 'block.classes.course', 'block.classes.grades'])
                        ->first();
    }
}; ?>

<div class="flex items-center justify-between">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Enrollment') }}
    </h2>
    {{-- Student Enrollment Status --}}
    <div class="flex items-center p-1 px-4 text-sm border border-gray-300 rounded-md">
        <p class="mr-2">{{_("Status:")}}</p>
        <div class="{{ $record->enrolled !== 1 ? 'bg-yellow-400' : 'bg-green-600' }} w-3 h-3 rounded-full mr-1"></div>
        <span>{{ $record->enrolled !== 1 ? 'Enlisted' : 'Enrolled' }}</span>
    </div>
</div>