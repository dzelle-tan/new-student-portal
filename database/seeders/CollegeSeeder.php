<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colleges = [
            ['college_name' => 'College of Information System and Technology Management', 'college_code' => 'CISTM'],
        ];

        foreach ($colleges as $college) {
            \App\Models\College::create($college);
        }
    }
}
