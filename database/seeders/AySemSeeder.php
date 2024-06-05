<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AySemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aysems = [
            [
                'semester_index' => 1,
                'date_start' => '2024-01-01',
                'date_end' => '2024-05-31',
                'academic_year_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($aysems as $aysem) {
            \App\Models\Aysem::create($aysem);
        }
    }
}
