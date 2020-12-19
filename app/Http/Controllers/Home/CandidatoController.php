<?php

namespace App\Http\Controllers\Home;
use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Mentorado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CandidatoController extends Controller
{
    public function create()
    {
        return view( 'home.cadastro');
    }
    public function __construct(Request $request, Mentorado $candidado)
    {
        $this->request = $request;
        $this->repositoryMentorados = $candidado;
    }
    public function store(StoreUserRequest $request)
    {
        $candidatos = new  Mentorado();
        $candidatos->nome = $request-> nome;
        $candidatos-> data_nascimento =  $request-> nascimento;
        $candidatos-> email =  $request-> email;
        $candidatos->campus = $request-> campus;
        $candidatos->curso = $request-> curso;
        $candidatos->periodo = $request-> periodo;
        $candidatos->turno = $request-> turno;
        $candidatos->telefone = $request-> telefone;
        $candidatos->cpf = $request-> cpf;
        $candidatos->anexo = $request-> anexo;
        $candidatos->rg = $request-> rg;
        $candidatos->anexo = $request-> anexo;
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
        $users->role = 0;
        $users->email =  $request-> email;
        $users-> password = $request-> cpf;
        $users->name = $request-> nome;
        $users->mentorado_id= $candidatos->id;
        User::create([
            'role' => $users['role'],
            'name' => $users['name'],
            'email' => $users['email'],
            'mentorado_id' => $users['mentorado_id'],
            'password' => Hash::make($users['password']),
        ]);



        return redirect()->route('painel.login');

    }

}
