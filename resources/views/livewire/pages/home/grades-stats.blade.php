<?php

use App\Models\StudentTerm;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public $studentId;
    public $gwas;
    public $labels;
    
    public function mount(): void
    {
        $this->studentId = $studentId ?? Auth::id();  
        $this->gwas = collect(); 

        $this->updateAcademicYearGWAs();

        // Extract GWAs and labels for the chart
        $gwas = $this->gwas->pluck('gwa')->all();
        $labels = $this->gwas->map(function ($gwa) {
            return $gwa['academic_year'] . '-' . $gwa['semester'];
        })->all();

        // asort($gwas); // Add this line to sort the GWAs in ascending order
        
        $this->gwas = $gwas;
        $this->labels = $labels;
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
    
};
?>

<div>
    <h3 class="text-lg font-medium">{{__("General Weighted Average (GWA)")}}</h3>
    <div id="chart"></div>
    <p class="italic text-center">School Year - Term</p>
</div>
<script>
    var labels = @json($labels);
    var gwas = @json($gwas);
    
    var options = {
        series: [{
        name: "GWAS",
        data: gwas,
        color: '#ab830f'
    }],
        chart: {
        height: 200,
        type: 'line',
        zoom: {
        enabled: false
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'straight'
    },
    grid: {
        row: {
        colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
        opacity: 0.5
        },
    },
    xaxis: {
        categories: labels,
    },
    yaxis: {
        reversed: true, // Add this line to reverse the y-axis
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>