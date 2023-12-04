<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentViolation extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_violations')->insert([
            'student_id' => 1,
            'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
            'violation_date' => '2022-10-10',
            'offense_type' => 'Light Offense',
            'sm_reference' => '',
            'resolution' => 'Warning',
            'resolution_remarks' => 'Go to the OSDS Office',
            'resolution_date' => '2022-11-10',
            'status' => 'Closed',
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('student_violations')->insert([
            'student_id' => 2,
            'violation' => 'Unhygienic use of University facilities.',
            'violation_date' => '2023-09-16',
            'offense_type' => 'Light Offense',
            'sm_reference' => '', //not sure what this is
            'resolution' => '5 hours Community/Campus Service',
            'resolution_remarks' => 'Go to the OSDS Office',
            'resolution_date' => '', //no date yet if status is in progress
            'status' => 'In Progress',
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('student_violations')->insert([
            'student_id' => 1,
            'violation' => 'Loitering and/or making noise within the University premises resulting to the disturbance of classes, programs, convocation, or other activities and functions.',
            'violation_date' => '2023-11-10',
            'offense_type' => 'Light Offense',
            'sm_reference' => '', //not sure what this is
            'resolution' => '3 days to 5 days suspension',
            'resolution_remarks' => 'Go to the OSDS Office',
            'resolution_date' => '2022-11-13',
            'status' => 'Closed',
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('student_violations')->insert([
            'student_id' => 3,
            'violation' => 'Lending one’s ID card, using another person’s ID card, and other forms of misrepresentation of one’s identity within the University premises.',
            'violation_date' => '2022-09-01',
            'offense_type' => 'Less Grave Offense',
            'sm_reference' => '', //not sure what this is
            'resolution' => '6 days to 8 days suspension',
            'resolution_remarks' => 'Go to the OSDS Office',
            'resolution_date' => '2022-09-09',
            'status' => 'Closed',
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('student_violations')->insert([
            'student_id' => 4,
            'violation' => 'Unauthorized use of funds or property of any person, group, class, organization/ student council.  Failure to account for the appropriated funds.',
            'violation_date' => '2023-10-10',
            'offense_type' => 'Grave Offense',
            'sm_reference' => '', //not sure what this is
            'resolution' => '14 days to 25 days suspension',
            'resolution_remarks' => 'Go to the OSDS Office',
            'resolution_date' => '', //no date yet if status is in progress
            'status' => 'In Progress',
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);
    }
}
