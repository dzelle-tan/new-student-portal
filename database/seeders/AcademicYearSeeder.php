<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of years from 1965 to 2023
        $years = range(1965, 2023);

        // Array of start and end dates for each year
        $startDates = [];
        $endDates = [];

        // Loop through each year
        foreach ($years as $year) {
            // Set the start date to September 1st of the year
            $startDate = $year . '-09-01';
            // Set the end date to June 30th of the next year
            $endDate = ($year + 1) . '-06-30';

            // Add the start and end dates to their respective arrays
            $startDates[] = $startDate;
            $endDates[] = $endDate;
        }

        // Create academic years with the start and end dates
        for ($i = 0; $i < count($years); $i++) {
            // Create the academic year and store it
            $academicYear = \App\Models\AcademicYear::create([
                'academic_year_code' => $years[$i] . '-' . ($years[$i] + 1),
                'date_start' => $startDates[$i],
                'date_end' => $endDates[$i],
            ]);
            
            // 1st semester
            \App\Models\Aysem::create([
                'academic_year_id' => $academicYear->id,
                'semester_index' => 1,
                'date_start' => $startDates[$i],
                'date_end' => $year . '-02-01',
            ]);

            // 2nd semester
            \App\Models\Aysem::create([
                'academic_year_id' => $academicYear->id,
                'semester_index' => 2,
                'date_start' => $year . '-02-20',
                'date_end' => $endDates[$i],
            ]);
        }
    }
}
