<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentRequestModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modes = ['Cash', 'Online'];

        foreach ($modes as $mode) {
            \App\Models\StudentRequestMode::create([
                'mode' => $mode,
            ]);
        }
    }
}
