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
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('biological_sex_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('civil_status_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('citizenship_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('birthplace_city_id')->constrained('cities', 'id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('aysem_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['biological_sex_id']);
            $table->dropForeign(['civil_status_id']);
            $table->dropForeign(['citizenship_id']);
            $table->dropForeign(['city_id']);
            $table->dropForeign(['birthplace_city_id']);
            $table->dropForeign(['aysem_id']);
        });
    }
};
