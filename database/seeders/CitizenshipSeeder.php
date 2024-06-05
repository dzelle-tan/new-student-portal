<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitizenshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citizenships = [
            'Filipino',
            'Foreigner',
        ];

        foreach ($citizenships as $citizenship) {
            \App\Models\Citizenship::create([
                'citizenship' => $citizenship,
            ]);
        }
    }
}
