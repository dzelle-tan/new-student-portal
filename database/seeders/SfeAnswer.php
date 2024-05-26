<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SfeAnswer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sfe_answers')->insert([
            'student_no' => 202101350,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 1,
            'answer' => 'Strongly Agree',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101350,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 2,
            'answer' => 'Agree',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101350,
            'professor_id' => 202101351,
            'class_id' => 1,
            'sfe_question' => 3,
            'answer' => 'Not Applicable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101351,
            'professor_id' => 202101352,
            'class_id' => 1,
            'sfe_question' => 4,
            'answer' => '0 time',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101350,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 5,
            'answer' => '3 times',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101351,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 1,
            'answer' => '1.25',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101351,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 1,
            'answer' => 'Agree',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 20230001,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 3,
            'answer' => 'Not Applicable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('sfe_answers')->insert([
            'student_no' => 202101351,
            'professor_id' => 202101350,
            'class_id' => 1,
            'sfe_question' => 5,
            'answer' => '2 times',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
