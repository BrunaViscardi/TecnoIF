<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    protected $table = 'projeto';
    protected $fillable = [
        'nome_projeto','expectativa','area'
    ];
     public function candidatos(){

         $this->hasMany(Candidato::class);// 1 projeto pode ter vários candidatos
     }

}
