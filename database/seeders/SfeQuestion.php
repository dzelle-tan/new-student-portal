<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SfeQuestion extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sfe_questions')->insert([
            'question' => 'Explains the course objectives, expectations, and requirements of the course.',
            'type' => 'Faculty Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'Comes to class unprepared for the lesson.',
            'type' => 'Faculty Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'Presents the subject matter clearly and systematically.            ',
            'type' => 'Faculty Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'This course stimulates me to study beyond the lessons assigned.',
            'type' => 'Course Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'This course has developed in me a greater sense of responsibility. (i.e. self-reliance, self-discipline, independent study)',
            'type' => 'Course Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'I have worked more conscientiously in this course than in most other courses.',
            'type' => 'Course Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'How many times have you been late?',
            'type' => 'Self Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'How many class meetings have you missed?',
            'type' => 'Self Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);

        DB::table('sfe_questions')->insert([
            'question' => 'What final grade would you give yourself in this course?',
            'type' => 'Self Assessment'
            //created_at automatically updated to store the timestamps
            //updated_at automatically updated to store the timestamps
        ]);
    }
}
