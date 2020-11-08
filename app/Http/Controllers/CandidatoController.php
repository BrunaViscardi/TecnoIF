<?php

namespace App\Http\Controllers;
use App\Candidato;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidatoController extends Controller
{
    public function formCadastro()
    {
        return view( 'home.cadastro');
    }
    public function debug(Request $request)
    {
        var_dump($request->except('_token'));

        $this->validate($request, [
            'cpf' => 'required|cpf',
        ]);
        
    }



}
