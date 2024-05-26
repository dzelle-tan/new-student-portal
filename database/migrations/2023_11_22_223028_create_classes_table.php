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
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_record_id');
            $table->integer('professor_id')->nullable();
            $table->string('code', 45)->nullable();
            $table->integer('section')->nullable();
            $table->string('name', 255)->nullable();
            $table->text('description')->nullable();
            $table->tinyInteger('units')->nullable();
            $table->string('day', 45)->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('building', 45)->nullable();
            $table->string('room', 45)->nullable();
            $table->string('type', 45)->nullable();
            $table->timestamps(); // Created_at and updated_at columns

            $table->foreign('professor_id')
                ->references('professor_id')->on('professors')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');

            $table->foreign('student_record_id')
                ->references('id')->on('student_records')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
