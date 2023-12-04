<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Fee extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('fees')->insert([
            'tuition_fee' => 1500.00,
            'tuition_units' => 12.5,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Paid',
        ]);

         DB::table('fees')->insert([
            'tuition_fee' => 1800.00,
            'tuition_units' => 15.0,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Unpaid',
        ]);

         DB::table('fees')->insert([
            'tuition_fee' => 1800.00,
            'tuition_units' => 15.0,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Paid',
        ]);

         DB::table('fees')->insert([
            'tuition_fee' => 1800.00,
            'tuition_units' => 15.0,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Unpaid',
        ]);

         DB::table('fees')->insert([
            'tuition_fee' => 1800.00,
            'tuition_units' => 15.0,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Unpaid',
        ]);

         DB::table('fees')->insert([
            'tuition_fee' => 1800.00,
            'tuition_units' => 15.0,
            'athletic_fee' => 50.00,
            'cultural_activity' => 30.00,
            'guidance_fee' => 100.00,
            'library_fee' => 80.00,
            'medical_dental_fee' => 120.00,
            'student_welfare' => 75.00,
            'deposit_new_student_fee' => 200.00,
            'entrance_fee' => 300.00,
            'university_id_fee' => 50.00,
            'nstp_fee' => 25.00,
            'registration_fee' => 180.00,
            'laboratory_fee' => 250.00,
            'laboratory_category' => 2,
            'development_fund' => 100.00,
            'ang_pamantasan_fee' => 45.00,
            'ssc_fee' => 80.00,
            'status' => 'Unpaid',
        ]);
    }
}
