<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('caixas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('data');
            $table->time('hora');
            $table->decimal('valorAbertura', 10, 2)->default(0);
            $table->decimal('valorTotalPagamentos', 10, 2)->default(0);
            $table->decimal('valorTotalRecebimentos', 10, 2)->default(0);
            $table->decimal('saldo', 10, 2)->default(0);
            $table->unsignedBigInteger('idPessoa');
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('caixas');
    }
};