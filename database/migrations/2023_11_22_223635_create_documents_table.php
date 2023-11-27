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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('document_info_id');
            $table->unsignedInteger('student_request_id');
            // $table->string('document_name', 255)->nullable();
            // $table->decimal('amount', 10, 2)->nullable();
            $table->integer('no_of_copies')->nullable();
            $table->timestamps(); // Created_at and updated_at columns

            $table->foreign('document_info_id')
            ->references('id')->on('document_infos')
            ->onDelete('NO ACTION')
            ->onUpdate('NO ACTION');

            $table->foreign('student_request_id')
                ->references('id')->on('student_requests')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
