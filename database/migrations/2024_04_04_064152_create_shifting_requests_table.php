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
        Schema::create('shifting_requests', function (Blueprint $table) {
            $table->id(); // changed this back to id instead of shifting_id because of eloquent model default id
            $table->integer('student_no');
            $table->foreign('student_no')->references('student_no')->on('students')->onDelete('NO ACTION')->onUpdate('NO ACTION');
            $table->string('new_degree_program');
            $table->text('study_plan')->nullable();
            $table->text('letter_of_intent')->nullable();
            $table->text('note_of_undertaking')->nullable();
            $table->text('shifting_form')->nullable();
            $table->string('status');
            $table->date('date_of_request')->nullable();
            $table->boolean('is_finalized')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shifting_requests');
    }
};
