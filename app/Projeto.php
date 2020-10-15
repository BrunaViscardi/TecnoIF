<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projetos';
    protected $fillable = [
        'nome_projeto','expectativa','area', 'id_situacao'
    ];
     public function candidatos(){

         $this->hasMany(Candidato::class);
     }

}
