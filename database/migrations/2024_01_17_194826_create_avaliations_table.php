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
        Schema::create('avaliations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_emitter');
            $table->unsignedBigInteger('code_receiver');
            $table->unsignedBigInteger('code_produto');
            $table->string('message');
            $table->unsignedBigInteger('star');
            $table->timestamps();

            $table->foreign('code_emitter')->references('id')->on('users');
            $table->foreign('code_receiver')->references('id')->on('users');
            $table->foreign('code_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaliations');
    }
};
