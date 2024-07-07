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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code_user');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->longText('description');
            $table->decimal('comprimento', 5,2);
            $table->decimal('peso', 5,2);
            $table->longText('img');
            $table->unsignedBigInteger('code_condition')->default(1);
            $table->unsignedBigInteger('code_estado')->default(1);
            $table->timestamps();

            $table->foreign('code_user')->references('id')->on('users');
            $table->foreign('code_condition')->references('id')->on('conditions');
            $table->foreign('code_estado')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
        // Remova a chave estrangeira e a coluna se necessário
        $table->dropForeign(['code_user']);
        $table->dropColumn('code_user');
    }
};
