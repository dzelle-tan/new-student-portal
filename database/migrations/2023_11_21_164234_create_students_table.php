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
            // $table->increments('id');
            $table->integer('student_no')->unique()->primary();
            $table->string('email');
            $table->string('last_name', 45)->default('hehe');
            $table->string('first_name', 45)->default('hehe');
            $table->string('middle_name', 45)->default('hehe');
            $table->string('maiden_name', 255)->nullable();
            $table->string('pedigree', 45)->default('hehe');
            $table->string('biological_sex', 10)->default('hehe');
            $table->string('civil_status', 45)->default('hehe');
            $table->string('citizenship', 45)->default('hehe');
            $table->string('student_type', 45)->default('hehe');
            $table->string('registration_status', 45)->default('hehe');
            $table->string('college', 255)->default('hehe');
            $table->string('program_code', 45)->default('hehe');
            $table->string('degree_program', 255)->default('hehe');
            $table->integer('entry_aysem')->default('4343');
            $table->date('graduation_date')->nullable();
            $table->integer('year_level')->nullable();
            $table->string('plm_email', 255)->nullable(); // ->unique() to be added
            $table->string('permanent_address', 255)->default('hehe');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mobile_no')->default('4343');
            $table->string('photo_link', 255)->default('hehe');
            $table->string('password');
            $table->rememberToken();
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
