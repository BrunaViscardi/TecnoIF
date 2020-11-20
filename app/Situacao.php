<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
    protected $table = 'situacoes';
    protected $fillable = [
        'situacao'
    ];
     public function Projeto(){

         $this->hasMany(Candidato::class);// 1 projeto pode ter vários candidatos
     }

}
