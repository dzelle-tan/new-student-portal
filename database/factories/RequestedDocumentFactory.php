<?php

namespace Database\Factories;

use App\Models\DocumentType;
use App\Models\RequestedDocumentStatus;
use App\Models\StudentRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestedDocument>
 */
class RequestedDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $studentRequests = StudentRequest::all();
        $documentTypes = DocumentType::all();
        $documentStatus = RequestedDocumentStatus::all();

        return [
            'student_request_id' => $studentRequests->random()->id,
            'document_type_id' => $documentTypes->random()->id,
            'requested_document_status_id' => $documentStatus->random()->id,
            'no_of_copies' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
