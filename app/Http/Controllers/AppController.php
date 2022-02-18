<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Cadastro;
use Session;
use App\classes\minhaclasse;
use App\mail\emailRecuperarSenha;

class AppController extends Controller
{
    public function index(Request $request){
        //verificar se existir sessão
        //dd(!session::has('login'));
        
         if(!session::has('login')){
            
           return $this->frmLogin();
             //se não existir, apresenta o formulario de login
         }else{
                 
           return redirect('/aplicacao'); 
         }
          
        
      
       
  
        //return view('index');
         //return $this->frmlogin();
         
        }
  
      
  
      
   //------------------------------------
   //LOGIN
   //------------------------------------
  
   public function frmLogin(){
     
     //apresenta o formulario de login
  
       return view('cadastro_frm_login');
    }
  
   //------------------------------------
   // FORMULÁRIO PARA CRIAR CONTA
   //------------------------------------
    
    public function frmCriarConta(){
  
        return view('usuario_criar_conta');
    }	
       
    
   //------------------------------------
   // FUÇÃO PARA CRIAR CONTA
   //------------------------------------
  
    public function executarCriacaoDeNovaConta(Request $request){
  
        //executar os procedimentos e verificações para criacão de nova conta
  
        //-----------------------------------------
        //VALIDAÇÃO
        //-----------------------------------------
        $this->validate($request,[
            'text_usuario' =>'required|between:3,30|alpha_num',
            'text_senha' =>'required|between:6,15',
            'text_senha_repetida' =>'required|same:text_senha',
            'text_email' =>'required|email',
            'check_termos_condicoes' =>'accepted'
            ]);
  
       //-----------------------------------------
        //VERIFICAR SE JA EXISTIR O MESMO NOME OU EMAIL
        //-----------------------------------------
       
         $dados = cadastro::where('usuario', '=', $request->text_usuario)
                       ->orwhere('email', '=', $request->text_email)->get();
          if($dados->count() != 0){
  
              $erros_bd = ['Já existir um usuário com o mesmo nome ou email cadastrado'];
  
              return view('usuario_criar_conta',compact('erros_bd'));
          }               
    
  
  
           //----------------------------------
           // INSERIR USUARIOS NA BASE DE DADOS
           //----------------------------------
  
           $novo = new cadastro;
  
           $novo->usuario = $request->text_usuario;
           $novo->senha = Hash::make($request->text_senha);
           $novo->email = $request->text_email;
           $novo->save();
  
           return redirect('/'); 
  
          }
  
  
         //---------------------------------------
      public function executarLogin(Request $request){
          /*
          1 - verificar se os dados foram preenchidos corretamente(validation)
          2 - ir á procura do usuario na bd (Eloquent ORM)
          3 - verificar se usuario e senha correspondem a usuario e senha inserido no frm (hashing)
          4 - ultrapassandas as fases todas , criar sessão de usuario (sessions)
          */
          // validação
          $this->validate($request,[
            'text_usuario' => 'required',
            'text_senha' => 'required'
              ]);
  
            // verificar se o usuario existir
            $usuario = cadastro::where('usuario', $request->text_usuario)->first();
  
            // verificar se existir usuario
            if(!is_null($usuario)==0){
        
            $erros_bd = ['Essa conta de usuário não existir.'];
            return view('cadastro_frm_login', compact('erros_bd'));
  
            }
            // verificar a senha 
            if(!Hash::check($request->text_senha, $usuario->senha)){
                  
            $erros_bd = ['A senha está incorreta.'];
            return view('cadastro_frm_login', compact('erros_bd'));
            }
            
            //criar/abrir sessão do usuario
            Session::put('login', 'sim');
            Session::put('usuario', $usuario->usuario);
              
             return redirect('/');
              
            
            } 
           
           //--------------------------------------------
  
            public function logout(){
             //logout da sessão (destroir a sessão e redirecionar para o quadro de login)
  
                //destruir a sessão
                session::flush();
                return redirect('/');
  
            }
  
           //--------------------------------------------
  
            public function recuperarSenha(){
                // apresentar o formulario para a recuperaçao de senha
  
                return view('recuperar_senha');
            }
  
            //--------------------------------------------
            public function executarRecuperarSenha(request $request){
  
               $this->validate($request, [
                 'text_email' => 'required|email'
               ]);
        
             // vai buscar o usuário que contém a conta de email indicado
  
             $usuario = cadastro::where('email', $request->text_email)->get();
             if ($usuario->count() == 0) {
             $erros_bd = ['o email não esta associado a nenhuma conta de usuario'];
             return view('usuario_frm_login',compact('erros_bd'));
            }
       
         
              //atualizando a senha do usuario para a nova senha (senha de recuperação)
             $usuario = $usuario->first();
          
             // instanciando a classe minhaclasse
             $nova_senha = minhaclasse::criarcodigo();
          
             $usuario->senha = hash::make($nova_senha);
  
             $usuario->save();
  
             
             //enviar email ao usuario com a nova senha
  
          Mail::to($usuario->email)->send(new emailRecuperarSenha($nova_senha));
  
  
          //enviar o email com a nova senha do usuario
  
          //mail::to($usuario->email)->send(new emailRecuperarSenha($nova_senha));
  
        
          return redirect('/usuario_email_enviado');
  
   
     }      
  
          public function emailEnviado(){
  
             return view('usuario_email_enviado');
      }
          
         
          
          // buscar do relatorio de relevância no banco de dados
          //--------------------------------------------
          public function buscarUsuario(){
            $usuario = session()->get('usuario');
  
            $users = cadastro::where('usuario', $usuario)->first()->get();
            
               return view('aplicacao', compact('users'));
          }
          
         
          





}
