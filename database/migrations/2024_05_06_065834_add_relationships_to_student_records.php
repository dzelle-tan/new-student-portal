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
        Schema::table('student_records', function (Blueprint $table) {
            $table->foreignId('student_no')->constrained('students', 'student_no')->cascadeOnDelete();
            $table->foreignId('fee_status_id')->constrained();
            $table->foreignId('academic_year_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_records', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['fee_status_id']);
            $table->dropForeign(['academic_year_id']);
        });
    }
};
