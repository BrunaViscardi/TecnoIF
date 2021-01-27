<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projeto extends Model
{
    protected $table = 'projetos';
    protected $fillable = [
        'nome_projeto', 'situacao_id', 'area', 'area', 'problemas', 'caracteristicas',
        'publico_alvo', 'dificuldades', 'disponibilidade', 'resultados', 'nomeMentor', 'instituicao',
        'areaMentor', 'justificativa', 'email', 'telefone', 'campus', 'edital_id', 'id'
    ];

    public function situacao()
    {
        return $this->belongsTo(Situacao::class);
    }

    public function equipe()
    {
        return $this->belongsToMany(
            Mentorado::class,
            'mentorados_projetos',
            'projeto_id',
            'mentorado_id'
        );
    }

    public function edital()
    {
        return $this->belongsTo(Edital::class);
    }

    public function bolsista()
    {
        return $this->belongsTo(Mentorado::class, 'bolsista_id');
    }
    public static function buscar($filtros = ['filtro'=>'%','situacao'=>'%'])
    {
        $filtro = $filtros['filtro'];
        $situacao = $filtros['situacao'];
        return Projeto::where(function ($query) use ($filtro) {
            $query->where('nome_projeto', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.area', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.campus', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.email', 'LIKE', '%' . $filtro . '%')
                ->orWhereHas('edital', function($q) use ($filtro)
                {
                    $q->where('nome', 'like', '%' . $filtro . '%');
                })
                ->orWhereHas('situacao', function($q) use ($filtro)
                {
                    $q->where('situacao', 'like', '%' . $filtro . '%');
                })
            ;
        })
            ->where(function ($query) use ($situacao) {
                $query->whereHas('edital', function($q) use ($situacao)
                {
                    $q->where('situacao', 'like', '%' . $situacao . '%');
                });
            });
    }



}

