<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('projeto_id');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->String('curso')->nullable();
            $table->String('periodo')->nullable();
            $table->String('turno')->nullable();
            $table->string('telefone');
            $table->string('cpf');
            $table->string('rg');
            $table->binary('file')->nullable();
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->string('endereco');
            $table->string('email');
            $table->string('bairro');
            $table->integer('numero');
            $table->string('complemento');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('projeto_id')->references('id')->on('projetos');

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
        Schema::dropIfExists('candidatos');
    }
}
