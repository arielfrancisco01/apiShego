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
        Schema::create('cat_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_produto');
            $table->unsignedBigInteger('code_categoria');
            $table->timestamps();

            $table->foreign('code_produto')->references('id')->on('produtos');
            $table->foreign('code_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cat_produtos');
    }
};
