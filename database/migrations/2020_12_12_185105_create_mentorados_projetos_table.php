<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoradosProjetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorados_projetos', function (Blueprint $table) {
            $table->unsignedBigInteger('mentorado_id')->unsigned();
            $table->foreign('mentorado_id')->references('id')->on('mentorados')->onDelete('cascade');
            $table->unsignedBigInteger('projeto_id')->unsigned();
            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');
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
