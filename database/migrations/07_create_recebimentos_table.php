<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('recebimentos', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('tipoRecebimento');
            $table->date('dataRec');
            $table->time('horaRec');
            $table->decimal('valor', 10, 2);
            $table->string('descricao')->nullable();
            $table->string('mesRef')->nullable();
            $table->string('formaRecebimento')->nullable();
            $table->unsignedBigInteger('idMembro');
            $table->foreign('idMembro')->references('id')->on('membros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('recebimentos');
    }
};