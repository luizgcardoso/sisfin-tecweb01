<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id('idPagamento');
            $table->unsignedBigInteger('idFornecedor');
            $table->string('descricao', 255);
            $table->decimal('valor', 10, 2);
            $table->date('dataPag');

            $table->foreign('idFornecedor')->references('idFornecedor')->on('fornecedores');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};