<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ShiftingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SelectProgram extends Component
{
    public $student_no;
    public $programs;
    public $selectedProgram = '';
    public $message = '';
    public $isDisabled = false;

    public function mount()
    {
        $student = Auth::user();
        $this->student_no = $student->student_no;
        $currentProgram = $student->degree_program;
    
        // Define the predefined courses
        $this->programs = collect([
            'Bachelor of Science in Computer Science',
            'Bachelor of Science in Computer Engineering',
            'Bachelor of Science in Information Technology',
        ]);
    
        // Filter out the current program
        $this->programs = $this->programs->filter(function ($program) use ($currentProgram) {
            return $program !== $currentProgram;
        })->values();  // Ensure the collection is re-indexed
    
        $existingRequest = ShiftingRequest::where('student_no', $this->student_no)->first();
        if ($existingRequest && $existingRequest->is_finalized) {
            $this->selectedProgram = $existingRequest->new_degree_program;
            $this->message = 'You have already finalized your program selection.';
            $this->isDisabled = true;
        }

        Log::info('Mounted with selected program: ' . $this->selectedProgram);
    }

    public function saveNewProgram()
    {
        Log::info('Attempting to save new program: ' . $this->selectedProgram);

        if (empty($this->selectedProgram)) {
            Log::warning('No program selected. Cannot save.');
            $this->message = 'Please select a program before submitting.';
            return;
        }

        $shiftingRequest = ShiftingRequest::firstOrNew([
            'student_no' => $this->student_no
        ]);

        $shiftingRequest->new_degree_program = $this->selectedProgram;
        $shiftingRequest->status = 'Pending'; // Set an initial status
        $shiftingRequest->save();

        $this->message = 'Program successfully selected.';

        Log::info('Program saved successfully with new degree program: ' . $this->selectedProgram);
    }

}
