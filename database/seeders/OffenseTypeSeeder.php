<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OffenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offenseTypes = ['Light Offense', 'Less Grave Offense', 'Grave Offense']; // TODO: Temporary

        foreach ($offenseTypes as $offenseType) {
            \App\Models\OffenseType::create([
                'type' => $offenseType,
            ]);
        }
    }
}
