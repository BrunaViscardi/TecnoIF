<?php
namespace App\Http\Controllers;
use App\Edital;
use App\Gestor;
use App\Http\Requests\MudarSituacaoRequest;
use App\Projeto;
use App\Situacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class EditalController extends Controller
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
    public function index()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $editais =  $this->repositoryEditais->orderBy('data')->paginate(4);
            $role = $user->role;
            return view('editais/index', compact('role','user', 'urlAtual', 'editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function createView()
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            return view('editais.create', compact('user', 'urlAtual'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function create(Request $request)
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
            return redirect()->route('editais.index', compact('user', 'urlAtual', 'editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateSituacaoView($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $edital = $this->repositoryEditais->where('id', $id)->first();
            if (!$edital)
                return $edital()->back();
            return view('editais.updateSituacaoView', compact( 'edital', 'user'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function filtro(Request $request)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $filtro = $request->filtro ?? '';
            $editais = Edital::where('data', 'LIKE', '%' . $filtro . '%')
                ->orWhere('editais.nome', 'LIKE', '%' . $filtro . '%')
                ->orWhere('editais.situacao', 'LIKE', '%' . $filtro . '%')
                ->paginate(4);
            return view('editais.index', compact('user', 'urlAtual','editais'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function updateSituacao ($id, MudarSituacaoRequest $request)
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
                return redirect()->route('editais.index');
            }
        } else{ Auth::logout();
            return redirect()->route('painel.login');}
    }

    public function updateView($id)
    {
        if (Auth::check() === true) {
            $user = Auth()->User();
            $uri = $this->request->route()->uri();
            $exploder = explode('/', $uri);
            $urlAtual = $exploder[1];
            $edital = $this->repositoryEditais->where('id', $id)->first();
            return view('editais.updateView', compact('user', 'urlAtual', 'edital'));
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
    public function update(Request $request, $id)
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
            return redirect()->route('editais.index');
        }
        Auth::logout();
        return redirect()->route('painel.login');
    }
}
