<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request=$request;
    }


    public function dashboard()
    {
        if(Auth::check() === true)
        {   $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder= explode('/', $uri);
            $urlAtual =$exploder[1];



            return view( 'Painel.dashboard' , compact('user','urlAtual'));
        }
        return redirect()->route('Painel.login');

    }
    public function candidato()
    {
        if(Auth::check() === true)
        {
            $user = Auth()->User();
            $uri = $this->request->route() ->uri();
            $exploder= explode('/', $uri);
            $urlAtual =$exploder[1];
            return view( 'Painel.PainelCandidato.Candidato' , compact('user','urlAtual'));
        }
        return redirect()->route('Painel.login');
    }
    public function gerenciarProjeto()
    {
        if(Auth::check() === true)
        {
            $user = Auth()->User();
            $uri = $this->request->route() ->uri();
            $exploder= explode('/', $uri);
            $urlAtual =$exploder[1];
            return view( 'Painel.gerenciarProjeto' , compact('user','urlAtual'));
        }
        return redirect()->route('Painel.login');

    }
    public function showLoginform()
    {
        return view('Painel.formLogin');
    }
    public function login(Request $request )
    {

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->withInput()->withErrors(['Email inválido!']);
        }

        $credentials =[
            'email'=> $request->email,
            'password'=> $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('Painel.Home');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()-> route("Painel.Home");

    }


}
