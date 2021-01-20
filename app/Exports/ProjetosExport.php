<?php

namespace App\Exports;
use App\Projeto;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProjetosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Projeto::all();
    }
}
