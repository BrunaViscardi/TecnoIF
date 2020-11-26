<?php

namespace App\Http\Controllers\Painel;

use App\Edital;
use App\Gestor;
use App\Http\Controllers\Controller;
use App\projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return redirect()->route('painel.login');

    }

    public function create()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.coordenador.cadastroGestores', compact('user', 'urlAtual'));
        }
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
        return redirect()->route('painel.login');
    }
}
