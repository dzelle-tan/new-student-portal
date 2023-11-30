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
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('student_record_id');
            $table->decimal('grade', 3, 2)->nullable();
            $table->decimal('completion_grade', 3, 2)->nullable();
            $table->string('remarks', 45)->nullable();
            $table->timestamps(); // Created_at and updated_at columns

            $table->foreign('student_id')
                ->references('id')->on('students')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('student_record_id')
                ->references('id')->on('student_records')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('class_id')
                ->references('id')->on('classes')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};