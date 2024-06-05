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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->integer('students_qty')->nullable();
            $table->integer('credited_units');
            $table->unsignedSmallInteger('actual_units')->nullable();
            $table->integer('slots');
            $table->string('nstp_activity')->nullable();
            $table->string('parent_class_code')->nullable();
            $table->string('link_type')->nullable();
            $table->string('instruction_language');
            $table->integer('minimum_year_level')->nullable();
            $table->text('teams_assigned_link')->nullable();
            $table->date('effectivity_dateSL')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
