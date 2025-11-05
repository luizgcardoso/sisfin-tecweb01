<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('itens_caixa', function (Blueprint $table) {
            $table->id();
            $table->string('tipoItem'); // recebimento ou pagamento
            $table->date('data');
            $table->decimal('valor', 10, 2);
            $table->string('desc')->nullable();
            $table->unsignedBigInteger('idPessoa')->nullable();
            $table->foreign('idPessoa')->references('id')->on('pessoas')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('itens_caixa');
    }
};