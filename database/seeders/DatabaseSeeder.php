<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Program;
use App\Models\RequestedDocument;
use App\Models\Student;
use App\Models\StudentRecord;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FeeStatusSeeder::class,
            CitySeeder::class,
            BiologicalSexSeeder::class,
            CivilStatusSeeder::class,
            CitizenshipSeeder::class,
            AysemSeeder::class,
            RegistrationStatusSeeder::class,
            CollegeSeeder::class,
            ProgramSeeder::class,
            StudentSeeder::class,
            CollegeSeeder::class,
            ProgramSeeder::class,
            // AySemSeeder::class,
            BlockSeeder::class,
            RegistrationStatusSeeder::class,
            StudentTermSeeder::class,
            StudentRecordSeeder::class,

            // AcademicYearSeeder::class,
            // RegistrationStatusSeeder::class,
            // DaySeeder::class,
            // ClassModeSeeder::class,
            // FeeStatusSeeder::class,
            // OffenseTypeSeeder::class,
            // BuildingSeeder::class,
        ]);
    }
}
