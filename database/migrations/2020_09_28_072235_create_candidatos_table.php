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
            $table->unsignedBigInteger('idProjeto');
            $table->string('NomeTitular');
            $table->date('DataNascimento');
            $table->integer('Curso');
            $table->String('Período');
            $table->String('Turno');
            $table->string('Telefone');
            $table->string('CPF');
            $table->string('RG');
            $table->binary('File');
            $table->string('Banco');
            $table->string('Agencia');
            $table->string('Conta');
            $table->string('Endereco');
            $table->string('Bairro');
            $table->string('Numero');
            $table->string('Complemento');
            $table->foreign('idProjeto')->references('id')->on('projetos');
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
