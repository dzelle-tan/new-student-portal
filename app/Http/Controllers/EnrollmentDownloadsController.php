<?php

namespace App\Http\Controllers;

use App\Models\StudentRecord;
use App\Models\StudentTerm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EnrollmentDownloadsController extends Controller
{
    public $user;
    public $fee;
    public $record;

    public function downloadSchedule()
    {
        $this->user = Auth::user();
        $this->record = StudentTerm::where('student_no', $this->user->student_no)
                    ->with([
                        'block.classes.course',
                        'block.classes.classSchedules.classMode',
                        'block.classes.classSchedules.room.building'
                    ])
                    ->orderBy('aysem_id', 'desc')
                    ->first();

        $pdf = Pdf::loadView('livewire.pages.enrollment.downloadables.enrollment-schedule-pdf', [
            'user' => $this->user,
            'record' => $this->record
        ]);
        return $pdf->download('schedule-pdf.pdf');
        // return $pdf->stream();
    }

    public function downloadFee()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_no', $this->user->student_no)
            ->with('fee')
            ->orderBy('school_year', 'desc') // First order by 'school_year'
            ->orderBy('semester', 'desc')       // Then order by 'term' within the same 'school_year'
            ->first(); // Fetches the most recent record based on these fields

        $pdf = Pdf::loadView('livewire.pages.enrollment.downloadables.enrollment-fee-pdf', ['record' => $this->record]);
        return $pdf->download('fee-pdf.pdf');
        // return $pdf->stream();
    }


    public function downloadSER()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_no', $this->user->student_no)
            ->with('fee', 'classes')
            ->orderBy('school_year', 'desc') // First order by 'school_year'
            ->orderBy('semester', 'desc')       // Then order by 'term' within the same 'school_year'
            ->first(); // Fetches the most recent record based on these fields

        $pdf = Pdf::loadView('livewire.pages.enrollment.downloadables.enrollment-SER-pdf', [
            'user' => $this->user,
            'record' => $this->record
        ]);

        if ($this->record->date_enrolled === null) {
            $this->record->update([
                'status' => 'Enrolled',
                'date_enrolled' => now()
            ]);
        } else {
            $this->record->update([
                'status' => 'Enrolled'
            ]);
        }
    
        return $pdf->download('SER-pdf.pdf');

        // return $pdf->stream();
    }
}
