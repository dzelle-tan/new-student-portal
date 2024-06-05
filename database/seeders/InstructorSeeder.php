<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructors = [
            [
                'last_name' => 'Francis',
                'first_name' => 'Atienza',
                'middle_name' => '',
                'maiden_name' => null,
                'instructor_code' => 'INST001',
                'pedigree' => null,
                'birth_date' => '1980-01-01',
                'citizenship' => 'Filipino',
                'mobile_phone' => '09171234567',
                'email_address' => 'john.smith@example.com',
                'tin_number' => '123456789012',
                'gsis_number' => '1234567890',
                'street_address' => '123 Main St',
                'zip_code' => '1000',
                'phone_number' => '028123456',
                'faculty_name' => 'College of Computer Science',
                'birthplace_id' => 1, 
                'city_id' => 1, 
                'biological_sex_id' => 1, 
                'civil_status_id' => 1, 
                'college_id' => 1, 
            ],
            [
                'last_name' => 'Liesyl',
                'first_name' => 'Mahusay',
                'middle_name' => '',
                'maiden_name' => null,
                'instructor_code' => 'INST001',
                'pedigree' => null,
                'birth_date' => '1980-01-01',
                'citizenship' => 'Filipino',
                'mobile_phone' => '09171234567',
                'email_address' => 'john.smith@example.com',
                'tin_number' => '123456789011',
                'gsis_number' => '1234567891',
                'street_address' => '123 Main St',
                'zip_code' => '1000',
                'phone_number' => '028123456',
                'faculty_name' => 'College of Computer Science',
                'birthplace_id' => 1, 
                'city_id' => 1, 
                'biological_sex_id' => 1, 
                'civil_status_id' => 1, 
                'college_id' => 1, 
            ],
            [
                'last_name' => 'Vivien',
                'first_name' => 'Agustin',
                'middle_name' => '',
                'maiden_name' => null,
                'instructor_code' => 'INST001',
                'pedigree' => null,
                'birth_date' => '1980-01-01',
                'citizenship' => 'Filipino',
                'mobile_phone' => '09171234567',
                'email_address' => 'john.smith@example.com',
                'tin_number' => '123456789013',
                'gsis_number' => '1234567892',
                'street_address' => '123 Main St',
                'zip_code' => '1000',
                'phone_number' => '028123456',
                'faculty_name' => 'College of Computer Science',
                'birthplace_id' => 1, 
                'city_id' => 1, 
                'biological_sex_id' => 1, 
                'civil_status_id' => 1, 
                'college_id' => 1, 
            ],
            [
                'last_name' => 'Christopher',
                'first_name' => 'Blanco',
                'middle_name' => '',
                'maiden_name' => null,
                'instructor_code' => 'INST001',
                'pedigree' => null,
                'birth_date' => '1980-01-01',
                'citizenship' => 'Filipino',
                'mobile_phone' => '09171234567',
                'email_address' => 'john.smith@example.com',
                'tin_number' => '123456789014',
                'gsis_number' => '1234567893',
                'street_address' => '123 Main St',
                'zip_code' => '1000',
                'phone_number' => '028123456',
                'faculty_name' => 'College of Computer Science',
                'birthplace_id' => 1, 
                'city_id' => 1, 
                'biological_sex_id' => 1, 
                'civil_status_id' => 1, 
                'college_id' => 1, 
            ],
        ];

        foreach ($instructors as $instructor) {
            Instructor::create($instructor);
        }
    }
}
