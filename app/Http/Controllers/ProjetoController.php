<?php

namespace App\Http\Controllers;

use App\Edital;
use App\Gestor;
use App\Http\Requests\JustificarRequest;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    public $request = null;
    private $repositoryGestores;
    private $repositoryUsers;
    private $repositoryEditais;
    private $repositoryProjetos;
    private $repositorySituacao;

    public function __construct(Request $request, Gestor $gestor, User $user, Edital $edital, Projeto  $projeto, Situacao $situacao)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
        $this->repositoryEditais = $edital;
        $this->repositoryProjetos = $projeto;
        $this->repositorySituacao = $situacao;
    }
    public function index()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos =  $this->repositoryProjetos->orderBy('nome_projeto')->paginate(4);
            $edital = Edital::all();
            return view('projetos.index', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function show($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projeto =  $this->repositoryProjetos->find($id);
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            $situacao = $this->repositorySituacao->where('id', $projeto->situacao_id)->first();
            return view('projetos.show', compact('user', 'urlAtual', 'projeto','edital', 'situacao'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function deletarProjeto( $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projeto = $this->repositoryProjetos->where('id', $id);
            if (!$projeto)
                return redirect()->back();
            $projeto->delete();
            return redirect()->route('painel.coordenador.acompanharProjetos');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function updateAprovacao($id)
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
            return redirect()->route('projetos.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateRejeicaoView($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projeto = $this->repositoryProjetos->where('id', $id)->first();
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            return view('projetos.updateRejeicaoView', compact(  'projeto', 'edital', 'user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateRejeicao($id,  JustificarRequest $request ){
        $projeto = $this->repositoryProjetos->where('id', $id)->first();
        if (!$projeto)
            return $projeto()->back();
        $projeto->update(['situacao_id' => 4]);
        $projeto->update(['justificativa' => $request->justificar]);
        return redirect()->route('projetos.index');
    }

    public function filtro(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $filtro = $request->filtro;
            $edital = Edital::all();


            $projetos = Projeto::where('nome_projeto', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.area', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.campus', 'LIKE', '%' . $filtro . '%')
                ->orWhere('projetos.email', 'LIKE', '%' . $filtro . '%')
                ->orWhereHas('situacao', function($q) use ($filtro)
                {
                    $q->where('situacao', 'like', '%' . $filtro . '%');
                })
                ->orWhereHas('edital', function($q) use ($filtro)
                {
                    $q->where('nome', 'like', '%' . $filtro . '%');
                })
                ->paginate(4);
            return view('painel.equipe.acompanharProjetos', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function painel()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('projetos.painel', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }





}
