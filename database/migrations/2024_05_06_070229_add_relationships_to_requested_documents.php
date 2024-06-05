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
        Schema::table('requested_documents', function (Blueprint $table) {
            $table->foreignId('student_no')->constrained('students', 'student_no')->cascadeOnDelete();
            $table->foreignId('document_type_id')->constrained();
            $table->foreignId('requested_document_status_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('requested_documents', function (Blueprint $table) {
            $table->dropForeign(['student_request_id']);
            $table->dropForeign(['document_type_id']);
            $table->dropForeign(['requested_document_status_id']);
        });
    }
};
