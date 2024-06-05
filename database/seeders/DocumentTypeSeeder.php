<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['document_name' => 'Diploma', 'price' => 0],
            ['document_name' => 'English Translation of Diploma', 'price' => 0],
            ['document_name' => 'Transcript of Records', 'price' => 0],
            ['document_name' => 'Honorable Dismissal', 'price' => 0],
            ['document_name' => 'Certificate of Grades', 'price' => 0],
            ['document_name' => 'Certification of Graduation', 'price' => 0],
            ['document_name' => 'Certification of Units Earned', 'price' => 0],
            ['document_name' => 'Certification of Enrollment', 'price' => 0],
            ['document_name' => 'Certification of Medium of Instruction', 'price' => 0],
            ['document_name' => 'Replacement of Registration Card/ID', 'price' => 0],
            ['document_name' => 'DFA/CHED Authentication of Student\'s Records', 'price' => 0],
        ];

        foreach ($documentTypes as $documentType) {
            \App\Models\DocumentType::create($documentType);
        }
    }
}
