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
        Schema::table('pending_email_p_l_m_emails', function (Blueprint $table) {
            $table->foreignId('student_no')->constrained('students', 'student_no')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pending_email_p_l_m_emails', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
    }
};
