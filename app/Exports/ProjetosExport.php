<?php

namespace App\Exports;
use App\Projeto;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjetosExport implements FromQuery, WithHeadings
{
    protected $request;
    private $filtro, $situacao;
    public function __construct($request)
    {
        $this->request = $request;
        $this->filtro = $request->filtro ?? '%';
        $this->situacao = $request->situacao ?? '%';
    }
    /**
     * @return Collection
     */

    public function query()
    {
        return Projeto::where('nome_projeto', 'LIKE', '%' . $this->filtro . '%')
            ->orWhere('projetos.area', 'LIKE', '%' . $this->filtro . '%')
            ->orWhere('projetos.campus', 'LIKE', '%' . $this->filtro . '%')
            ->orWhere('projetos.email', 'LIKE', '%' . $this->filtro . '%')
            ->orWhereHas('situacao', function($q)
            {
                $q->where('situacao', 'like', '%' . $this->filtro . '%');
            })
            ->orWhereHas('edital', function($q)
            {
                $q->where('nome', 'like', '%' . $this->filtro . '%');
            })
            ->orWhereHas('edital', function($q)
            {
                $q->where('situacao', 'like', '%' . $this->filtro . '%');
            });
    }

    public function headings(): array
    {
        return [
            'id',
            'Projeto',
            'Campus',
            'Área',
            'Mentor',
            'Instuição do Mentor',
            'Área de atuação do Mentor',
            'E-mail do mentor',
            'Telefone do mentor',
            'Problemas/necessidades do projeto',
            'Características e diferenciais da solução',
            'Público alvo',
            'Dificuldades e necessidades',
            'Disponibilidade e motivação',
            'Resultados esperados',
        ];
    }

}
