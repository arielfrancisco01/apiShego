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
        Schema::create('residencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_user')->unique();
            $table->unsignedBigInteger('code_municipio')->unique();
            $table->string('bairro');
            $table->string('avenida');
            $table->timestamps();

            $table->foreign('code_user')->references('id')->on('users');
            $table->foreign('code_municipio')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residencias');
    }
};
