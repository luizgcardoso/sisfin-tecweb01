<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('itens_caixa', function (Blueprint $table) {
            $table->id('idItem');
            $table->unsignedBigInteger('idCaixa');
            $table->string('descricao', 255);
            $table->decimal('valor', 10, 2);
            $table->enum('tipo', ['E', 'S']); // Entrada/Saída
            $table->date('dataMov');

            $table->foreign('idCaixa')->references('idCaixa')->on('caixas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens_caixa');
    }
};