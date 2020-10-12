<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class candidato extends Model
{
    protected $table = 'candidatos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','data_nascimento','curso','periodo','turno','telefone',
        'cpf','rg','file','banco','agencia','conta','endereco',
         'email','bairro','numero',	'complemento'
    ];
    public function projetos()
    {
        $this->belongsTo(Projeto::class);//projeto pertence a candidato
    }
}
