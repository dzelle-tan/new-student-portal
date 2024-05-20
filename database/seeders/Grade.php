<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Grade extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades = [1.00, 1.25, 1.50, 1.75, 2.00, 2.25, 2.50, 2.75];
        
        $data = [];
        for ($i = 1; $i <= 47; $i++) {
            $data[] = [
                'class_id' => $i,
                'grade' => $grades[array_rand($grades)],
                'completion_grade' => $grades[array_rand($grades)],
                'remarks' => 'Passed',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('grades')->insert($data);
    }
}
