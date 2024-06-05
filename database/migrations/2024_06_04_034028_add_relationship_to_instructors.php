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
        Schema::table('instructors', function (Blueprint $table) {
            $table->foreignId('birthplace_id')->constrained('cities')->cascadeOnDelete();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('biological_sex_id')->constrained()->cascadeOnDelete();
            $table->foreignId('civil_status_id')->constrained()->cascadeOnDelete();
            $table->foreignId('college_id')->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->dropForeign(['birthplace_id']);
            $table->dropForeign(['biological_sex_id']);
            $table->dropForeign(['civil_status_id']);
            $table->dropForeign(['college_id']);
        });
    }
};
