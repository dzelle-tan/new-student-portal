<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $buildings = [
            ['building_name' => 'Gusaling Gat. Antonio J. Villegas', 'building_code' => 'GV'],
            ['building_name' => 'Gusaling Gat. Arsenio H. Lacson', 'building_code' => 'GL'],
            ['building_name' => 'Gusaling Maynila', 'building_code' => 'GM'],
            ['building_name' => 'Gusaling Rajah Soliman', 'building_code' => 'GRS'],
        ];

        foreach ($buildings as $building) {
            \App\Models\Building::create($building);
        }
    }
}
