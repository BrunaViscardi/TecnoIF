<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function dashboard()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];

            return view('painel.layout.dashboard', compact('user', 'urlAtual'));
        }
        return redirect()->route('painel.login');
    }

    public function showLoginform()
    {
        return view('home.formLogin');
    }

    public function login(Request $request)
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withInput()->withErrors(['Email inválido!']);
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->route('painel.home');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route("painel.home");
    }
}
