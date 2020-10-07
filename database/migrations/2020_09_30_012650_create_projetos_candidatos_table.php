<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos_candidatos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_projeto');
            $table->unsignedBigInteger('id_candidato');
            $table->foreign('id_projeto')->references('id')->on('projetos');
            $table->foreign('id_candidato')->references('id')->on('candidatos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projetos_candidatos');
    }
}
