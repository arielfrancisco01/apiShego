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
        Schema::create('fretes', function (Blueprint $table) {
            $table->id();
            $table->decimal('comprimento', 10,2);
            $table->decimal('peso', 10,2);
            $table->bigInteger('prazo');
            $table->string('transportadora');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fretes');
    }
};
