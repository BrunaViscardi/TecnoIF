<?php

namespace App\Http\Controllers\Painel;

use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\GestorRequest;
use App\projeto;
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
            return view('painel.coordenador.acompanharProjetos', compact('user', 'urlAtual', 'projetos'));
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
            $g->nome = $request->nome;
            $g->senha = $request->senha;
            $g->email = $request->email;
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

}
