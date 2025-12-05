<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id('idCidade');
            $table->string('nome', 150);

            $table->unsignedBigInteger('idEstado');

            $table->foreign('idEstado')
                ->references('idEstado')
                ->on('estados')
                ->onDelete('cascade');
        });
    }



    public function down()
    {
        Schema::dropIfExists('cidades');
    }
};