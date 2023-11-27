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
        Schema::create('student_violations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('violation', 255)->nullable();
            $table->date('violation_date')->nullable();
            $table->string('offense_type', 45)->nullable();
            $table->string('sm_reference', 45)->nullable();
            $table->string('resolution', 45)->nullable();
            $table->text('resolution_remarks')->nullable();
            $table->date('resolution_date')->nullable();
            $table->string('status', 45)->nullable();
            $table->timestamps(); // Created_at and updated_at columns

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_violations');
    }
};
