<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class  Mentorado extends Model
{
    protected $table = 'mentorados';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'data_nascimento', 'curso', 'periodo', 'turno', 'telefone',
        'cpf', 'rg', 'anexo', 'banco', 'agencia', 'conta', 'endereco',
        'email', 'bairro', 'numero', 'complemento'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function projetos(){
        return $this->belongsToMany(
            Projeto::class);
    }







}
