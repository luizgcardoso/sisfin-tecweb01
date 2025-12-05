<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->id('idMembro');
            $table->unsignedBigInteger('idPessoa');
            $table->string('funcao', 100)->nullable();
            $table->date('dataEntrada')->nullable();

            $table->foreign('idPessoa')->references('idPessoa')->on('pessoas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('membros');
    }
};