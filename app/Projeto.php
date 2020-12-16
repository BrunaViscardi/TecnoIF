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
     public function equipe(){
         return $this->belongsToMany(
             Mentorado::class
            // 'mentorados_projetos',
             //'mentorado_id',
     //        'projeto_id'
         );


     }
    public function edital(){
        return $this->hasOne(Edital::class);
    }
    public function bolsista(){
       return $this->hasOne(Mentorado::class, 'bolsista_id');
    }
}
