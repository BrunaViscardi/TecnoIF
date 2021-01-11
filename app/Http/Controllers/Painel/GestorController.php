<?php

namespace App\Http\Controllers\Painel;

use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\JustificarRequest;
use App\Mentorado;
use App\Mentorado_projeto;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestorController extends Controller
{
    public $request = null;
    private $repositoryEditais;
    private $repositoryProjetos;
    private $repositorySituacao;
    private $repositoryGestores;
    private $repositoryUsers;
    private $repositoryMentorado;
    private $repositoryRelacionamento;
    public function __construct(Request $request,  Mentorado $mentorado, Gestor $gestor, User $user, Edital $edital, Projeto  $projeto, Situacao $situacao, Mentorado_projeto $relacionamento)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
        $this->repositoryEditais = $edital;
        $this->repositoryProjetos = $projeto;
        $this->repositoryMentorado = $mentorado;
        $this->repositorySituacao = $situacao;
        $this->repositoryRelacionamento = $relacionamento;
    }
    public function acompanharProjetos()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
            $edital = Edital::all();
            return view('painel.equipe.acompanharProjetos', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function configuracoes()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.coordenador.configuracoes', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function alterarSenha()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.equipe.alterarSenha', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function visualizarProjeto($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projeto =  $this->repositoryProjetos->find($id);
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            $situacao = $this->repositorySituacao->where('id', $projeto->situacao_id)->first();
            return view('painel.equipe.visualizarProjeto', compact('user', 'urlAtual', 'projeto','edital', 'situacao'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function equipe($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projeto = Projeto::find($id);
            $equipe = $projeto->equipe;
            return view('painel.equipe.equipe', compact('user', 'urlAtual', 'projeto', 'equipe'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function visualizarParticipante( $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $participante =$this->repositoryMentorado->where('id', $id)->first();

            return view('painel.equipe.visualizarParticipante', compact('user', 'urlAtual', 'participante'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function aprovar($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $projeto = $this->repositoryProjetos->where('id', $id)->first();
            if (!$projeto) {
                return $projeto()->back();
            }elseif ($projeto->situacao->situacao == "Inscrito")
            {
            $projeto->update(['situacao_id' => 2]);
            }
            elseif ($projeto->situacao->situacao == "Em andamento")
            {
                $projeto->update(['situacao_id' => 3]);
            }
            return redirect()->route('painel.equipe.acompanhar');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function filtrar(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::get($request->filtro);
           // dd($projetos);
            //$projetos = Projeto::all();
            $edital = Edital::all();

            return view('painel.equipe.acompanharProjetos', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function rejeitar($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projeto = $this->repositoryProjetos->where('id', $id)->first();
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            /* if (!$projeto)
               return $projeto()->back();
           $projeto->update(['situacao_id' => 4]);
           return redirect()->route('painel.coordenador.acompanharProjetos');*/
            return view('painel.coordenador.justificar', compact(  'projeto', 'edital', 'user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function  justificarCreate($id,  JustificarRequest $request ){
        $projeto = $this->repositoryProjetos->where('id', $id)->first();
        if (!$projeto)
            return $projeto()->back();
        $projeto->update(['situacao_id' => 4]);
        $projeto->update(['j' => $request->justificar]);
        return redirect()->route('painel.coordenador.acompanharProjetos');
    }

}
