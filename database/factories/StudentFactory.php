<?php

namespace Database\Factories;

use App\Models\Aysem;
use App\Models\BiologicalSex;
use App\Models\Citizenship;
use App\Models\City;
use App\Models\CivilStatus;
use App\Models\DegreeProgram;
use App\Models\RegistrationStatus;
use App\Models\Student;
use App\Services\PLMEmail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cities = City::all();
        $city_id = $cities->random()->id;
        $biologicalSex = BiologicalSex::all();
        $civilStatus = CivilStatus::first();
        $citizenship = Citizenship::first();
        $aysem = Aysem::where('academic_year', 2023)->where('semester', 1)->first();
        $lastName = $this->faker->lastName;
        $firstName = $this->faker->firstName;
        $middleName = $this->faker->lastName;
        $entryDate = now();
        $mobileNo = '09' . $this->faker->unique()->numberBetween(100000000, 999999999);

        return [
            'student_no' => Student::generateStudentNumber($aysem->academic_year, $city_id),
            'last_name' => $lastName,
            'first_name' => $firstName,
            'middle_name' => $middleName,
            'birthdate' => $this->faker->dateTimeBetween('-18 years', '-17 years'),
            'religion' => $this->faker->randomElement(['Roman Catholic', 'Born Again Christian', 'Muslim', 'Iglesia ni Cristo']),
            'entry_date' => $entryDate,
            'permanent_address' => $this->faker->address,
            'mobile_no' => $mobileNo,
            'personal_email' => $this->faker->unique()->safeEmail,
            'biological_sex_id' => $biologicalSex->random()->id,
            'civil_status_id' => $civilStatus->id,
            'citizenship_id' => $citizenship->id,
            'city_id' => $city_id,
            'birthplace_city_id' => $cities->random()->id,
            'aysem_id' => $aysem->id,
            'plm_email' => PLMEmail::generate($firstName, $middleName, $lastName, $aysem->academic_year),
        ];
    }
}
