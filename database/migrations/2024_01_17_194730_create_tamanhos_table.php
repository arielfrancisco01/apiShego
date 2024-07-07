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
        Schema::create('tamanhos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_produto');
            $table->unsignedBigInteger('tamanho');
            $table->unsignedBigInteger('quantidade');
            $table->timestamps();

            $table->foreign('code_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamanhos');
    }
};
