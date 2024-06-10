<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentRecord;
use App\Models\Student;
use App\Models\StudentTerm;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class GradesDownloadController extends Controller
{
    public $selectedTerm = "All";
    public $totalUnits = 0;
    public Collection $terms;
    public Student $user;
    public $totalGradePoints = 0;
    public $programTitle;
    public $registrationStatus;
    public $studentType;

    public function downloadGrades()
    {
        $this->user = Auth::user();
        $this->getAcademicYear();
        $this->getLatestProgramTitle();
        $this->selectedTerm = session('selectedTerm', 'All');

        $latestTerm = $this->user->terms()->latest()->first();

        if ($latestTerm) {
            $this->registrationStatus = $latestTerm->registrationStatus->registration_status ?? 'N/A';
            $this->studentType = $latestTerm->student_type ?? 'N/A';
        } else {
            $this->registrationStatus = 'N/A';
            $this->studentType = 'N/A';
        }

        $pdf = Pdf::loadView('livewire.pages.grades.grades-pdf', [
            'user' => $this->user,
            'terms' => $this->terms,
            'programTitle' => $this->programTitle,
            'registrationStatus' => $this->registrationStatus,
            'studentType' => $this->studentType,
            'selectedTerm' => $this->selectedTerm,
            'totalUnits' => $this->totalUnits,
            'totalGradePoints' => $this->totalGradePoints,
        ]);
        return $pdf->download('grades-pdf.pdf');
    }

    public function getAcademicYear(): void
    {
        // Fetch the terms taken by the student with aysem, block, classes, and grades details
        $this->terms = $this->user->terms()
            ->with(['aysem', 'block.classes.grades', 'block.classes.course'])
            ->orderBy('id', 'desc')->get();

    }

    // Fetches the program titles associated with the student's terms
    public function getLatestProgramTitle(): void
    {
        // Fetch the student's program
        $latestTerm = $this->user->terms()->latest('id')->with('program')->first();
        if ($latestTerm) {
            $this->programTitle = $latestTerm->program->program_title;
        } else {
            $this->programTitle = "No Program Found";
        }
    }
}
