<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SfeDate extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sfe_dates')->insert([
            'category' => 'Undergraduate Professional',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-05-29 08:00:00',
            'end_date' => '2023-06-12 23:58:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_dates')->insert([
            'category' => 'Graduate School - Semestral',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-05-29 08:00:00',
            'end_date' => '2023-06-12 23:58:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_dates')->insert([
            'category' => 'Graduate School - Trimestral',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-09-18 08:00:00',
            'end_date' => '2023-09-30 23:58:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_dates')->insert([
            'category' => 'College of Law',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-05-29 08:00:00',
            'end_date' => '2023-06-12 23:58:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_dates')->insert([
            'category' => 'College of Medicine',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-05-15 08:00:00',
            'end_date' => '2023-06-11 23:58:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_dates')->insert([
            'category' => 'Graduating',
            'sem' => '2nd',
            'academic_year' => '2022-2023',
            'start_date' => '2023-05-22 08:00:00',
            'end_date' => '2023-06-04 08:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
