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
use App\Exports\ProjetosExport;
use Maatwebsite\Excel\Facades\Excel;
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
            $projetos =  $this->repositoryProjetos->orderBy('nome_projeto')->paginate(4);
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
            $users->role = 1;
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
            $gestores =  $this->repositoryGestores->orderBy('nome')->paginate(4);
            return view('painel.coordenador.listaGestores', compact('user', 'urlAtual', 'gestores'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }



    public function deleteGestor($email)
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
            $filtro = $request->filtro;
            $gestores = Gestor::where('nome', 'LIKE', '%' . $filtro . '%')
                ->orWhere('gestores.email', 'LIKE', '%' . $filtro . '%')
                ->paginate(5);

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
               ->paginate(10);
            return view('painel.equipe.acompanharProjetos', compact('user', 'urlAtual', 'projetos', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
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
    public  function export(){
        if (Auth::check() === true) {
            return Excel::download(new ProjetosExport, 'projetos.xlsx');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }




}
