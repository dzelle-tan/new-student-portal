<?php

namespace App\Http\Controllers;

use App\Models\StudentRecord;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EnrollmentDownloadsController extends Controller
{
    public $user;
    public $fee;
    public $record;
    public $grades;

    public function downloadSchedule()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('grade', 'grade.classes')
            ->latest()
            ->first();

        $pdf = Pdf::loadView('livewire.enrollment.downloadables.enrollment-schedule-pdf', [
            'user' => $this->user,
            'record' => $this->record
        ]);
        return $pdf->download('schedule-pdf.pdf');
        // return $pdf->stream();
    }

    public function downloadFee()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('fee')
            ->latest()
            ->first();

        $pdf = Pdf::loadView('livewire.enrollment.downloadables.enrollment-fee-pdf', ['record' => $this->record]);
        return $pdf->download('fee-pdf.pdf');
        // return $pdf->stream();
    }


    public function downloadSER()
    {
        $this->user = Auth::user();
        $this->record = StudentRecord::where('student_id', $this->user->id)
            ->with('fee','grade', 'grade.classes')
            ->latest()
            ->first();

        $pdf = Pdf::loadView('livewire.enrollment.downloadables.enrollment-SER-pdf', [
            'user' => $this->user,
            'record' => $this->record
        ]);

        $this->record->update([
            'status' => 'enrolled'
        ]);
        return $pdf->download('SER-pdf.pdf');

        // return $pdf->stream();
    }
}
