<?php

namespace App\Http\Controllers\Painel;

use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\GestorEditRequest;
use App\Http\Requests\GestorRequest;
use App\Http\Requests\JustificarRequest;
use App\Http\Requests\MudarSituacaoRequest;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CoordenadorController extends Controller
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

    public function acompanharProjetos()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
            $edital = Edital::all();
            return view('painel.coordenador.acompanharProjetos', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function cadastroGestores()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestor = Gestor::all();
            return view('painel.coordenador.cadastroGestores', compact('user', 'urlAtual', 'gestor'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }

    public function cadastroEditais()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.coordenador.cadastroEditais', compact('user', 'urlAtual'));
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
            return view('painel.coordenador.editais', compact('user', 'urlAtual', 'editais'));
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

    public function create(GestorRequest $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestores = Gestor::all();

            $g = new Gestor();
            $g->nome = $request->nome  ;
            $g->senha = $request->senha;
            $g->email = $request->email;
            $g->campus = $request->campus;
            $g->save();


            $users = new User();
            $users->name = $request->nome;
            $users->role = 2;
            $users->email = $request->email;
            $users->password = $request->senha;
            $users->name = $request->nome;
            User::create([
                'role' => $users['role'],
                'name' => $users['name'],
                'email' => $users['email'],
                'password' => Hash::make($users['password']),
            ]);
            return redirect()->route('painel.coordenador.listaGestores', compact('user', 'urlAtual', 'gestores'));

        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function lista()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestores = Gestor::all();
            return view('painel.coordenador.listaGestores', compact('user', 'urlAtual', 'gestores'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function createEditais(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais = Edital::all();
            $e = new Edital();
            $e->nome = $request->nome;
            $e->data = $request->data;
            $e->situacao ="Edital de Abertura";
            $e->link = $request->link;
            $e->save();
            return redirect()->route('painel.coordenador.editais', compact('user', 'urlAtual', 'editais'));

        }
        Auth::logout();

        return redirect()->route('painel.login');
    }

    public function deleteGestor( $email)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestor = $this->repositoryGestores->where('email', $email);
            $user = $this->repositoryUsers->where('email', $email);
            if (!$gestor and !$user)
                return redirect()->back();
            $gestor->delete();
            $user->delete();

            return redirect()->route('painel.coordenador.listaGestores', compact('user', 'urlAtual'));

        }
        Auth::logout();

        return redirect()->route('painel.login');

    }
    public function deleteEdital( $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $edital = $this->repositoryEditais->where('id', $id);
            if (!$edital)
                return redirect()->back();
            $edital->delete();
            return redirect()->route('painel.coordenador.editais', compact('user', 'urlAtual'));

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
            return view('painel.coordenador.alterarSenha', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function editarEdital($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $edital = $this->repositoryEditais->where('id', $id)->first();

            return view('painel.coordenador.editarEdital', compact('user', 'urlAtual', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }
    public function edicaoEdital(Request $request, $id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $edital = $this->repositoryEditais->find($request->id);
            if (!$edital)
                return redirect()->back();
            $edital->update($request->all());
            return redirect()->route('painel.coordenador.editais');
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
            return view('painel.coordenador.visualizarProjeto', compact('user', 'urlAtual', 'projeto','edital', 'situacao'));
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
    public function mudarSituacao($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $edital = $this->repositoryEditais->where('id', $id)->first();
            if (!$edital)
                return $edital()->back();

            return view('painel.coordenador.editaisSituacao', compact( 'edital', 'user'));

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
            return redirect()->route('painel.coordenador.acompanharProjetos');
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
        $projeto->update(['justificativa' => $request->justificar]);
       return redirect()->route('painel.coordenador.acompanharProjetos');
    }
    public function filtrarGestores(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestores = Gestor::get($request->filtro);

            return view('painel.coordenador.listaGestores', compact('user', 'urlAtual', 'gestores'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function filtrarProjetos(Request $request)
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
    public function filtrarEditais(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais = Edital::get($request->filtro);
            return view('painel.coordenador.editais', compact('user', 'urlAtual','editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function editaSituacao ($id, MudarSituacaoRequest $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $edital = $this->repositoryEditais->where('id', $id)->first();
            if (!$edital)
            {return $edital()->back();
            } else{
                $edital->update(['situacao' => $request->situacao]);
                return redirect()->route('painel.coordenador.editais');
            }
        } else{ Auth::logout();
            return redirect()->route('painel.login');}
    }
    public  function editarGestor($id){
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            return view('painel.coordenador.edicaoGestor', compact('user', 'urlAtual','gestor'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public  function gestorUpdate($id, GestorEditRequest $request){
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            $gestor->update($request->all());
            return redirect()->route('painel.coordenador.listaGestores');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }




}
