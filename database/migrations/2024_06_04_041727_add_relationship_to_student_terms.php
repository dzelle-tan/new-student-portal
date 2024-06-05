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
        Schema::table('student_terms', function (Blueprint $table) {
            $table->foreignId('student_no')->constrained('students', 'student_no')->cascadeOnDelete();
            $table->foreignId('aysem_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('program_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('block_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('registration_status_id')
                ->nullable()
                ->constrained()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_terms', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['aysem_id']);
            $table->dropForeign(['college_id']);
            $table->dropForeign(['program_id']);
            $table->dropForeign(['block_id']);
        });
    }
};
