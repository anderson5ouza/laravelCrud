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
            $table->unsignedBigInteger('categoria_id');
            $table->string('codigo', 10)->unique();
            $table->string('produto', 60);
            $table->text('descricao');
            $table->boolean('disponivel');
            $table->decimal('preco',8,2)->default('0.00');
            $table->string('imagem', 120)->nullable();
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->dropForeign('produtos_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });

        Schema::dropIfExists('produtos');
    }
};
