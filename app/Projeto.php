<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $table = 'projetos';
    protected $fillable = [
        'nome_projeto','situacao_id','area','area', 'problemas', 'caracteristicas',
        'publico_alvo', 'dificuldades', 'disponibilidade', 'resultados', 'nomeMentor', 'instituicao',
        'areaMentor', 'email', 'telefone', 'campus', 'edital_id', 'id'
    ];
     public function candidatos(){
         $this->hasMany(Mentorado::class);
     }
    public function edital(){
        $this->hasOne(Edital::class);
    }
}
