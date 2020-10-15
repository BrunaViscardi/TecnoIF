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
        return view( 'auth.cadastro');
    }
    public function debug(Request $request)
    {
        var_dump($request->except('_token'));

        $this->validate($request, [
            'cpf' => 'required|cpf',
        ]);
        $candidatos = new Candidato();
        $candidatos->nome = $request-> nome;
        $candidatos->data_nascimento=$request->data_nascimento;
        $candidatos->curso = $request-> curso;
        $candidatos->periodo = $request-> periodo;
        $candidatos->turno = $request-> turno;
        $candidatos->email = $request-> email;
        $candidatos->telefone = $request-> telefone;
        $candidatos->cpf = $request-> cpf;
        $candidatos->rg = $request-> rg;
        $candidatos->file = $request-> file;
        $candidatos->banco = $request-> banco;
        $candidatos->agencia = $request-> agencia;
        $candidatos->conta = $request-> conta;
        $candidatos->endereco = $request-> endereco;
        $candidatos->bairro = $request-> bairro;
        $candidatos->numero = $request-> numero;
        $candidatos->complemento =$request->complemento;
        $candidatos->save();

        $users = new user();
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
