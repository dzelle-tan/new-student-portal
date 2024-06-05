<?php

namespace Database\Factories;

use App\Models\PaymentMode;
use App\Models\Student;
use App\Models\StudentRequestMode;
use App\Models\StudentRequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentRequest>
 */
class StudentRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $students = Student::all();
        $requestModes = StudentRequestMode::all();
        $requestStatuses = StudentRequestStatus::all();
        $requestStatus = $requestStatuses->random();
        $dateRequested = $this->faker->dateTimeThisYear();

        return [
            'student_no' => $students->random()->student_no,
            'student_request_mode_id' => $requestModes->random()->id,
            'student_request_status_id' => $requestStatus->id,
            'purpose' => $this->faker->sentence(),
            'receipt_no' => strval($this->faker->randomNumber(8)),
            'registrar_name' => $this->faker->name(),
            'total' => $this->faker->randomFloat(0, 100, 500),
            'date_requested' => $dateRequested,
            'date_of_payment' => $dateRequested,
            'expected_release' => $this->faker->dateTimeBetween($dateRequested, '+1 month'),
            'date_received' => $requestStatus->status == 'Claimed' ? $this->faker->dateTimeBetween($dateRequested, '+1 month') : null,
        ];
    }
}
