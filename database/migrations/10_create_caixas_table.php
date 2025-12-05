<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    Schema::create('caixas', function (Blueprint $table) {
      $table->id('idCaixa');
      $table->string('nome', 150);
      $table->decimal('saldoInicial', 10, 2)->default(0);
      $table->date('dataAbertura')->nullable();
    });
  }

  public function down()
  {
    Schema::dropIfExists('caixas');
  }
};