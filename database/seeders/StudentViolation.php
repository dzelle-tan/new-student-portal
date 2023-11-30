<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentViolation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_violations')->insert([
            'id' => 1,
            'student_id' => 1,
            'violation' => 'Improper Uniform Attire',
            'violation_date' => '',
            'offense_type' => 'Programming Languages (LAB)',
            'sm_reference' => '',
            'resolution' => 'MWF',
            'resolution_remarks' => '14:00:00',
            'resolution_date' => '17:00:00',
            'status' => 'Gusaling Villegas',
            'created_at' => 'GV306',
            'updated_at' => 'GV306',
        ]);

        DB::table('student_violations')->insert([
            'id' => 1,
            'student_id' => 1,
            'violation' => 'Improper Uniform Attire',
            'violation_date' => '',
            'offense_type' => 'Programming Languages (LAB)',
            'sm_reference' => 3,
            'resolution' => 'MWF',
            'resolution_remarks' => '14:00:00',
            'resolution_date' => '17:00:00',
            'status' => 'Gusaling Villegas',
            'created_at' => 'GV306',
            'updated_at' => 'GV306',
        ]);

        DB::table('student_violations')->insert([
            'id' => 1,
            'student_id' => 1,
            'violation' => 'Improper Uniform Attire',
            'violation_date' => '',
            'offense_type' => 'Programming Languages (LAB)',
            'sm_reference' => 3,
            'resolution' => 'MWF',
            'resolution_remarks' => '14:00:00',
            'resolution_date' => '17:00:00',
            'status' => 'Gusaling Villegas',
            'created_at' => 'GV306',
            'updated_at' => 'GV306',
        ]);

        DB::table('student_violations')->insert([
            'id' => 1,
            'student_id' => 1,
            'violation' => 'Improper Uniform Attire',
            'violation_date' => '',
            'offense_type' => 'Programming Languages (LAB)',
            'sm_reference' => 3,
            'resolution' => 'MWF',
            'resolution_remarks' => '14:00:00',
            'resolution_date' => '17:00:00',
            'status' => 'Gusaling Villegas',
            'created_at' => 'GV306',
            'updated_at' => 'GV306',
        ]);


        DB::table('student_violations')->insert([
            'id' => 1,
            'student_id' => 1,
            'violation' => 'Improper Uniform Attire',
            'violation_date' => '',
            'offense_type' => 'Programming Languages (LAB)',
            'sm_reference' => 3,
            'resolution' => 'MWF',
            'resolution_remarks' => '14:00:00',
            'resolution_date' => '17:00:00',
            'status' => 'Gusaling Villegas',
            'created_at' => 'GV306',
            'updated_at' => 'GV306',
        ]);
    }
}
