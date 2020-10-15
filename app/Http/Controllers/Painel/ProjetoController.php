<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProjetoController extends Controller
{
    public $request = null;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function debug(Request $request)
    {

        $projetos = new Projeto();
        $projetos->nome_projeto = $request->nome_projeto;
        $projetos->expectativa = $request->expectativa;
        $projetos->area = $request->area;
        $projetos->save();
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
        }
        return redirect()->route('Painel.gerenciarProjeto');
    }


    public function index()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
            return view('Painel.gerenciarProjeto', compact('user', 'urlAtual', 'projetos'));
        }
        return redirect()->route('Painel.login');

    }

    public function cadastro()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('Painel.PainelCandidato.cadastro', compact('user', 'urlAtual'));
        }
        return redirect()->route('Painel.login');

    }
    public function editais()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('Painel.PainelCandidato.editais', compact('user', 'urlAtual'));
        }
        return redirect()->route('Painel.login');

    }
    public function editar()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('Painel.PainelCandidato.editar', compact('user', 'urlAtual'));
        }
        return redirect()->route('Painel.login');

    }
    public function acompanhar()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('Painel.acompanhar', compact('user', 'urlAtual'));
        }
        return redirect()->route('Painel.login');

    }


}
