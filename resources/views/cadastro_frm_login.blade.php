@extends('layout.app')


@section('conteudo')

   <div class="row">
	 
	 <div class="col-md-4 col-md-offset-4">
	 <div class="row">
	 <div class="col-md-4 col-md-offset-4   col-sm-8   col-xs-12">
	 <img src="{{asset('imagens/mix-de-produtos-loja-virtual.png')}}" class="img-responsive img-lock">  
	  </div>

	</div>
	
	     {{-- apresentação de error de validação... e não so --}}
         @include('inc.erros') 
      
	   <form method="POST" action="/usuario_executar_login">
	 	     
          {{-- crsf --}}
         {{ csrf_field() }}  
	      

	      {{--usuario--}}
	       <div class="form-group">
	       	   <label for="id_usuario">Usuário:</label>
	           <input type="text" class="form-control" id="id_usuario" name="text_usuario" placeholder="usuario "> 
	       </div>

	      
	      {{--senha--}}
	       <div class="form-group">
	       	   <label for="id_senha">Senha:</label>
	           <input type="password" class="form-control" id="id_usuario" name="text_senha" placeholder="senha"> 
	       </div>
            

            {{--submeter--}} 
             <div class="row text-center">
                <button type="submit" class="btn btn-primary">Entrar</button>
             </div>	
            
            {{-- link para recuperar senha--}}
             <div class="text-center margin-top-20">
             	<a href="/recuperar_senha">Recuperar senha</a>
             </div>
	         
	         {{-- link para criar nova conta de usuario--}}
             <div class="text-center">
             	<a href="/usuario_criar_conta">Criar nova conta</a>
             </div>

	   </form>

	 </div>

   </div>



@endsection