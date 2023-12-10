<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Event extends Seeder
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
                'event_name' => 'Encoding of schedule of classes for the next school term',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-12-04',
                'end_date' => '2024-01-13',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Encoding of schedule of classes for the next school term',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-03-11',
                'end_date' => '2024-04-26',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Encoding of schedule of classes for the next school term',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-08',
                'end_date' => '2024-08-09',
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
                'event_name' => 'Last day for graduasting students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2023-12-14',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last day for graduasting students to clear their defiences',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-05-10',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last day for graduasting students to clear their defiences',
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

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Encoding of Grades',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-01-10',
                'end_date' => '2024-01-24',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Encoding of Grades',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-12',
                'end_date' => '2024-06-18',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 2,
                'event_name' => 'Encoding of Grades',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-05-27',
                'end_date' => '2024-06-01',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Encoding of Grades',
                'student_status' => 'Non-Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-03',
                'end_date' => '2024-06-16',
                'created_at' => now(),
            ],
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-05',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-08-19',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);
        DB::table('events')->insert([
            [
                'semester_id' => 2,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-13',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'student_status' => 'Non-Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-20',
                'end_date' => null,
                'created_at' => now(),
            ],
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Last Day for College Faculty Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-07',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last Day for College Faculty Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-14',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last Day for College Faculty Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-08-22',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Last Day for Colleges to Submit Approved List of Candidates for Graduation to the Registrar\'s Office',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-09',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last Day for Colleges to Submit Approved List of Candidates for Graduation to the Registrar\'s Office',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-06-25',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last Day for Colleges to Submit Approved List of Candidates for Graduation to the Registrar\'s Office',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-08-23',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'University Foundation Anniversary',
            'start_date' => '2024-06-19',
            'end_date' => null,
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Araw ng Maynila',
            'start_date' => '2024-06-24',
            'end_date' => null,
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'University Council Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-15',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'University Council Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-19',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'University Council Meeting to Approve Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-09-12',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Board of Regents Meeting to Confirm Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-02-22',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Board of Regents Meeting to Confirm Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-07-25',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Board of Regents Meeting to Confirm Candidates for Graduation',
                'student_status' => 'Graduating',
                'student_type' => 'Undergraduate',
                'start_date' => '2024-09-19',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => '56th Commencement Exercises',
            'start_date' => '2024-09-05',
            'end_date' => '2024-09-07',
            'created_at' => now(),
        ]);
        // DB::table('events')->insert([
        //     'semester_id' => 1,
        //     'event_name' => 'University Foundation Anniversary',
        //     'start_date' => '2023-08-29',
        //     'end_date' => '2024-01-16',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 1,
        //     'event_name' => 'Araw ng Maynila',
        //     'start_date' => '2023-08-29',
        //     'end_date' => '2024-01-16',
        //     'created_at' => now(),
        // ]);

        // ----------------------------------------

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Registration Period',
        //     'start_date' => '2024-01-24',
        //     'end_date' => '2024-01-30',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Late Registration',
        //     'start_date' => '2024-01-31',
        //     'end_date' => '2024-02-03',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Start of Classes',
        //     'start_date' => '2024-02-05',
        //     'end_date' => null,
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Add-Drop Period',
        //     'start_date' => '2024-02-05',
        //     'end_date' => '2024-02-10',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Mid-Term Examinations',
        //     'start_date' => '2024-04-01',
        //     'end_date' => '2024-04-07',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Christmas Vacation',
        //     'start_date' => null,
        //     'end_date' => null,
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'End of Classes',
        //     'start_date' => '2024-02-05',
        //     'end_date' => '2024-06-09',
        //     'created_at' => now(),
        // ]);


        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Final Examination',
        //     'start_date' => '2024-02-05',
        //     'end_date' => '2024-06-09',
        //     'created_at' => now(),
        // ]);


        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Encoding of Grades',
        //     'start_date' => '2024-02-05',
        //     'end_date' => '2024-06-09',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 2,
        //     'event_name' => 'Last Day of Submitting Report of Grades',
        //     'start_date' => '2024-02-05',
        //     'end_date' => '2024-06-09',
        //     'created_at' => now(),
        // ]);




        // ----------------------------------------

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Registration Period',
        //     'start_date' => '2024-06-25',
        //     'end_date' => '2024-06-29',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Late Registration',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-07-06',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Start of Classes',
        //     'start_date' => '2024-07-01',
        //     'end_date' => null,
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Add-Drop Period',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-07-01',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Mid-Term Examinations',
        //     'start_date' => '2024-07-18',
        //     'end_date' => '2024-07-20',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Christmas Vacation',
        //     'start_date' => null,
        //     'end_date' => null,
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'End of Classes',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);


        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Final Examination',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);


        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Encoding of Grades',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Last Day of Submitting Report of Grades',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'University Foundation Anniversary',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);

        // DB::table('events')->insert([
        //     'semester_id' => 3,
        //     'event_name' => 'Araw ng Maynila',
        //     'start_date' => '2024-07-01',
        //     'end_date' => '2024-08-10',
        //     'created_at' => now(),
        // ]);
    }
}
