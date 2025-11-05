<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('tipoAcesso');
            $table->string('inscricao')->nullable();
            $table->string('nome');
            $table->string('endereco')->nullable();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('sexo')->nullable();
            $table->date('dtNasc')->nullable();
            $table->text('obs')->nullable();
            $table->unsignedBigInteger('idCidade')->nullable();
            $table->foreign('idCidade')->references('id')->on('cidades')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
};