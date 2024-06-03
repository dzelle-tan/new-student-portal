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
        Schema::create('study_plan_validations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->integer('year_level');
            $table->date('date_of_request');
            $table->string('status');
            $table->text('study_plan')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_plan_validations');
    }
};
