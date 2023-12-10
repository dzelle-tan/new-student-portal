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
            [
                'student_id' => 1,
                'violation' => 'Non-wearing of the prescribed University Dress Code for school uniform.',
                'violation_date' => '2022-10-10',
                'count' => '1st Offense',
                'offense_type' => 'Light Offense',
                'type' => '3',
                'resolution' => 'Warning',
                'resolution_remarks' => 'Go to the OSDS Office',
                'resolution_date' => '2022-11-10',
                'status' => 'Closed',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_id' => 1,
                'violation' => 'Loitering and/or making noise within the University premises.',
                'violation_date' => '2023-12-11',
                'count' => '1st Offense',
                'offense_type' => 'Light Offense',
                'type' => '1',
                'resolution' => '5 hours Community Service',
                'resolution_remarks' => 'Go to the OSDS Office',
                'resolution_date' => '2023-12-15',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_id' => 2,
                'violation' => 'Unhygienic use of University facilities.',
                'violation_date' => '2023-09-16',
                'count' => '1st Offense',
                'offense_type' => 'Light Offense',
                'type' => '4',
                'resolution' => '5 hours Community/Campus Service',
                'resolution_remarks' => 'Go to the OSDS Office',
                'resolution_date' => '2022-11-13',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'student_id' => 3,
                'violation' => 'Lending one’s ID card.',
                'violation_date' => '2022-09-01',
                'count' => '1st Offense',
                'offense_type' => 'Less Grave Offense',
                'type' => '4', 
                'resolution' => '6 days to 8 days suspension',
                'resolution_remarks' => 'Go to the OSDS Office',
                'resolution_date' => '2022-09-09',
                'status' => 'Closed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 4,
                'violation' => 'Unauthorized use of funds or property of any person, group, class, organization/ student council.',
                'violation_date' => '2023-10-10',
                'count' => '1st Offense',
                'offense_type' => 'Grave Offense',
                'type' => '4',
                'resolution' => '14 days to 25 days suspension',
                'resolution_remarks' => 'Go to the OSDS Office',
                'resolution_date' => '2022-11-13',
                'status' => 'In Progress',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
