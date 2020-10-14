<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProjetoController extends Controller
{
    public function debug(Request $request)
    {
        var_dump($request->except('_token'));
        $projeto = new Projeto();
        $projeto->nome_projeto = $request->nome_projeto;
        $projeto->expectativa = $request->expectativa;
        $projeto->area = $request->area;

    }





}
