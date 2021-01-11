<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bolsista_id');
            $table->unsignedBigInteger('situacao_id')->nullable();
            $table->unsignedBigInteger('edital_id');
            $table->String('nome_projeto');
            $table->String('justificativa');
            $table->String('campus');
            $table->String('area');
            $table->longtext('problemas');
            $table->longtext('caracteristicas');
            $table->longtext('publico_alvo');
            $table->longtext('dificuldades');
            $table->longtext('disponibilidade');
            $table->longtext('resultados');
            $table->longtext('nomeMentor');
            $table->longtext('instituicao');
            $table->longtext('areaMentor');
            $table->string('email');
            $table->string('telefone');
            $table->foreign('bolsista_id')->references('id')->on('mentorados');
            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('edital_id')->references('id')->on('editais');
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
        Schema::dropIfExists('projetos');
    }
}
