<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classModes = [
            ['mode_code' => 'F2F', 'mode_type' => 'Face-to-Face'],
            ['mode_code' => 'OL', 'mode_type' => 'Online'],
            ['mode_code' => 'HYB', 'mode_type' => 'Hybrid'],
        ];

        foreach ($classModes as $classMode) {
            \App\Models\ClassMode::create($classMode);
        }
    }
}
