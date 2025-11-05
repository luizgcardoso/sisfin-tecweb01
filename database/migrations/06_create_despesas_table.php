<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('tipoDespesa');
            $table->date('data');
            $table->date('dataVenc');
            $table->decimal('valor', 10, 2);
            $table->string('descricao')->nullable();
            $table->unsignedBigInteger('idFornecedor');
            $table->foreign('idFornecedor')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('despesas');
    }
};