<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->date('dataPag');
            $table->time('horaPag');
            $table->decimal('valor', 10, 2);
            $table->string('descricao')->nullable();
            $table->string('dataRef')->nullable();
            $table->string('formaPagamento')->nullable();
            $table->unsignedBigInteger('idDespesa');
            $table->foreign('idDespesa')->references('id')->on('despesas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
};