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
            //first year, first sem
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0102',
                'section' => 2,
                'name' => 'Discrete Structures 1',
                'units' => 3,
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
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0101',
                'section' => 2,
                'name' => 'Introduction to Computing (Lecture)',
                'units' => 2,
                'day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0101.1',
                'section' => 2,
                'name' => 'Introduction to Computing (Laboratory)',
                'units' => 1,
                'day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0102',
                'section' => 2,
                'name' => 'Fundamentals of Programming (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 310',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0102.1',
                'section' => 2,
                'name' => 'Fundamentals of Programming (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'IPP 0010-31',
                'section' => 1,
                'name' => 'Interdisiplinaryong Pagbasa at Pagsulat Tungo Sa Mabisang Pagpapahayag',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'MMW 0001-15',
                'section' => 1,
                'name' => 'Mathematics in the Modern World',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'NSTP 01-16',
                'section' => 1,
                'name' => 'National Service Training Program 1 ( Cwts/rotc)',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'PCM 0006-45',
                'section' => 1,
                'name' => 'Purposive Communication',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'PED 0001-77',
                'section' => 1,
                'name' => 'Foundation of Physical Activities',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'STS 0002-29',
                'section' => 1,
                'name' => 'Science, Technology and Society',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //first year, second sem
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0211',
                'section' => 1,
                'name' => 'Discrete Structures 2',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0223',
                'section' => 1,
                'name' => 'Human Computer Interaction',
                'units' => 3,
                'day' => 'Friday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0103',
                'section' => 1,
                'name' => 'Intermediate Programming (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0103.1',
                'section' => 1,
                'name' => 'Intermediate Programming (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0104',
                'section' => 1,
                'name' => 'Data Structures and Algorithms (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0104.1',
                'section' => 1,
                'name' => 'Data Structures and Algorithms (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'LWR 0009-19',
                'section' => 1,
                'name' => 'Life and Works of Rizal',
                'units' => 3,
                'day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'NSTP 02-16',
                'section' => 1,
                'name' => 'National Service Training Program 2 ( Cwts/rotc)',
                'units' => 3,
                'day' => 'Thursday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'PED 0012-61',
                'section' => 1,
                'name' => 'Group Exercise',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'RPH 0004-20',
                'section' => 1,
                'name' => 'Readings in Philippine History',
                'units' => 3,
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
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'TCW 0005-15',
                'section' => 1,
                'name' => 'The Contemporary World',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //second year, first sem
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0212',
                'section' => 1,
                'name' => 'Object Oriented Programming (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0212.1',
                'section' => 1,
                'name' => 'Object Oriented Programming (Laboratory)',
                'units' => 1,
                'day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0213',
                'section' => 1,
                'name' => 'Logic Design and Digital Computer Circuits (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0213.1',
                'section' => 1,
                'name' => 'Logic Design and Digital Computer Circuits (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0224',
                'section' => 1,
                'name' => 'Operation Research',
                'units' => 3,
                'day' => 'Friday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ETH 0008-29',
                'section' => 1,
                'name' => 'Ethics',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0105',
                'section' => 1,
                'name' => 'Information Management (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0105.1',
                'section' => 1,
                'name' => 'Information Management (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ITE 0001',
                'section' => 1,
                'name' => 'Living in the it Era',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'PED 0033-12',
                'section' => 1,
                'name' => 'Arnis',
                'units' => 2,
                'day' => 'Tuesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'UTS 0003-16',
                'section' => 1,
                'name' => 'Understanding the Self',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //second year, second sem
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'AAP 0007-40',
                'section' => 1,
                'name' => 'Art Appreciation',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CBM 0016-14',
                'section' => 1,
                'name' => 'The Entrepreneurial Mind',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0221',
                'section' => 1,
                'name' => 'Algorithm and Complexity',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0222',
                'section' => 1,
                'name' => 'Architecture and Organization (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0222.1',
                'section' => 1,
                'name' => 'Architecture and Organization (Laboratory)',
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
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'CSC 0316',
                'section' => 1,
                'name' => 'Information Assurance Security',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'GES 0013',
                'section' => 1,
                'name' => 'Environmental Science',
                'units' => 3,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0106',
                'section' => 1,
                'name' => 'Applications Development and Emerging Technologies (Lecture)',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'ICC 0106.1',
                'section' => 1,
                'name' => 'Applications Development and Emerging Technologies (Laboratory)',
                'units' => 1,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 1,
                'professor_id' => 1,
                'code' => 'PED 0054-3',
                'section' => 1,
                'name' => 'Soccer',
                'units' => 2,
                'day' => 'Wednesday',
                'start_time' => '09:00:00',
                'end_time' => '12:00:00',
                'building' => 'Field',
                'room' => 'Field',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            //third year, first sem
            [
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
                'student_id' => 1,
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
            [
                'student_id' => 2,
                'professor_id' => 1,
                'code' => 'CSC 0314',
                'section' => 1,
                'name' => 'Operating System (LEC)',
                'units' => 3,
                'day' => 'MWF',
                'start_time' => '13:00:00',
                'end_time' => '15:00:00',
                'building' => 'Gusaling Lacson',
                'room' => 'GL 311',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'professor_id' => 2,
                'code' => 'CSC 0312',
                'section' => 2,
                'name' => 'Programming Languages (LEC)',
                'units' => 3,
                'day' => 'MWF',
                'start_time' => '13:00:00',
                'end_time' => '15:00:01',
                'building' => 'Gusaling Lacson',
                'room' => 'GL304',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'professor_id' => 3,
                'code' => 'CSC 0315',
                'section' => 3,
                'name' => 'Intelligent System (LEC)',
                'units' => 3,
                'day' => 'MTWTHFS',
                'start_time' => '12:00:00',
                'end_time' => '14:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Computer Laboratory 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 2,
                'professor_id' => 4,
                'code' => 'CSC 0313',
                'section' => 4,
                'name' => 'Software Engineering (LEC)',
                'units' => 3,
                'day' => 'MF',
                'start_time' => '16:00:00',
                'end_time' => '18:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'Computer Laboratory 3',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'professor_id' => 1,
                'code' => 'CSC 0212',
                'section' => 1,
                'name' => 'Object Oriented Programming (LEC)',
                'units' => 3,
                'day' => 'MWF',
                'start_time' => '07:00:00',
                'end_time' => '09:00:01',
                'building' => 'Gusaling Villegas',
                'room' => 'GV304',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'student_id' => 3,
                'professor_id' => 2,
                'code' => 'CSC 0213',
                'section' => 2,
                'name' => 'Logic Design and Digital Computer Circuits (LEC)',
                'units' => 3,
                'day' => 'MWF',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'building' => 'Gusaling Villegas',
                'room' => 'GV309',
                'type' => 'face-to-face',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
