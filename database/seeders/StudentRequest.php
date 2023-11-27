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
            'receipt_no' => 123456786,
            'registrar_name' => 'Jason Statham',
            'status' => 'Pending',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-12-07',
            'date_requested' => '2021-11-22 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'Online',
            'purpose' => 'For scholarship',
            'receipt_no' => 123456786,
            'registrar_name' => 'Jason Statham',
            'status' => 'Pending',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-12-07',
            'date_requested' => '2021-11-22 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'Online',
            'purpose' => 'For scholarship',
            'receipt_no' => 123456788,
            'registrar_name' => 'Jason Statham',
            'status' => 'Pending',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-12-07',
            'date_requested' => '2021-11-22 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 2,
            'mode' => 'Online',
            'purpose' => 'For scholarship',
            'receipt_no' => 123456789,
            'registrar_name' => 'Jason Statham',
            'status' => 'Pending',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-11-27',
            'date_requested' => '2021-11-22 22:35:58',
        ]);

        DB::table('student_requests')->insert([
            'student_id' => 1,
            'mode' => 'FTF',
            'purpose' => 'For scholarship',
            'receipt_no' => 123456785,
            'registrar_name' => 'Jason Statham',
            'status' => 'Released',
            'total' => 100.00,
            'date_of_payment' => '2021-11-22 22:35:58',
            'expected_release' => '2021-12-05',
            'date_requested' => '2021-11-22 22:35:58',
            'date_received' => '2021-12-06 22:35:58',
        ]);
    }
}
