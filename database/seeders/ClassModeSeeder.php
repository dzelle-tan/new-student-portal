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
        $classModes = ['Online', 'Onsite', 'Blended'];

        foreach ($classModes as $classMode) {
            \App\Models\ClassMode::create([
                'mode' => $classMode,
            ]);
        }
    }
}
