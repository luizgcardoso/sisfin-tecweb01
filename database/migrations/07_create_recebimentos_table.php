<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('recebimentos', function (Blueprint $table) {
            $table->id('idRecebimento');
            $table->unsignedBigInteger('idMembro');
            $table->string('descricao', 255);
            $table->decimal('valor', 10, 2);
            $table->date('dataRec');

            $table->foreign('idMembro')->references('idMembro')->on('membros');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recebimentos');
    }
};