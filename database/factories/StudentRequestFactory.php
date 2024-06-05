<?php

namespace Database\Factories;

use App\Models\PaymentMode;
use App\Models\Student;
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
        $paymentModes = PaymentMode::all();
        $requestStatuses = StudentRequestStatus::all();
        $requestStatus = $requestStatuses->random();
        $dateRequested = $this->faker->dateTimeThisYear();

        return [
            'student_id' => $students->random()->id,
            'payment_mode_id' => $paymentModes->random()->id,
            'student_request_status_id' => $requestStatus->id,
            'date_requested' => $dateRequested,
            'date_of_payment' => $dateRequested,
            'amount_paid' => $this->faker->randomFloat(0, 100, 500),
            'receipt_no' => strval($this->faker->randomNumber(8)),
            'purpose' => $this->faker->sentence(),
            'expected_release' => $this->faker->dateTimeBetween($dateRequested, '+1 month'),
            'date_received' => $requestStatus->status == 'Claimed' ? $this->faker->dateTimeBetween($dateRequested, '+1 month') : null,
        ];
    }
}
