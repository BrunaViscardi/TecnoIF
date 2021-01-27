<?php

namespace App\Http\Controllers;

use App\Edital;
use App\Exports\ProjetosExport;
use App\Gestor;
use App\Http\Requests\equipeRequest;
use App\Http\Requests\JustificarRequest;
use App\Http\Requests\ProjetoRequest;
use App\Mentorado;
use App\Mentorado_projeto;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ProjetoController extends Controller
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
    public function index()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $edital = Edital::all();
            $projetos =  $this->repositoryProjetos->orderBy('nome_projeto')->paginate(4);

            if(Auth::user()->isCandidato()){
                $projetos =  $this->repositoryProjetos->where('bolsista_id', $user->mentorado_id)->orderBy('nome_projeto')->paginate(4);
                return view('projetos.index', compact('user',  'projetos', 'edital'));
            } else{
                return view('projetos.index', compact('user',  'projetos', 'edital'));
            }

             }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function show($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projeto =  $this->repositoryProjetos->find($id);
            $edital = $this->repositoryEditais->where('id', $projeto->edital_id)->first();;
            $situacao = $this->repositorySituacao->where('id', $projeto->situacao_id)->first();
            return view('projetos.show', compact('user','projeto','edital', 'situacao'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function deletarProjeto( $id)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
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
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true) {
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
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
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
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
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
            $filtro = $request->filtro ?? '%';
            $situacao = $request->situacao ?? '%';
            $projetos = Projeto::buscar(['filtro'=>$filtro,'situacao'=>$situacao])->paginate(4);
            return view('projetos.index', compact('user', 'projetos', 'filtro','situacao'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function painel()
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            return view('projetos.painel', compact('user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function showEquipe($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projeto = Projeto::find($id);
            $equipe = $projeto->equipe;
            return view('projetos.showEquipe', compact('user', 'projeto', 'equipe'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function showParticipante( $id)
    {
        if (Auth::check() === true){
            $user = Auth()->User();
            $participante =$this->repositoryMentorado->where('id', $id)->first();
            return view('projetos.showParticipante', compact('user',  'participante'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function createEquipeView($id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projeto = $this->repositoryProjetos->where('id', $id)->first();
            return view('projetos.createEquipeView', compact('user', 'id','projeto'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function createEquipe(equipeRequest $request, $id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
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
            $projeto = Projeto::find($id);
            $mentorado->projetos()->attach($projeto);
            $mentorado->save();
            return redirect()->route('projetos.showEquipe', compact('id'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateParticipanteView( $id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $participante =$this->repositoryMentorado->where('id', $id)->first();
            return view('projetos.updateParticipanteView', compact('user',  'participante'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateParticipante(Request $request, $id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
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
            return redirect()->route('projetos.showEquipe', $projeto->projeto_id);
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function destroyParticipante( $id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $participante =$this->repositoryMentorado->where('id', $id)->first();
            $projeto = $this->repositoryRelacionamento->where('mentorado_id', $id)->first();
            if (!$participante)
                return redirect()->back();
            $participante->delete();
            return redirect()->route('projetos.showEquipe', $projeto->projeto_id);
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public  function export(Request $request){
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true) {
            return Excel::download(new ProjetosExport($request), 'projetos.xlsx');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function create(ProjetoRequest $request)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
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
            $projetos->justificativa = "";
            $projetos->save();
            $mentorado = $user->mentorado;
            $projetos->equipe()->attach($mentorado);
            $projetos->save();
            return redirect()->route('projetos.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function createView($editalId)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            return view('projetos.createView', compact('user',  'editalId'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateCadastroView($id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projetos = $this->repositoryProjetos->find($id);
            if (!$projetos)
                return redirect()->back();
            return view('projetos.updateCadastroView', compact('user',  'projetos'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function updateCadastro(Request $request, $id)
    {
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isCoordenador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $projetos = $this->repositoryProjetos->find($id);
            if (!$projetos)
                return redirect()->back();
            $projetos->update($request->all());
            return redirect()->route('projetos.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }







}
