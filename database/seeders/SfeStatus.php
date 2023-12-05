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
            'student_id' => 1,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 22:35:58',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_id' => 2,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-15 08:13:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_id' => 3,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-15 12:35:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_id' => 4,
            'class_id' => 1,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 20:15:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('sfe_statuses')->insert([
            'student_id' => 5,
            'class_id' => 2,
            'aysem' => '20231',
            'status' => 'Completed',
            'date_finished' => '2023-12-11 22:17:00',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
