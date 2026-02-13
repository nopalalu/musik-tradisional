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
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->unsignedBigInteger('alat_musik_id');
            $table->string('tipe_soal');
            $table->boolean('is_correct');
            $table->timestamps();

            $table->foreign('alat_musik_id')
                ->references('id')
                ->on('alat_musik')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_results');
    }
};
