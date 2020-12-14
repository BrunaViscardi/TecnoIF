<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentorado_projeto extends Model
{
    protected $table = 'mentorados_projeto';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function Mentorados()
    {
        return $this->morphToMany(Mentorado::class, 'taggable');
    }
    public function Projetos()
    {
        return $this->morphToMany(Projeto::class, 'taggable');
    }
}
