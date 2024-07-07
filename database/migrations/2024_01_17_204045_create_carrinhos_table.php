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
        Schema::create('carrinhos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_emitter');
            $table->unsignedBigInteger('code_produto');;
            $table->unsignedBigInteger('quantidade');
            $table->timestamps();

            $table->foreign('code_emitter')->references('id')->on('users');
            $table->foreign('code_produto')->references('id')->on('produtos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrinhos');
    }
};
