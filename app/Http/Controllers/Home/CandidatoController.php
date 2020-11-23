<?php

namespace App\Http\Controllers\Home;
use App\Candidato;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\User;


class CandidatoController extends Controller
{
    public function create()
    {
        return view( 'home.cadastro');
    }
    public function store(StoreUserRequest $request)
    {
        dd($request->all());
        $candidatos = new candidato();
        $candidatos->nome = $request-> nome;
        $candidatos-> data_nascimento = nascimento;
        $candidatos->curso = $request-> curso;
        $candidatos->periodo = $request-> periodo;
        $candidatos->turno = $request-> turno;
        $candidatos->telefone = $request-> telefone;
        $candidatos->cpf = $request-> cpf;
        $candidatos->rg = $request-> rg;
        $candidatos->file = $request-> anexo;
        $candidatos->banco = $request-> banco;
        $candidatos->agencia = $request-> agencia;
        $candidatos->conta = $request-> conta;
        $candidatos->endereco = $request-> endereco;
        $candidatos->bairro = $request-> bairro;
        $candidatos->numero = $request-> numero;
        $candidatos->complemento = $request-> complemento;
        $candidatos->save();
        $users = new User();
        $users->name = $request-> nome;
        $users->role = 1;
        $users->email =  $request-> email;
        $users-> password = $request-> cpf;
        $users->name = $request-> nome;
        User::create([
            'role' => $users['role'],
            'name' => $users['name'],
            'email' => $users['email'],
            'password' => Hash::make($users['password']),
        ]);

    }

}
