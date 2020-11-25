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

    public function create(Request $request)
    {
        var_dump($request->except('_token'));
        $projetos = new Projeto();
        $projetos->nome_projeto = $request->nome_projeto;
        $projetos->campus = $request->campus;
        $projetos->area = $request->area;
        $projetos->situacao_id = 1;
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
        $projetos->telefone= $request->telefone;

        $projetos->save();
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $projetos = Projeto::all();
        }
        return redirect()->route('painel.mentorado.gerenciarProjeto');
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
        return redirect()->route('painel.login');

    }

    public function cadastro()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.mentorado.cadastro', compact('user', 'urlAtual'));
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
            return view('painel.mentorado.editais', compact('user', 'urlAtual'));
        }
        return redirect()->route('painel.login');

    }
    public function editar()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.mentorado.editar', compact('user', 'urlAtual'));
        }
        return redirect()->route('painel.login');

    }
    public function acompanhar()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('painel.equipe gestora.acompanhar', compact('user', 'urlAtual'));
        }
        return redirect()->route('painel.login');

    }


}
