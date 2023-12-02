<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentRequest extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student_requests')->insert([
            'student_id' => 1,
            'mode' => 'Online',
            'purpose' => 'For scholarship',
            'receipt_no' => 874205619,
            'registrar_name' => 'Jay Sandoval',
            'status' => 'Pending',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-12-07',
            'date_requested' => '2021-11-22 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'Online',
            'purpose' => 'For on-the-job training',
            'receipt_no' => 506913284,
            'registrar_name' => 'Jay Sandoval',
            'status' => 'Pending',
            'total' => 130.00,
            'date_of_payment' => '2022-10-22 17:25:58',
            'expected_release' => '2022-11-02',
            'date_requested' => '2022-10-19 10:35:57',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'In-person',
            'purpose' => 'For job application',
            'receipt_no' => 729854163,
            'registrar_name' => 'Alex Statham',
            'status' => 'Pending',
            'total' => 256.00,
            'date_of_payment' => '2023-11-22 19:35:58',
            'expected_release' => '2023-12-07',
            'date_requested' => '2023-11-22 20:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'Online',
            'purpose' => 'For scholarship',
            'receipt_no' => 185372940,
            'registrar_name' => 'Sheila Cruz',
            'status' => 'Pending',
            'total' => 133.00,
            'date_of_payment' => '2021-09-22 22:35:58',
            'expected_release' => '2021-09-30',
            'date_requested' => '2021-09-15 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 1,
            'mode' => 'In-person',
            'purpose' => 'For scholarship',
            'receipt_no' => 392618745,
            'registrar_name' => 'Alex Statham',
            'status' => 'Released',
            'total' => 540.00,
            'date_of_payment' => '2021-10-22 22:35:58',
            'expected_release' => '2021-10-26',
            'date_requested' => '2021-10-22 22:35:58',
            'date_received' => '2021-10-27 22:35:58',
        ]);
    }
}
