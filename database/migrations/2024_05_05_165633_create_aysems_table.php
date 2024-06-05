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
        Schema::create('aysems', function (Blueprint $table) {
            $table->id();
            $table->integer('academic_year');
            $table->string('academic_year_code')->virtualAs('CONCAT(academic_year, "-", academic_year + 1)');
            $table->integer('semester');
            $table->string('academic_year_sem')->virtualAs('CONCAT(academic_year, "-", semester)');
            $table->date('date_end');
            $table->date('date_start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aysems');
    }
};
