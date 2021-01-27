<?php

namespace App\Http\Controllers;

use App\Edital;
use App\Gestor;
use App\Http\Requests\GestorEditRequest;
use App\Http\Requests\GestorRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class GestoresController extends Controller
{
    public $request = null;
    private $repositoryGestores;
    private $repositoryUsers;

    public function __construct(Request $request, Gestor $gestor, User $user, Edital $edital)
    {
        $this->request = $request;
        $this->repositoryGestores = $gestor;
        $this->repositoryUsers = $user;
    }
    public function createView()
    {  if (Auth::check() === true && Auth()->User()->isCandidato()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = Gestor::all();
            return view('gestores.createView', compact('user',  'gestor'));
        }
        Auth::logout();
        return redirect()->route('painel.login');

    }



    public function create(GestorRequest $request)
    {  if (Auth::check() === true && Auth()->User()->isCandidato()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
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
            return redirect()->route('gestores.index', compact('user', 'gestores'));

        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

    public function index()
    {  if (Auth::check() === true && Auth()->User()->isCandidato()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestores =  $this->repositoryGestores->orderBy('nome')->paginate(4);
            return view('gestores.index', compact('user',  'gestores'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function destroy($email)
    {
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->where('email', $email);
            $user = $this->repositoryUsers->where('email', $email);
            if (!$gestor and !$user)
                return redirect()->back();
            $gestor->delete();
            $user->delete();


            return redirect()->route('gestores.index', compact('user'));
        }
        Auth::logout();

        return redirect()->route('painel.login');

    }
    public function filtro(Request $request)
    {  if (Auth::check() === true && Auth()->User()->isCandidato()) {
        abort(403);
    }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $filtro = $request->filtro;
            $gestores = Gestor::where('nome', 'LIKE', '%' . $filtro . '%')
                ->orWhere('gestores.email', 'LIKE', '%' . $filtro . '%')
                ->paginate(4);

            return view('gestores.index', compact('user',  'gestores', 'filtro'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public  function updateView($id){
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            return view('gestores.updateView', compact('user','gestor'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public  function update($id, GestorEditRequest $request){
        if (Auth::check() === true && Auth()->User()->isCandidato()) {
            abort(403);
        }
        if (Auth::check() === true && Auth()->User()->isAdministrador()) {
            abort(403);
        }
        if (Auth::check() === true) {
            $user = Auth()->User();
            $gestor = $this->repositoryGestores->find($id);
            if (!$gestor)
                return redirect()->back();
            $gestor->update($request->all());
            return redirect()->route('gestores.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }

}
