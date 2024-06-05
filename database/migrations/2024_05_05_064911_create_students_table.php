<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_no');

            // Student Personal Information
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('maiden_name')->nullable();
            $table->string('suffix')->nullable();
            $table->date('birthdate');
            $table->string('permanent_address');
            $table->string('pedigree')->nullable();
            $table->string('religion');
            $table->string('personal_email')->unique();
            $table->string('mobile_no', length: 11)->unique();
            $table->string('telephone_no')->nullable();
            $table->string('photo_link')->nullable();

            // Student Academic Information
            $table->date('entry_date');
            $table->string('plm_email')->unique()->nullable();
            $table->boolean('paying')->default(false);
            $table->string('password')->nullable();
            $table->date('graduation_date')->nullable();

            // Medical Information
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();
            $table->string('complexion')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('dominant_hand')->nullable();
            $table->string('medical_history')->nullable();

            // Student Education
            $table->integer('lrn')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_type')->nullable();
            $table->string('strand')->nullable();
            $table->integer('year_entered')->nullable();
            $table->integer('year_graduated')->nullable();
            $table->string('honors_awards')->nullable();
            $table->float('general_average')->nullable();
            $table->string('remarks')->nullable();
            $table->string('org_name')->nullable();
            $table->string('org_position')->nullable();
            $table->string('previous_tertiary')->nullable();
            $table->string('previous_sem')->nullable();
            // Student Family
            $table->string('father_last_name')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_middle_name')->nullable();
            $table->string('father_address')->nullable();
            $table->string('father_contact_no')->nullable();
            $table->string('father_office_employer')->nullable();
            $table->string('father_office_address')->nullable();
            $table->string('father_office_num')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_first_name')->nullable();
            $table->string('mother_middle_name')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('mother_contact_no')->nullable();
            $table->string('mother_office_employer')->nullable();
            $table->string('mother_office_address')->nullable();
            $table->string('mother_office_num')->nullable();
            $table->string('guardian_lastname')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_middle_name')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_contact_no')->nullable();
            $table->string('guardian_office_employer')->nullable();
            $table->string('guardian_office_address')->nullable();
            $table->string('guardian_office_num')->nullable();
            $table->integer('annual_family_income')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
