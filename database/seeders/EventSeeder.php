<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Registration Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-07-31',
                'end_date' => '2023-08-19',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Registration Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-01-24',
                'end_date' => '2024-01-30',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Registration Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-25',
                'end_date' => '2024-06-29',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Late Registration',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-08-22',
                'end_date' => '2023-08-26',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Late Registration',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-01-31',
                'end_date' => '2024-02-03',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Late Registration',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-06',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Start of Classes',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-08-29',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Start of Classes',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-05',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Start of Classes',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-01',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-08-29',
                'end_date' => '2023-09-02',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-05',
                'end_date' => '2024-02-10',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-06',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Deadline for Filing of Candidacy for Graduation/Academic Honors with the College',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-10-13',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Deadline for Filing of Candidacy for Graduation/Academic Honors with the College',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-03-08',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Deadline for Filing of Candidacy for Graduation/Academic Honors with the College',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-15',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Mid-Term Examinations',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-10-23',
                'end_date' => '2023-10-29',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Mid-Term Examinations',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-07',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Mid-Term Examinations',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-18',
                'end_date' => '2024-07-20',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-12-14',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-05-10',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-24',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Christmas Vacation',
            'student_type' => 'Undergraduate',
            'start_date' => '2023-12-18',
            'end_date' => '2024-01-01',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'End of Classes',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-01-08',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'End of Classes',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-08-04',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 2,
                'event_name' => 'End of Classes',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-05-25',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'End of Classes',
                'student_status' => 'Non-Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-02',
                'end_date' => null,
                'created_at' => now(),
            ],
        ]);

        DB::table('events')->insert([
        [
            'semester_id' => 1,
            'event_name' => 'Final Examination',
            'student_Type' => 'Undergraduate',
            'start_date' => '2023-01-10',
            'end_date' => '2023-01-16',
            'created_at' => now(),
        ],
        [
            'semester_id' => 3,
            'event_name' => 'Final Examination',
            'student_Type' => 'Undergraduate',
            'start_date' => '2024-08-08',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ],
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 2,
                'event_name' => 'Final Examination',
                'student_status' => 'Graduating',
                'student_Type' => 'Undergraduate',
                'start_date' => '2024-05-27',
                'end_date' => '2024-06-01',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Final Examination',
                'student_status' => 'Non-Graduating',
                'student_Type' => 'Undergraduate',
                'start_date' => '2024-06-03',
                'end_date' => '2024-06-09',
                'created_at' => now(),
            ],
        ]);



        // -------------------------------------------------------------------------- Grad School -------------------------------------------------------------------

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Registration Period',
                'student_type' => 'Graduate',
                'start_date' => '2023-09-04',
                'end_date' => '2023-09-09',
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Registration Period',
                'student_type' => 'Graduate',
                'start_date' => '2024-01-15',
                'end_date' => '2024-01-20',
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Registration Period',
                'student_type' => 'Graduate',
                'start_date' => '2024-05-06',
                'end_date' => '2024-05-11',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Late Registration',
                'student_type' => 'Graduate',
                'start_date' => '2023-09-18',
                'end_date' => '2023-09-23',
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Late Registration',
                'student_type' => 'Graduate',
                'start_date' => '2024-01-22',
                'end_date' => '2024-01-27',
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Late Registration',
                'student_type' => 'Graduate',
                'start_date' => '2024-05-13',
                'end_date' => '2024-05-18',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Start of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2023-09-18',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Start of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2024-01-22',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Start of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2024-05-13',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Graduate',
                'start_date' => '2023-09-18',
                'end_date' => '2023-09-23',
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Graduate',
                'start_date' => '2024-01-22',
                'end_date' => '2024-01-27',
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Add-Drop Period',
                'student_type' => 'Graduate',
                'start_date' => '2024-05-13',
                'end_date' => '2024-05-18',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Deadline for Graduating Students to File Candidacy for Graduation for the Current Term',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2023-11-17',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Deadline for Graduating Students to File Candidacy for Graduation for the Current Term',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2024-03-22',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Deadline for Graduating Students to File Candidacy for Graduation for the Current Term',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2024-07-19',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2023-12-15',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2024-04-12',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'Last day for graduating students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Graduate',
                'start_date' => '2024-08-09',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            'semester_id' => 4,
            'event_name' => 'Christmas Vacation',
            'student_type' => 'Graduate',
            'start_date' => '2023-12-17',
            'end_date' => '2024-01-01',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 4,
                'event_name' => 'End of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2024-01-07',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 5,
                'event_name' => 'End of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2024-04-28',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 6,
                'event_name' => 'End of Classes',
                'student_type' => 'Graduate',
                'start_date' => '2024-08-18',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);


        DB::table('events')->insert([
        [
            'semester_id' => 4,
            'event_name' => 'Final Examination',
            'student_type' => 'Graduate',
            'start_date' => '2023-01-08',
            'end_date' => '2023-01-14',
            'created_at' => now(),
        ],
        [
            'semester_id' => 5,
            'event_name' => 'Final Examination',
            'student_type' => 'Graduate',
            'start_date' => '2024-04-29',
            'end_date' => '2024-05-05',
            'created_at' => now(),
        ],
        [
            'semester_id' => 6,
            'event_name' => 'Final Examination',
            'student_type' => 'Graduate',
            'start_date' => '2024-08-19',
            'end_date' => '2024-08-25',
            'created_at' => now(),
        ],

        ]);

    }
}
