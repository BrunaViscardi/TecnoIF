<?php

namespace App\Http\Controllers;

use App\Edital;
use App\Gestor;

use App\Http\Requests\AlterarPerfilRequest;
use App\Mentorado;
use App\Mentorado_projeto;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracaoController extends Controller
{
    public $request = null;
    private $repositoryGestores;
    private $repositoryUsers;
    private $repositoryEditais;
    private $repositoryMentorado;
    private $repositorySituacao;
    private $repositoryProjeto;
    private $repositoryRelacionamento;

    public function __construct(Request $request, Gestor $gestor, User $user, Edital $edital, Projeto  $projeto, Situacao $situacao, Mentorado $mentorado, Mentorado_projeto $relacionamento)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
        $this->repositoryEditais = $edital;
        $this->repositoryProjeto = $projeto;
        $this->repositorySituacao = $situacao;
        $this->repositoryMentorado = $mentorado;
        $this->repositoryRelacionamento = $relacionamento;
    }



    public function updateSenha()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('configuracoes.updateSenha', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function updatePerfilView()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            return view('configuracoes.updatePerfilView', compact('user', 'urlAtual', 'candidatos'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updatePerfil(AlterarPerfilRequest $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();

            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            if (!$candidatos)
                return redirect()->back();
            $candidatos->update($request->all());
            $user->update(['name'=> $request->nome]);
            return redirect()->route('painel.home');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

}
