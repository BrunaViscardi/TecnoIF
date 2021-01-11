<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $table = 'editais';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nome','link','data','situacao'

    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'data' => 'datetime',
    ];
    public static function get($filtro = '%')
    {
        return Edital::where('data', 'LIKE', '%' . $filtro . '%')
            ->orWhere('editais.nome', 'LIKE', '%' . $filtro . '%')
            ->orWhere('editais.situacao', 'LIKE', '%' . $filtro . '%')
            ->get();
    }

}
