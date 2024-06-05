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
        Schema::create('student_terms', function (Blueprint $table) {
            $table->id();
            $table->string('student_type');
            $table->boolean('graduating');
            $table->boolean('enrolled');
            $table->unsignedInteger('year_level');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_terms');
    }
};
