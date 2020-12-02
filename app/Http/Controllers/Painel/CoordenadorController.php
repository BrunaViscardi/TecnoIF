<?php

namespace App\Http\Controllers\Painel;

use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\Http\Requests\GestorRequest;
use App\projeto;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CoordenadorController extends Controller
{
    public $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
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
            return view('painel.coordenador.cadastroGestores', compact('user', 'urlAtual'));
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
            $g->nome = $request-> nome;
            $g-> senha =  $request-> senha;
            $g-> email =  $request-> email;
            $g->save();


            $users = new User();
            $users->name = $request-> nome;
            $users->role = 2;
            $users->email =  $request-> email;
            $users-> password = $request-> senha;
            $users->name = $request-> nome;
            User::create([
                'role' => $users['role'],
                'name' => $users['name'],
                'email' => $users['email'],
                'password' => Hash::make($users['password']),
            ]);
            return redirect()->route(   'painel.coordenador.listaGestores', compact('user', 'urlAtual', 'gestores'));

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
            return view('painel.coordenador.listaGestores', compact('user', 'urlAtual','gestores'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function createEditais( Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais = Edital::all();
            $e = new Edital();
            $e->nome = $request->nome;
            $e->data =$request->data;
            $e-> situacao =  $request-> situacao;
            $e-> link =  $request-> link;
            $e->save();
            return redirect()->route('painel.coordenador.editais', compact('user', 'urlAtual', 'editais'));

        }
        Auth::logout();

        return redirect()->route('painel.login');
    }
}
