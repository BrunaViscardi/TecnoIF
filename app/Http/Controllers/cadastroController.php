<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroController extends Controller
{
   public function formCadastro()
   {
       return view( 'cadastro');
   }
    public function submeter()
    {
      echo "cadastrar";
    }

}
