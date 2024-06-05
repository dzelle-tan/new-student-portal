<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['city_name' => "Manila", 'province_name' => "Metro Manila"],
            ['city_name' => "Quezon City", 'province_name' => "Metro Manila"],
            ['city_name' => "Caloocan", 'province_name' => "Metro Manila"],
            ['city_name' => "Las Piñas", 'province_name' => "Metro Manila"],
            ['city_name' => "Makati", 'province_name' => "Metro Manila"],
            ['city_name' => "Malabon", 'province_name' => "Metro Manila"],
            ['city_name' => "Mandaluyong", 'province_name' => "Metro Manila"],
            ['city_name' => "Marikina", 'province_name' => "Metro Manila"],
            ['city_name' => "Muntinlupa", 'province_name' => "Metro Manila"],
            ['city_name' => "Navotas", 'province_name' => "Metro Manila"],
            ['city_name' => "Parañaque", 'province_name' => "Metro Manila"],
            ['city_name' => "Pasay", 'province_name' => "Metro Manila"],
            ['city_name' => "Pasig", 'province_name' => "Metro Manila"],
            ['city_name' => "Pateros", 'province_name' => "Metro Manila"],
            ['city_name' => "San Juan", 'province_name' => "Metro Manila"],
            ['city_name' => "Taguig", 'province_name' => "Metro Manila"],
            ['city_name' => "Valenzuela", 'province_name' => "Metro Manila"],
            // TODO: Add more cities here
        ];

        foreach ($cities as $city) {
            \App\Models\City::create($city);
        }
    }
}
