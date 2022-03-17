<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeticaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peticoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 50)->nullable();
            $table->string('destinatario', 50)->nullable();
            $table->string('descricao', 3000)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peticoes');
    }
}
