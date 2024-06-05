<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $civilStatuses = ['Single', 'Married', 'Widowed', 'Separated'];

        foreach ($civilStatuses as $civilStatus) {
            \App\Models\CivilStatus::create([
                'civil_status' => $civilStatus,
            ]);
        }
    }
}
