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
        Schema::create('sfe_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_no');
            $table->integer('professor_id');
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('sfe_question');
            $table->text('answer')->nullable();
            $table->timestamps(); // Created_at and updated_at columns

            $table->foreign('sfe_question')
                ->references('id')->on('sfe_questions')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('professor_id')
                ->references('professor_id')->on('professors')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('student_no')
                ->references('student_no')->on('students')
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
        Schema::dropIfExists('sfe_answers');
    }
};
