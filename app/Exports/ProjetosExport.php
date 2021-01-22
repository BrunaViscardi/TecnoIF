<?php

namespace App\Exports;
use App\Projeto;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjetosExport implements FromCollection, WithHeadings
{
    /**
    * @return Collection
    */
    public function collection ()
    {
        return Projeto::all('id', 'nome_projeto', 'campus', 'area', 'NomeMentor', 'instituicao', 'areaMentor', 'email', 'telefone', 'problemas', 'caracteristicas', 'publico_alvo', 'dificuldades', 'disponibilidade', 'resultados');
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
