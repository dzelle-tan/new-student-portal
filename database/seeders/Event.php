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
            'semester_id' => 1,
            'event_name' => 'Registration Period',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Late Registration',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Start of Classes',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Add-Drop Period',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Mid-Term Examinations',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Christmas Vacation',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'End of Classes',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Final Examination',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Encoding of Grades',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Last Day of Submitting Report of Grades',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'University Foundation Anniversary',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 1,
            'event_name' => 'Araw ng Maynila',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        // ----------------------------------------

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Registration Period',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Late Registration',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Start of Classes',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Add-Drop Period',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Mid-Term Examinations',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Christmas Vacation',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'End of Classes',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Final Examination',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Encoding of Grades',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Last Day of Submitting Report of Grades',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'University Foundation Anniversary',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 2,
            'event_name' => 'Araw ng Maynila',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);



        // ----------------------------------------

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Registration Period',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Late Registration',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Start of Classes',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Add-Drop Period',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Mid-Term Examinations',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Christmas Vacation',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'End of Classes',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Final Examination',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);


        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Encoding of Grades',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Last Day of Submitting Report of Grades',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'University Foundation Anniversary',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);

        DB::table('events')->insert([
            'semester_id' => 3,
            'event_name' => 'Araw ng Maynila',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);
    }
}
