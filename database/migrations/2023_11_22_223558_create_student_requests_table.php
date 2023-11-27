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
        Schema::create('student_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->string('mode', 45)->nullable();
            $table->text('purpose')->nullable();
            $table->integer('receipt_no')->nullable();
            $table->string('registrar_name', 255)->nullable();
            $table->string('status', 45)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->dateTime('date_of_payment')->nullable();
            $table->date('expected_release')->nullable();
            $table->dateTime('date_requested')->nullable();
            $table->dateTime('date_received')->nullable();
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
        Schema::dropIfExists('student_requests');
    }
};
