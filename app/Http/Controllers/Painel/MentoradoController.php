<?php

namespace App\Http\Controllers\Painel;

use App\Gestor;
use App\Http\Requests\AlterarPerfilRequest;
use App\Http\Requests\equipeRequest;
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
            $projetos->bolsista_id = $user->mentorado_id;
            $projetos->save();

            //adiciona mentorado ao projeto (na tabela intermediaria)
            $mentorado = $user->mentorado;
            $projetos->equipe()->attach($mentorado);
            $projetos->save();

            /*
            $mp = new Mentorado_projeto();
            $mp->projeto_id = $projetos->id;
            $mp->mentorado_id = $user->mentorado_id;
            $mp->save();//*/
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
            $editais = Edital::where('situacao', 'Inscrições Abertas')->get();
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
            $projetos = Projeto::where('bolsista_id', $user->mentorado_id)->get();


            $editais = Edital::where('situacao', 'Inscrições Abertas')->get();
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
    public function alteracaoPerfil(AlterarPerfilRequest $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $candidatos =$this->repositoryMentorado->where('email', $user->email)->first();
            if (!$candidatos)
                return redirect()->back();
            $candidatos->update($request->all());
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
            $projeto = Projeto::find($id);
           $equipe = $projeto->equipe;
            return view('painel.mentorado.equipe', compact('user', 'urlAtual', 'projeto', 'equipe'));
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

            //adiciona projeto ao mentorado (adiciona na tabela intermediaria)
            $projeto = Projeto::find($id);
            $mentorado->projetos()->attach($projeto);
            $mentorado->save();
            /*$mp = new Mentorado_projeto();
            $mp-> projeto_id = $id;
            $mp-> mentorado_id = $mentorado->id;
            $mp->save();//*/


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
    public function edicaoParticipante(Request $request, $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $participante =$this->repositoryMentorado->where('id', $id)->first();
            $projeto = $this->repositoryRelacionamento->where('mentorado_id', $id)->first();
            if (!$participante){
                return redirect()->back();
            }
            if ($participante->id == $user->mentorado_id )
            {
                $user->update(['name' => $request->nome]);
            }
            $participante->update($request->all());

            return redirect()->route('painel.mentorado.equipe', $projeto->projeto_id);
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function editarParticipante( $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $participante =$this->repositoryMentorado->where('id', $id)->first();


            return view('painel.mentorado.editarParticipante', compact('user', 'urlAtual', 'participante'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function deleteParticipante( $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $participante =$this->repositoryMentorado->where('id', $id)->first();
            $projeto = $this->repositoryRelacionamento->where('mentorado_id', $id)->first();
            if (!$participante)
                return redirect()->back();
            $participante->delete();
            return redirect()->route('painel.mentorado.equipe', $projeto->projeto_id);

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

            return view('painel.mentorado.visualizarParticipante', compact('user', 'urlAtual', 'participante'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }



}
