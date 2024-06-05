<?php

namespace Database\Seeders;

use App\Models\RequestedDocument;
use App\Models\StudentRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequestedDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentRequests = StudentRequest::all();

        foreach ($studentRequests as $studentRequest) {
            $randomCount = rand(1, 5);

            RequestedDocument::factory()->count($randomCount)->create([
                'student_request_id' => $studentRequest->id,
            ]);
        }
    }
}
