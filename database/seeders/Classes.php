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
         DB::table('classes')->insert([
            'student_id' => 1,
            'professor_id' => 1,
            'code' => 'CMSC 11',
            'section' => 1,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Sala',
        ]);

         DB::table('classes')->insert([
            'student_id' => 1,
            'professor_id' => 2,
            'code' => 'CMSC 11',
            'section' => 2,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Kitchen',
        ]);

         DB::table('classes')->insert([
            'student_id' => 1,
            'professor_id' => 3,
            'code' => 'CMRJ 11',
            'section' => 3,
            'name' => 'Introduction to Rejuvenation',
            'units' => 3,
            'day' => 'MTWTHFS',
            'start_time' => '07:00:00',
            'end_time' => '06:00:00',
            'building' => 'Kwangya',
            'room' => 'Bedroom',
        ]);

         DB::table('classes')->insert([
            'student_id' => 1,
            'professor_id' => 4,
            'code' => 'CMGS 11',
            'section' => 4,
            'name' => 'Introduction to Gardenscapes',
            'units' => 3,
            'day' => 'MF',
            'start_time' => '07:00:00',
            'end_time' => '13:00:00',
            'building' => 'Kwangya',
            'room' => 'Garden',
        ]);


         DB::table('classes')->insert([
            'student_id' => 2,
            'professor_id' => 1,
            'code' => 'CMSC 11',
            'section' => 1,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Sala',
        ]);

         DB::table('classes')->insert([
            'student_id' => 2,
            'professor_id' => 2,
            'code' => 'CMSC 11',
            'section' => 2,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Kitchen',
        ]);

         DB::table('classes')->insert([
            'student_id' => 2,
            'professor_id' => 3,
            'code' => 'CMRJ 11',
            'section' => 3,
            'name' => 'Introduction to Rejuvenation',
            'units' => 3,
            'day' => 'MTWTHFS',
            'start_time' => '07:00:00',
            'end_time' => '06:00:00',
            'building' => 'Kwangya',
            'room' => 'Bedroom',
        ]);

         DB::table('classes')->insert([
            'student_id' => 2,
            'professor_id' => 4,
            'code' => 'CMGS 11',
            'section' => 4,
            'name' => 'Introduction to Gardenscapes',
            'units' => 3,
            'day' => 'MF',
            'start_time' => '07:00:00',
            'end_time' => '13:00:00',
            'building' => 'Kwangya',
            'room' => 'Garden',
        ]);

         DB::table('classes')->insert([
            'student_id' => 3,
            'professor_id' => 1,
            'code' => 'CMSC 11',
            'section' => 1,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Sala',
        ]);

         DB::table('classes')->insert([
            'student_id' => 3,
            'professor_id' => 2,
            'code' => 'CMSC 11',
            'section' => 2,
            'name' => 'Introduction to Computer Science',
            'units' => 3,
            'day' => 'MWF',
            'start_time' => '07:00:00',
            'end_time' => '07:00:01',
            'building' => 'Kwangya',
            'room' => 'Kitchen',
        ]);

         DB::table('classes')->insert([
            'student_id' => 3,
            'professor_id' => 3,
            'code' => 'CMRJ 11',
            'section' => 3,
            'name' => 'Introduction to Rejuvenation',
            'units' => 3,
            'day' => 'MTWTHFS',
            'start_time' => '07:00:00',
            'end_time' => '06:00:00',
            'building' => 'Kwangya',
            'room' => 'Bedroom',
        ]);

         DB::table('classes')->insert([
            'student_id' => 4,
            'professor_id' => 4,
            'code' => 'CMGS 11',
            'section' => 4,
            'name' => 'Introduction to Gardenscapes',
            'units' => 3,
            'day' => 'MF',
            'start_time' => '07:00:00',
            'end_time' => '13:00:00',
            'building' => 'Kwangya',
            'room' => 'Garden',
        ]);

         DB::table('classes')->insert([
            'student_id' => 5,
            'professor_id' => 3,
            'code' => 'CMRJ 11',
            'section' => 3,
            'name' => 'Introduction to Rejuvenation',
            'units' => 3,
            'day' => 'MTWTHFS',
            'start_time' => '07:00:00',
            'end_time' => '06:00:00',
            'building' => 'Kwangya',
            'room' => 'Bedroom',
        ]);

         DB::table('classes')->insert([
            'student_id' => 6,
            'professor_id' => 4,
            'code' => 'CMGS 11',
            'section' => 4,
            'name' => 'Introduction to Gardenscapes',
            'units' => 3,
            'day' => 'MF',
            'start_time' => '07:00:00',
            'end_time' => '13:00:00',
            'building' => 'Kwangya',
            'room' => 'Garden',
        ]);
    }
}
