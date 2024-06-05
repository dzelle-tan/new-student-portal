<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiologicalSexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biologicalSexes = ['Male', 'Female'];

        foreach ($biologicalSexes as $biologicalSex) {
            \App\Models\BiologicalSex::create([
                'sex' => $biologicalSex,
            ]);
        }
    }
}
