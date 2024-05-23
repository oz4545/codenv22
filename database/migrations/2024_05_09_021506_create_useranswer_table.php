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
        Schema::create('useranswers', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario');
            $table->unsignedBigInteger('pregunta');
            $table->unsignedBigInteger('respuesta');
            $table->timestamps();

            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('pregunta')->references('id')->on('questions');
            $table->foreign('respuesta')->references('id')->on('answers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('useranswers');
    }
};
