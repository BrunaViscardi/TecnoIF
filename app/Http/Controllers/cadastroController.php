<?php

namespace App\Http\Controllers;

use App\projetos;
use App\candidatos;
use Illuminate\Http\Request;

class cadastroController extends Controller
{
   public function formCadastro()
   {
       return view( 'cadastro');
   }
    public function debug(Request $request)
    {
      var_dump($request->except('_token'));
      $projetos = new projetos();
      $projetos->NomeProjeto = $request-> NomeProjeto;
      $projetos->Area = $request-> Area;
      $projetos->Email = $request-> Email;
      $projetos->Expectativa = $request-> Expectativa;
      $projetos->save();

      $candidatos = new candidatos();
      $candidatos->idProjeto =0 ;
      $candidatos->NomeTitular = $request-> NomeTitular;
      $candidatos->DataNascimento =
      $candidatos->Curso = $request-> Curso;
      $candidatos->Período = $request-> Período;
      $candidatos->Turno = $request-> Turno;
      $candidatos->Telefone = $request-> Telefone;
      $candidatos->CPF = $request-> CPF;
      $candidatos->RG = $request-> RG;
      $candidatos->File = $request-> File;
      $candidatos->Banco = $request-> Banco;
      $candidatos->Agencia = $request-> Agencia;
      $candidatos->Conta = $request-> Conta;
      $candidatos->Endereco = $request-> Endereco;
      $candidatos->Bairro = $request-> Bairro;
      $candidatos->Numero = $request-> Numero;
      $candidatos->Complemento = $request-> Complemento;
      $candidatos->save();

    }


}
