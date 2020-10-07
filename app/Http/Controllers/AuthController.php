<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard()
    {
        if(Auth::check() === true)
        {
            return view( 'Painel.dashboard');
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
            return redirect()->route('Painel');
        }
        return redirect()->back()->withInput()->withErrors(['Os dados informados não conferem!']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()-> route("Painel");

    }
}
