<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id('idEstado');
            $table->string('nome', 100);
            $table->string('desc', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
};