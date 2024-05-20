<?php

namespace App\Charts;

use App\Models\StudentRecord;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class GradesChart
{
    protected $chart;
    protected $studentId;

    public function __construct(LarapexChart $chart, $studentId = null)
    {
        $this->chart = $chart;
        $this->studentId = $studentId ?? Auth::id();  // Default to authenticated user if no ID is provided
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        // Fetch GWAs for the student where the status is 'Completed'
        $records = StudentRecord::where('student_id', $this->studentId)
                                 ->where('status', 'Completed') // Only include records with 'Completed' status
                                 ->orderBy('school_year')
                                 ->orderBy('semester')
                                 ->get(['gwa', 'school_year', 'semester']);

        $gwas = $records->pluck('gwa')->all();
        $labels = $records->map(function ($record) {
            return $record->school_year . '-' . $record->semester;
        })->all();

        return $this->chart->lineChart()
            ->addData('GWA', $gwas)
            ->setXAxis($labels)
            ->setHeight(200)
            ->setColors(['#ab830f', '#ff6384']);
    }
}