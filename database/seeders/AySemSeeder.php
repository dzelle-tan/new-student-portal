<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AysemSeeder extends Seeder
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
            // 1st semester
            \App\Models\Aysem::create([
                'academic_year' => $year,
                'semester' => 1,
                'date_start' => $year . '-09-01',
                'date_end' => ($year + 1) . '-2-01',
            ]);

            // 2nd semester
            \App\Models\Aysem::create([
                'academic_year' => $year,
                'semester' => 2,
                'date_start' => ($year + 1) . '-2-20',
                'date_end' => ($year + 1) . '-6-30',
            ]);
        }
    }
}
