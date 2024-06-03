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
        Schema::create('temporary_validations', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->integer('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->integer('yearlvl')->nullable();
            $table->date('daterequest')->nullable();
            $table->string('status', 50)->nullable();
            $table->binary('validation_pdfs')->nullable();
            $table->string('studentprograms', 50)->default('BS Computer Science');
            $table->text('study_plan_course_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temporary_validations');
    }
};
