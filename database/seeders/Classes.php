<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Classes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert multiple class records
        DB::table('classes')->insert([
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0314.1',
                'section' => 2,
                'name' => 'Operating System (Lab)',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0315.1',
                'section' => 2,
                'name' => 'Intelligent System (Lab)',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0311',
                'section' => 2,
                'name' => 'Automata Theory and Formal Languages',
                'units' => 3,
                'day' => 'Tuesday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0315',
                'section' => 2,
                'name' => 'Intelligent System (Lec)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0312.1',
                'section' => 2,
                'name' => 'Programming Languages (Lab)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0314',
                'section' => 2,
                'name' => 'Operating System (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0313',
                'section' => 2,
                'name' => 'Software Engineering (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0313.1',
                'section' => 2,
                'name' => 'Software Engineering (Lab)',
                'units' => 1,
                'day' => 'Thursday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 1',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 4,
                'professor_id' => 1,
                'code' => 'CSC 0312',
                'section' => 2,
                'name' => 'Programming Languages (Lec)',
                'units' => 2,
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
// -----------------------------------------------

            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0314.1',
                'section' => 2,
                'name' => 'Badminton',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0315.1',
                'section' => 2,
                'name' => 'The Entrepreneurial Mind',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0311',
                'section' => 2,
                'name' => 'Algorithm and Complexity',
                'units' => 3,
                'day' => 'Tuesday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0315',
                'section' => 2,
                'name' => 'Information Assurance Security',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0312.1',
                'section' => 2,
                'name' => 'Environmental Science',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0314',
                'section' => 2,
                'name' => 'Applications Development and Emerging Technologies (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0313',
                'section' => 2,
                'name' => 'Applications Development and Emerging Technologies (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0313.1',
                'section' => 2,
                'name' => 'Architecture and Organization (Lab)',
                'units' => 1,
                'day' => 'Thursday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 1',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0312',
                'section' => 2,
                'name' => 'Architecture and Organization (Lec)',
                'units' => 2,
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],

// -------------------------------------------

            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0314.1',
                'section' => 2,
                'name' => 'Human Computer Interaction',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0315.1',
                'section' => 2,
                'name' => 'Discrete Structures 2',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0311',
                'section' => 2,
                'name' => 'The Contemporary World',
                'units' => 3,
                'day' => 'Tuesday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0315',
                'section' => 2,
                'name' => 'Readings in Philippine History',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0312.1',
                'section' => 2,
                'name' => 'Life and Works of Rizal',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0314',
                'section' => 2,
                'name' => 'Data Structures and Algorithms (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0313',
                'section' => 2,
                'name' => 'Data Structures and Algorithms (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0313.1',
                'section' => 2,
                'name' => 'Intermediate Programming (Lab)',
                'units' => 1,
                'day' => 'Thursday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 1',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0312',
                'section' => 2,
                'name' => 'Intermediate Programming (Lec)',
                'units' => 2,
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // -------------------------------------------

            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0314.1',
                'section' => 2,
                'name' => 'Foundation of Physical Activities',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0315.1',
                'section' => 2,
                'name' => 'Science, Technology and Society',
                'units' => 1,
                'day' => 'Monday',
                'start_time' => '13:00:00',
                'end_time' => '16:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0311',
                'section' => 2,
                'name' => 'Purposive Communication',
                'units' => 3,
                'day' => 'Tuesday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 4',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0315',
                'section' => 2,
                'name' => 'Mathematics in the Modern World',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0312.1',
                'section' => 2,
                'name' => 'Discrete Structures 1',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '14:00:00',
                'end_time' => '17:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0314',
                'section' => 2,
                'name' => 'Fundamentals of Programming (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0313',
                'section' => 2,
                'name' => 'Fundamentals of Programming (Lec)',
                'units' => 2,
                'day' => 'Thursday',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0313.1',
                'section' => 2,
                'name' => 'Introduction to Computing (Lab)',
                'units' => 1,
                'day' => 'Thursday',
                'start_time' => '18:00:00',
                'end_time' => '21:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Comp. Lab 1',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_record_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0312',
                'section' => 2,
                'name' => 'Introduction to Computing (Lec)',
                'units' => 2,
                'day' => 'Friday',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => '',
                'room' => 'MS Teams',
                'type' => 'online',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);


        //  DB::table('classes')->insert([
        //     'student_id' => 2,
        //     'professor_id' => 1,
        //     'code' => 'CSC 0314',
        //     'section' => 1,
        //     'name' => 'Operating System (LEC)',
        //     'units' => 3,
        //     'day' => 'MWF',
        //     'start_time' => '13:00:00',
        //     'end_time' => '15:00:00',
        //     'building' => 'Gusaling Lacson',
        //     'room' => 'GL 311',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 2,
        //     'professor_id' => 2,
        //     'code' => 'CSC 0312',
        //     'section' => 2,
        //     'name' => 'Programming Languages (LEC)',
        //     'units' => 3,
        //     'day' => 'MWF',
        //     'start_time' => '13:00:00',
        //     'end_time' => '15:00:01',
        //     'building' => 'Gusaling Lacson',
        //     'room' => 'GL304',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 2,
        //     'professor_id' => 3,
        //     'code' => 'CSC 0315',
        //     'section' => 3,
        //     'name' => 'Intelligent System (LEC)',
        //     'units' => 3,
        //     'day' => 'MTWTHFS',
        //     'start_time' => '12:00:00',
        //     'end_time' => '14:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'Computer Laboratory 3',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 2,
        //     'professor_id' => 4,
        //     'code' => 'CSC 0313',
        //     'section' => 4,
        //     'name' => 'Software Engineering (LEC)',
        //     'units' => 3,
        //     'day' => 'MF',
        //     'start_time' => '16:00:00',
        //     'end_time' => '18:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'Computer Laboratory 3',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 3,
        //     'professor_id' => 1,
        //     'code' => 'CSC 0212',
        //     'section' => 1,
        //     'name' => 'Object Oriented Programming (LEC)',
        //     'units' => 3,
        //     'day' => 'MWF',
        //     'start_time' => '07:00:00',
        //     'end_time' => '09:00:01',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'GV304',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 3,
        //     'professor_id' => 2,
        //     'code' => 'CSC 0213',
        //     'section' => 2,
        //     'name' => 'Logic Design and Digital Computer Circuits (LEC)',
        //     'units' => 3,
        //     'day' => 'MWF',
        //     'start_time' => '10:00:00',
        //     'end_time' => '12:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'GV309',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 3,
        //     'professor_id' => 3,
        //     'code' => 'CSC 0221',
        //     'section' => 3,
        //     'name' => 'Algorithm and Complexity',
        //     'units' => 3,
        //     'day' => 'MTWTHFS',
        //     'start_time' => '19:00:00',
        //     'end_time' => '21:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'GV307',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 4,
        //     'professor_id' => 4,
        //     'code' => 'CSC 0316',
        //     'section' => 4,
        //     'name' => 'Information Assurance Security',
        //     'units' => 3,
        //     'day' => 'MF',
        //     'start_time' => '10:00:00',
        //     'end_time' => '13:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'GV305',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 5,
        //     'professor_id' => 3,
        //     'code' => 'PED 0054',
        //     'section' => 3,
        //     'name' => 'Soccer',
        //     'units' => 3,
        //     'day' => 'MTWTHFS',
        //     'start_time' => '17:00:00',
        //     'end_time' => '19:00:00',
        //     'building' => 'Field',
        //     'room' => 'Field',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        //  DB::table('classes')->insert([
        //     'student_id' => 6,
        //     'professor_id' => 4,
        //     'code' => 'ICC 0102',
        //     'section' => 4,
        //     'name' => 'Fundamentals of Programming (LEC)',
        //     'units' => 3,
        //     'day' => 'MF',
        //     'start_time' => '07:00:00',
        //     'end_time' => '10:00:00',
        //     'building' => 'Gusaling Villegas',
        //     'room' => 'Computer Laboratory 2',
        //     'type' => 'face-to-face',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
