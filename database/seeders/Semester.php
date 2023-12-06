<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Semester extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semesters')->insert([
            'name' => 'First Semester',
            'start_date' => '2023-08-29',
            'end_date' => '2024-01-16',
            'created_at' => now(),
        ]);

        DB::table('semesters')->insert([
            'name' => 'Second Semester',
            'start_date' => '2024-02-05',
            'end_date' => '2024-06-09',
            'created_at' => now(),
        ]);

        DB::table('semesters')->insert([
            'name' => 'Midyear Term',
            'start_date' => '2024-07-01',
            'end_date' => '2024-08-10',
            'created_at' => now(),
        ]);
    }
}
