<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 255)->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->timestamps();
        });

        DB::table('document_infos')->insert([
            // ['document' => 'Add/Drop', 'price' => 103.00],
            // ['document' => 'Alumni Fee', 'price' => 74.00],
            // ['document' => 'Graduates from SY 2017-2018 and onwards: CAV for Board Document Set (CTC Tagalog diploma, CTC English diploma, CTC TOR, Cert of graduation, CAV Certification)',
            // 'price' => 584.00],
            // ['document' => 'Graduates prior to SY 2017-2018:CAV for Board Set (CTC Tagalog diploma, CTC English diploma, CTC TOR, Cert of graduation, CAV Certification)',
            // 'price' => 730.00],
            ['document' => 'Certification of Medium of Instruction', 'price' => 146.00],
            ['document' => 'Certification of Grades', 'price' => 146.00],
            ['document' => 'Certification of GWA', 'price' => 146.00],
            ['document' => 'Certification of Grades with GWA', 'price' => 146.00],
            ['document' => 'Certification of Grades Equivalency', 'price' => 146.00],
            ['document' => 'Certification of Special Grading System', 'price' => 146.00],
            ['document' => 'Certification of Graduation', 'price' => 146.00],
            ['document' => 'Certification of Graduation w/ Honor', 'price' => 146.00],
            ['document' => 'Certification of Enrollment/Registration', 'price' => 146.00],
            ['document' => 'Certification of Ranking', 'price' => 146.00],
            ['document' => 'Certification of Units Earned', 'price' => 146.00],
            ['document' => 'Certification of Non-availability of ID', 'price' => 146.00],
            ['document' => 'NSTP/ROTC Certification', 'price' => 146.00],
            ['document' => 'Certificate of No Objection', 'price' => 146.00],
            ['document' => 'Certified True Copy per request', 'price' => 146.00],
            ['document' => 'Change Registration Card/Form', 'price' => 146.00],
            // ['document' => 'Graduates from SY 2017-2018 and onwards: CHED/DFA Authentication Set (CTC Tagalog diploma, CTC English diploma, CTC TOR, Cert of graduation, CHED Certification)',
            // 'price' => 584.00],
            // ['document' => 'Graduates prior to SY 2017-2018: CHED/DFA Authentication Set (CTC Tagalog diploma, CTC English diploma, CTC TOR, Cert of graduation, CHED Certification)',
            // 'price' => 730.00],
            ['document' => 'Course Description', 'price' => 146.00],
            ['document' => 'Course Description Additional Page', 'price' => 8.00],
            ['document' => 'Course Syllabus', 'price' => 146.00],
            ['document' => 'Course Syllabus Additional Page', 'price' => 13.00],
            ['document' => 'Diploma (Given Once Only)', 'price' => 8.00],
            ['document' => 'Doc Stamp', 'price' => 15.00], // Not available daw sabi sa guidelines
            ['document' => 'Dry Seal', 'price' => 146.00],
            ['document' => 'Education Verification from Company/Agency', 'price' => 300.00],
            ['document' => 'English Translation of Diploma', 'price' => 96.00],
            // ['document' => 'Graduation Fee', 'price' => 1464.00],
            ['document' => 'Honorable Dismissal', 'price' => 146.00],
            ['document' => 'ID Replacement', 'price' => 100.00],
            ['document' => 'Late Registration', 'price' => 146.00],
            ['document' => 'Transcript of Records (CAUP, CET, CN, CPT)', 'price' => 241.00],
            ['document' => 'Transcript of Records (Other Courses)', 'price' => 220.00],
            ['document' => 'Replacement of Class Card', 'price' => 14.00],
            // ['document' => 'Verification With Dry Seal (WES, NCLEX, CGFNS, ECFMG/EPIC FCCPT, NYSED, ECA, ICAS, NASBA, etc.)',
            // 'price' => 146.00],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_infos');
    }
};
