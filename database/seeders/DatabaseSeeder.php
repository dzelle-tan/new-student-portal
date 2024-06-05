<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Program;
use App\Models\RequestedDocument;
use App\Models\Student;
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
            
            CitySeeder::class,
            BiologicalSexSeeder::class,
            CivilStatusSeeder::class,
            CitizenshipSeeder::class,
            AcademicYearSeeder::class,
            StudentSeeder::class,
            CollegeSeeder::class,
            ProgramSeeder::class,
            AySemSeeder::class,
            BlockSeeder::class,
            RegistrationStatusSeeder::class,
            StudentTermSeeder::class,

            // AcademicYearSeeder::class,
            // RegistrationStatusSeeder::class,
            // DaySeeder::class,
            // ClassModeSeeder::class,
            // FeeStatusSeeder::class,
            // OffenseTypeSeeder::class,
            // PaymentModeSeeder::class,
            // StudentRequestStatusSeeder::class,
            // RequestedDocumentStatusSeeder::class,
            // CollegeSeeder::class,
            // DegreeProgramSeeder::class,
            // DocumentTypeSeeder::class,
            // SubjectSeeder::class,
            // ProfessorSeeder::class,
            // BuildingSeeder::class,
            // StudentClassSeeder::class,
            // AssignedClassSeeder::class,
            // StudentRequestSeeder::class,
            // RequestedDocumentSeeder::class,
        ]);
    }
}
