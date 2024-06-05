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
        Schema::create('student_records', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('semester');
            $table->date('date_enrolled');
            $table->integer('tuition_fee');
            $table->integer('library_fee');
            $table->integer('athletic_fee');
            $table->integer('medical_dental_fee');
            $table->integer('student_welfare');
            $table->integer('cultural_activity');
            $table->integer('guidance_fee');
            $table->integer('laboratory_fee');
            $table->integer('development_fund');
            $table->integer('ang_pamantasan_fee');
            $table->integer('ssc_fee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_records');
    }
};
