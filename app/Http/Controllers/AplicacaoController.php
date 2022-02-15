<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Session;

class AplicacaoController extends Controller
{
    public function apresentarPaginaInicial(Request $request){

    	//verificar se a sesção esta ativa
    	
		if(!Session::has('login')){return redirect('/');}

    	//apresentar o interior da aplicação
    	return redirect('/aplicacao_buscar_Usuario'); 
           	
	  
    } 

    public function cadastroProduto(){
		return view('produto');
	  }

	public function cadastroTag(){
		return view('tag');
	}  












}
