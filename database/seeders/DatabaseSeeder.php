<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Program;
use App\Models\RequestedDocument;
use App\Models\StudentRequestMode;
use App\Models\StudentTerm;
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
            CourseSeeder::class,
            StudentSeeder::class,
            CollegeSeeder::class,
            ProgramSeeder::class,
            BlockSeeder::class,
            RegistrationStatusSeeder::class,
            StudentTermSeeder::class,
            BlockSeeder::class,
            OffenseTypeSeeder::class,
            StudentViolationSeeder::class,
            ClassSeeder::class,
            BuildingSeeder::class,
            RoomSeeder::class,
            ClassModeSeeder::class,
            ClassScheduleSeeder::class,
            StudentRecordSeeder::class,
            FeeStatusSeeder::class,
            GradeSeeder::class,
            DaySeeder::class,
            ClassModeSeeder::class,
            StudentRequestStatusSeeder::class,
            RequestedDocumentStatusSeeder::class,
            DocumentTypeSeeder::class,
            StudentRequestModeSeeder::class,
            StudentRequestSeeder::class,
            RequestedDocumentSeeder::class,
            SemesterSeeder::class,
            EventSeeder::class,
        ]);
    }
}
