<?php

namespace App\Charts;

use App\Models\StudentTerm;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class GradesChart
{
    protected $chart;
    protected $studentId;
    protected $gwas;

    public function __construct(LarapexChart $chart, $studentId = null)
    {
        $this->chart = $chart;
        $this->studentId = $studentId ?? Auth::id();  
        $this->gwas = collect(); 
    }

    // Update the GWA for each academic year
    public function updateAcademicYearGWAs(): void
    {
        $terms = StudentTerm::where('student_no', $this->studentId)
            ->with(['block.classes.grades', 'block.classes.course', 'aysem'])
            ->get();

        foreach ($terms as $term) {
            $totalUnits = 0;
            $totalGradePoints = 0;

            foreach ($term->block->classes as $class) {
                foreach ($class->grades as $grade) {
                    $totalUnits += $class->course->units;
                    $totalGradePoints += $class->course->units * $grade->grade;
                }
            }

            if ($totalUnits > 0) {
                $gwa = round($totalGradePoints / $totalUnits, 2);
            } else {
                $gwa = 0; // Handle division by zero if no classes or no grades available
            }

            // Store the GWA and corresponding term details
            $this->gwas->push([
                'gwa' => $gwa,
                'academic_year' => $term->aysem->academic_year_code,
                'semester' => $term->aysem->semester
            ]);
        }
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $this->updateAcademicYearGWAs();

        // Extract GWAs and labels for the chart
        $gwas = $this->gwas->pluck('gwa')->all();
        $labels = $this->gwas->map(function ($gwa) {
            return $gwa['academic_year'] . '-' . $gwa['semester'];
        })->all();

        return $this->chart->lineChart()
            ->addData('GWA', $gwas)
            ->setXAxis($labels)
            ->setHeight(200)
            ->setColors(['#ab830f', '#ff6384']);
    }
}
