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
        Schema::create('class_faculty', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')
                ->constrained('classes', 'id')
                ->cascadeOnDelete();
            $table->foreignId('instructor_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_faculties');
    }
};
