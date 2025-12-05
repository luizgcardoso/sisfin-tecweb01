<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id('idFornecedor');
            $table->string('nome', 150);
            $table->string('telefone', 20)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('obs')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
};