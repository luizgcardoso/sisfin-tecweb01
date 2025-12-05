<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id('idDespesa');
            $table->string('descricao', 255);
            $table->string('categoria', 150)->nullable();
            $table->decimal('valor', 10, 2);
            $table->date('dataDesp');
        });
    }

    public function down()
    {
        Schema::dropIfExists('despesas');
    }
};