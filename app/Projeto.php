<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projeto extends Model
{
    protected $table = 'projeto';
    protected $fillable = [
        'nome_projeto','expectativa','area'
    ];
}
