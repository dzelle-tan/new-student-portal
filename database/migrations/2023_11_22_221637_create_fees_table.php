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
        Schema::create('fees', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('tuition_fee', 10, 2)->nullable();
            $table->decimal('tuition_units', 10, 2)->nullable();
            $table->decimal('athletic_fee', 10, 2)->nullable();
            $table->decimal('cultural_activity', 10, 2)->nullable();
            $table->decimal('guidance_fee', 10, 2)->nullable();
            $table->decimal('library_fee', 10, 2)->nullable();
            $table->decimal('medical_dental_fee', 10, 2)->nullable();
            $table->decimal('student_welfare', 10, 2)->nullable();
            $table->decimal('deposit_new_student_fee', 10, 2)->nullable(); // For new student
            $table->decimal('entrance_fee', 10, 2)->nullable(); // For new student
            $table->decimal('university_id_fee', 10, 2)->nullable(); // For new student
            $table->decimal('nstp_fee', 10, 2)->nullable(); // For NSTP
            $table->decimal('registration_fee', 10, 2)->nullable();
            $table->decimal('laboratory_fee', 10, 2)->nullable();
            $table->integer('laboratory_category')->nullable();
            $table->decimal('development_fund', 10, 2)->nullable();
            $table->decimal('ang_pamantasan_fee', 10, 2)->nullable();
            $table->decimal('ssc_fee', 10, 2)->nullable(); // Every first semester only
            $table->string('status')->nullable();
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
