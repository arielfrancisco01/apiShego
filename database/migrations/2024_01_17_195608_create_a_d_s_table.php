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
        Schema::create('a_d_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_produto');
            $table->unsignedBigInteger('code_ads');
            $table->decimal('new_price', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('code_produto')->references('id')->on('produtos');
            $table->foreign('code_ads')->references('id')->on('type_ads');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_d_s');
    }
};
