<?php

namespace Database\Seeders;

use App\Models\StudentRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRecords = [
            [
                'student_no' => 202410001,
                'fee_status_id' => 1,
                'academic_year_id' => 1,
                'semester' => 1,
                'date_enrolled' => '2024-01-10',
                'tuition_fee' => 1500.00,
                // 'tuition_units' => 12.5,
                'athletic_fee' => 50.00,
                'cultural_activity' => 30.00,
                'guidance_fee' => 100.00,
                'library_fee' => 80.00,
                'medical_dental_fee' => 120.00,
                'student_welfare' => 75.00,
                // 'deposit_new_student_fee' => 200.00,
                // 'entrance_fee' => 300.00,
                // 'university_id_fee' => 50.00,
                // 'nstp_fee' => 25.00,
                // 'registration_fee' => 180.00,
                'laboratory_fee' => 250.00,
                // 'laboratory_category' => 2,
                'development_fund' => 100.00,
                'ang_pamantasan_fee' => 45.00,
                'ssc_fee' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'student_no' => 202410001,
                'fee_status_id' => 1,
                'academic_year_id' => 1,
                'semester' => 2,
                'date_enrolled' => '2024-01-10',
                'tuition_fee' => 1500.00,
                // 'tuition_units' => 12.5,
                'athletic_fee' => 50.00,
                'cultural_activity' => 30.00,
                'guidance_fee' => 100.00,
                'library_fee' => 80.00,
                'medical_dental_fee' => 120.00,
                'student_welfare' => 75.00,
                // 'deposit_new_student_fee' => 200.00,
                // 'entrance_fee' => 300.00,
                // 'university_id_fee' => 50.00,
                // 'nstp_fee' => 25.00,
                // 'registration_fee' => 180.00,
                'laboratory_fee' => 250.00,
                // 'laboratory_category' => 2,
                'development_fund' => 100.00,
                'ang_pamantasan_fee' => 45.00,
                'ssc_fee' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'student_no' => 202410001,
                'fee_status_id' => 1,
                'academic_year_id' => 2,
                'semester' => 1,
                'date_enrolled' => '2024-01-10',
                'tuition_fee' => 1500.00,
                // 'tuition_units' => 12.5,
                'athletic_fee' => 50.00,
                'cultural_activity' => 30.00,
                'guidance_fee' => 100.00,
                'library_fee' => 80.00,
                'medical_dental_fee' => 120.00,
                'student_welfare' => 75.00,
                // 'deposit_new_student_fee' => 200.00,
                // 'entrance_fee' => 300.00,
                // 'university_id_fee' => 50.00,
                // 'nstp_fee' => 25.00,
                // 'registration_fee' => 180.00,
                'laboratory_fee' => 250.00,
                // 'laboratory_category' => 2,
                'development_fund' => 100.00,
                'ang_pamantasan_fee' => 45.00,
                'ssc_fee' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'student_no' => 202410001,
                'fee_status_id' => 1,
                'academic_year_id' => 1,
                'semester' => 2,
                'date_enrolled' => '2024-01-10',
                'tuition_fee' => 1500.00,
                // 'tuition_units' => 12.5,
                'athletic_fee' => 50.00,
                'cultural_activity' => 30.00,
                'guidance_fee' => 100.00,
                'library_fee' => 80.00,
                'medical_dental_fee' => 120.00,
                'student_welfare' => 75.00,
                // 'deposit_new_student_fee' => 200.00,
                // 'entrance_fee' => 300.00,
                // 'university_id_fee' => 50.00,
                // 'nstp_fee' => 25.00,
                // 'registration_fee' => 180.00,
                'laboratory_fee' => 250.00,
                // 'laboratory_category' => 2,
                'development_fund' => 100.00,
                'ang_pamantasan_fee' => 45.00,
                'ssc_fee' => 80.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($studentRecords as $record) {
            StudentRecord::create($record);
        }
    }
}
