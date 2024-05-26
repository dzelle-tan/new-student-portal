<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SfeStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sfe_statuses')->insert([
            'student_no' => 202101350,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 22:35:58',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_no' => 202101351,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-15 08:13:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_no' => 20230001,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-15 12:35:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_no' => 20235002,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 20:15:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_no' => 20235003,
            'class_id' => 2,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 22:17:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
