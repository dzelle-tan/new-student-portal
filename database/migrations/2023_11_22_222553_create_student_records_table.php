<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_records', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('control_no')->unique()->primary();
            $table->integer('student_no');
            $table->unsignedInteger('control_no');
            $table->string('status', 45)->nullable();
            $table->string('school_year')->nullable();
            $table->unsignedTinyInteger('semester')->nullable();
            $table->timestamp('date_enrolled')->nullable();
            $table->decimal('gwa', 5, 2)->nullable();
            $table->timestamps(); // // Created_at and updated_at columns

            $table->foreign('student_no')
                ->references('student_no')->on('students')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_records');
    }
};
