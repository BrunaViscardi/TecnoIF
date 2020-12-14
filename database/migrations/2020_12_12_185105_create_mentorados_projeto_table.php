<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoradosProjetoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorados_projeto', function (Blueprint $table) {
            $table->unsignedBigInteger('id_mentorado')->unsigned();
            $table->foreign('id_mentorado')->references('id')->on('mentorados')->onDelete('cascade');
            $table->unsignedBigInteger('id_projeto')->unsigned();
            $table->foreign('id_projeto')->references('id')->on('projetos')->onDelete('cascade');


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
        Schema::dropIfExists('mentorados_projeto');
    }
}
