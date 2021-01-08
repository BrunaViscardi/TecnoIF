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
        'areaMentor', 'email', 'telefone', 'campus', 'edital_id', 'id'
    ];
    public function situacao(){
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
    public static function get($filtro = '%')
    {
        return DB::table('projetos')
            ->join('situacoes', 'situacoes.id', '=', 'projetos.situacao_id')
            ->join('editais', 'editais.id', '=', 'projetos.edital_id')
            ->select('projetos.*')
            ->distinct()
            ->where('projetos.nome_projeto', 'LIKE', '%' . $filtro . '%')
            ->orWhere('projetos.area', 'LIKE', '%' . $filtro . '%')
            ->orWhere('projetos.campus', 'LIKE', '%' . $filtro . '%')
            ->orWhere(function ($query) use ($filtro) {
                $query->where('situacoes.situacao', 'LIKE', '%' . $filtro . '%');
           })
            ->orWhere(function ($query) use ($filtro) {
                $query->where('editais.nome', 'LIKE', '%' . $filtro . '%');
            })
            ->get();
    }




}

