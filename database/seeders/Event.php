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
                'start_date' => '2023-07-31',
                'end_date' => '2023-08-19',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Registration Period',
                'start_date' => '2024-01-24',
                'end_date' => '2024-01-30',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Registration Period',
                'start_date' => '2024-06-25',
                'end_date' => '2024-06-29',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Late Registration',
                'start_date' => '2023-08-22',
                'end_date' => '2023-08-26',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Late Registration',
                'start_date' => '2024-01-31',
                'end_date' => '2024-02-03',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Late Registration',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-06',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Start of Classes',
                'start_date' => '2023-08-29',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Start of Classes',
                'start_date' => '2024-02-05',
                'end_date' => null,
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Start of Classes',
                'start_date' => '2024-07-01',
                'end_date' => null,
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Add-Drop Period',
                'start_date' => '2023-08-29',
                'end_date' => '2023-09-02',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Add-Drop Period',
                'start_date' => '2024-02-05',
                'end_date' => '2024-02-10',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Add-Drop Period',
                'start_date' => '2024-07-01',
                'end_date' => '2024-07-01',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Mid-Term Examinations',
                'start_date' => '2023-10-23',
                'end_date' => '2023-10-29',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Mid-Term Examinations',
                'start_date' => '2024-04-01',
                'end_date' => '2024-04-07',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Mid-Term Examinations',
                'start_date' => '2024-07-18',
                'end_date' => '2024-07-20',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Christmas Vacation',
            'start_date' => '2023-12-18',
            'end_date' => '2024-01-01',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'End of Classes',
                'start_date' => '2023-08-29',
                'end_date' => '2024-01-16',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'End of Classes',
                'start_date' => '2024-02-05',
                'end_date' => '2024-06-09',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'End of Classes',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-10',
                'created_at' => now(),
            ]
        ]);


        DB::table('events')->insert([
        [
            'semester_id' => 1,
            'event_name' => 'Final Examination',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ],
        [
            'semester_id' => 3,
            'event_name' => 'Final Examination',
            'start_date' => '2024-08-12',
            'end_date' => '2024-08-18',
            'created_at' => now(),
        ],

        ]);


        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Encoding of Grades',
                'start_date' => '2023-08-29',
                'end_date' => '2024-01-16',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Encoding of Grades',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-10',
                'created_at' => now(),
            ]
        ]);

        DB::table('events')->insert([
            [
                'semester_id' => 1,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'start_date' => '2023-08-29',
                'end_date' => '2024-01-16',
                'created_at' => now(),
            ],
            [
                'semester_id' => 2,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'start_date' => '2024-02-05',
                'end_date' => '2024-06-09',
                'created_at' => now(),
            ],
            [
                'semester_id' => 3,
                'event_name' => 'Last Day of Submitting Report of Grades',
                'start_date' => '2024-07-01',
                'end_date' => '2024-08-10',
                'created_at' => now(),
            ]
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
