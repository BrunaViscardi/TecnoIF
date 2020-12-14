<?php

namespace App\Http\Controllers\Painel;

use App\Gestor;
use App\Http\Requests\equipeRequest;
use App\Http\Requests\StoreUserRequest;
use App\Mentorado;
use App\Edital;
use App\Http\Controllers\Controller;
use App\Http\Requests\EdicaoSenhaRequest;
use App\Http\Requests\ProjetoRequest;
use App\Mentorado_projeto;
use App\projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MentoradoController extends Controller
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

    public function create(ProjetoRequest $request)
    {

        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = new Projeto();
            $projetos->nome_projeto = $request->nome_projeto;
            $projetos->campus = $request->campus;
            $projetos->area = $request->area;
            $projetos->situacao_id = 1;
            $projetos->edital_id = $request->editalId;
            $projetos->problemas = $request->problemas;
            $projetos->caracteristicas = $request->caracteristicas;
            $projetos->publico_alvo = $request->publico_alvo;
            $projetos->dificuldades = $request->dificuldades;
            $projetos->disponibilidade = $request->disponibilidade;
            $projetos->resultados = $request->resultados;
            $projetos->nomeMentor = $request->nomeMentor;
            $projetos->instituicao = $request->instituicao;
            $projetos->areaMentor = $request->areaMentor;
            $projetos->email = $request->email;
            $projetos->telefone = $request->telefone;
            $projetos->save();
            $mp = new Mentorado_projeto();
            $mp->id_projeto = $projetos->id;
            $i = $this->repositoryMentorado->where('email', $user->email)->first();
            $mp->id_mentorado = $i->id;
            $mp->save();
            return redirect()->route('painel.mentorado.gerenciarProjeto');

        }
        Auth::logout();
        return redirect()->route('painel.login');
    }


    public function index()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
            return view('painel.mentorado.gerenciarProjeto', compact('user', 'urlAtual', 'projetos'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function cadastro($editalId)
    {

        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.mentorado.cadastro', compact('user', 'urlAtual', 'editalId'));
        }


        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function editais()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais = Edital::all();
            return view('painel.mentorado.editais', compact('user', 'urlAtual', 'editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }



    public function gerenciarProjeto()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
            $editais = Edital::all();
            return view('painel.mentorado.gerenciarProjeto', compact('user', 'urlAtual', 'projetos', 'editais'));
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
            return view('painel.mentorado.configuracoes', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function dashboard()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.mentorado.dashboard', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function editar($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = $this->repositoryProjeto->find($id);
            if (!$projetos)
                return redirect()->back();
            return view('painel.mentorado.cadastroEdit', compact('user', 'urlAtual', 'projetos'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function cadastroEdit(Request $request, $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projetos = $this->repositoryProjeto->find($id);
            if (!$projetos)
                return redirect()->back();
            $projetos->update($request->all());
            return redirect()->route('painel.mentorado.gerenciarProjeto');
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

            return view('painel.mentorado.alterarSenha', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function alteracao(EdicaoSenhaRequest $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function alterarPerfil()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            return view('painel.mentorado.alterarPerfil', compact('user', 'urlAtual', 'candidatos'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function alteracaoPerfil(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            if (!$candidatos)
                return redirect()->back();
            $candidatos->update($request->all());
            $user->update($request->all());
            return redirect()->route('painel.mentorado.gerenciarProjeto');
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
            $projeto =  $this->repositoryProjeto->find($id);
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            $situacao = $this->repositorySituacao->where('id', $projeto->situacao_id)->first();
            return view('painel.mentorado.visualizarProjeto', compact('user', 'urlAtual', 'projeto','edital', 'situacao'));
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
            $projeto = $this->repositoryProjeto->where('id', $id)->first();
            $aux = $this->repositoryRelacionamento->where('id_projeto', $id);

            $equipe = $this->repositoryMentorado;
            dd($aux);
            return view('painel.mentorado.equipe', compact('user', 'urlAtual', 'equipe','projeto'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function createEquipe(equipeRequest $request, $id)
    {

        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $mentorado = new  Mentorado();
            $mentorado->nome = $request-> nome;
            $mentorado-> data_nascimento =  $request-> nascimento;
            $mentorado-> email =  $request-> email;
            $mentorado->curso = $request-> curso;
            $mentorado->periodo = $request-> periodo;
            $mentorado->turno = $request-> turno;
            $mentorado->telefone = $request-> telefone;
            $mentorado->cpf = $request-> cpf;
            $mentorado->rg = $request-> rg;
            $mentorado->campus = $request-> campus;
            $mentorado->endereco = $request-> endereco;
            $mentorado->save();
            $mp = new Mentorado_projeto();
            $mp-> id_projeto = $id;
            $mp-> id_mentorado = $mentorado->id;
            $mp->save();


            return redirect()->route('painel.mentorado.equipe', compact('id'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function cadastroEquipe($id)
    {

        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projeto = $this->repositoryProjeto->where('id', $id)->first();
            return view('painel.mentorado.cadastroEquipe', compact('user', 'urlAtual', 'id','projeto'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

}
