<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['document_name' => 'Certification of Medium of Instruction', 'price' => 146.00],
            ['document_name' => 'Certification of Grades', 'price' => 146.00],
            ['document_name' => 'Certification of GWA', 'price' => 146.00],
            ['document_name' => 'Certification of Grades with GWA', 'price' => 146.00],
            ['document_name' => 'Certification of Grades Equivalency', 'price' => 146.00],
            ['document_name' => 'Certification of Special Grading System', 'price' => 146.00],
            ['document_name' => 'Certification of Graduation', 'price' => 146.00],
            ['document_name' => 'Certification of Graduation w/ Honor', 'price' => 146.00],
            ['document_name' => 'Certification of Enrollment/Registration', 'price' => 146.00],
            ['document_name' => 'Certification of Ranking', 'price' => 146.00],
            ['document_name' => 'Certification of Units Earned', 'price' => 146.00],
            ['document_name' => 'Certification of Non-availability of ID', 'price' => 146.00],
            ['document_name' => 'NSTP/ROTC Certification', 'price' => 146.00],
            ['document_name' => 'Certificate of No Objection', 'price' => 146.00],
            ['document_name' => 'Certified True Copy per request', 'price' => 146.00],
            ['document_name' => 'Change Registration Card/Form', 'price' => 146.00],
            ['document_name' => 'Course Description', 'price' => 146.00],
            ['document_name' => 'Course Description Additional Page', 'price' => 8.00],
            ['document_name' => 'Course Syllabus', 'price' => 146.00],
            ['document_name' => 'Course Syllabus Additional Page', 'price' => 13.00],
            ['document_name' => 'Diploma', 'price' => 8.00],
            ['document_name' => 'Dry Seal', 'price' => 146.00],
            ['document_name' => 'Education Verification from Company/Agency', 'price' => 300.00],
            ['document_name' => 'English Translation of Diploma', 'price' => 96.00],
            ['document_name' => 'Honorable Dismissal', 'price' => 146.00],
            ['document_name' => 'ID Replacement', 'price' => 100.00],
            ['document_name' => 'Late Registration', 'price' => 146.00],
            ['document_name' => 'Transcript of Records (CAUP, CET, CN, CPT)', 'price' => 241.00],
            ['document_name' => 'Transcript of Records (Other Courses)', 'price' => 220.00],
            ['document_name' => 'Replacement of Class Card', 'price' => 14.00],
        ];

        foreach ($documentTypes as $documentType) {
            \App\Models\DocumentType::create($documentType);
        }
    }
}
