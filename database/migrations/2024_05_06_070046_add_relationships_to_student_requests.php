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
        Schema::table('student_requests', function (Blueprint $table) {
            $table->foreignId('student_no')->constrained('students', 'student_no')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('student_request_mode_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('student_request_status_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_requests', function (Blueprint $table) {
            $table->dropForeign(['student_no']);
            $table->dropForeign(['payment_mode_id']);
            $table->dropForeign(['student_request_status_id']);
        });
    }
};
