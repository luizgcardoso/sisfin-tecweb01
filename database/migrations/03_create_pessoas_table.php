<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id('idPessoa');
            $table->string('nome', 150);
            $table->string('email', 150)->nullable();
            $table->string('fone', 20)->nullable();
            $table->string('endereco', 255)->nullable();
            $table->text('obs')->nullable();
            $table->unsignedBigInteger('idCidade');

            $table->foreign('idCidade')->references('idCidade')->on('cidades');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};