<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentViolationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_violations')->insert([
            [
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'violation_date' => now(),
                'sm_reference' => '3',
                'resolution' => 'Warning',
                'resolution_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'student_no' => 202310001, // Replace with actual student number
                'offense_type_id' => 1, // Replace with actual offense type ID
            ],
            [
                'violation' => 'Loitering and/or making noise within the University premises.',
                'violation_date' => now(),
                'sm_reference' => '1',
                'resolution' => 'Warning',
                'resolution_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'student_no' => 202310001, // Replace with actual student number
                'offense_type_id' => 1, // Replace with actual offense type ID
            ],
            [
                'violation' => 'Unhygienic use of University facilities.',
                'violation_date' => now(),
                'sm_reference' => '4',
                'resolution' => 'Warning',
                'resolution_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
                'student_no' => 202310001, // Replace with actual student number
                'offense_type_id' => 1, // Replace with actual offense type ID
            ],
        ]);
    }
}
