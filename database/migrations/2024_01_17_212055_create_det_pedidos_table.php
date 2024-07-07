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
        Schema::create('det_pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_pedido');
            $table->unsignedBigInteger('code_produto');
            $table->unsignedBigInteger('code_cor');
            $table->unsignedBigInteger('code_tamanho');
            $table->unsignedBigInteger('code_frete');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('quantidade');
            $table->timestamps();

            $table->foreign('code_pedido')->references('id')->on('pedidos');
            $table->foreign('code_produto')->references('id')->on('produtos');
            $table->foreign('code_cor')->references('id')->on('cors');
            $table->foreign('code_tamanho')->references('id')->on('tamanhos');
            $table->foreign('code_frete')->references('id')->on('fretes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('det_pedidos');
    }
};
