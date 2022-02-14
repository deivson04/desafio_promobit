@extends('layout.app')

{{-- criação de cadastro --}}

@section('conteudo')

 <div class="row">
	 
	 <div class="col-md-4 col-md-offset-4">
	 	
	    {{-- apresentação de error de validação... e não so --}}
           @include('inc.erros')
       
	   
	   <form method="POST" action="/usuario_executar_criacao_nova_conta">
	 	     
          {{-- crsf --}}
         {{ csrf_field() }}  
	      

	       {{--usuario--}}
	       <div class="form-group">
	       	   <label for="id_text_usuario">Digite seu Nome:</label>
	           <input type="text" class="form-control" id="id_usuario" name="text_usuario" placeholder="Digite seu Nome"> 
	       </div>

	      
	       {{--senha--}}
	       <div class="form-group">
	       	   <label for="id_text_senha">Senha:</label>
	           <input type="password" class="form-control" id="id_senha" name="text_senha" placeholder="Senha"> 
	       </div>

	       {{-- Repetir senha--}}
	       <div class="form-group">
	       	   <label for="id_senha_repetida">Senha:</label>
	           <input type="password" class="form-control" id="id_senha_repetida" name="text_senha_repetida" placeholder="Repetir senha" > 
	       </div>


           {{-- Email--}}
	       <div class="form-group">
	       	   <label for="id_text_email">Email:</label>
	           <input type="text" class="form-control" id="id_email" name="text_email" placeholder="email"> 
	       </div>
            
            {{--aceitação das condições de serviço--}}             
             <div class="form-group text-center">
	       	   <input type="checkbox" id="id_check_termos_condicoes" name="check_termos_condicoes" value="1">  
	           <label for="id_check_termos_condicoes"> Concordo com os termos e condições.</label>

	         </div>

             {{--submeter--}} 
             <div class="row text-center">
                <button type="submit" class="btn btn-primary">Criar nova conta</button>
             </div>	
             
              {{--volta ao inicio--}} 
             <div class="text-center margin-top-20">
             	<a href="/">Voltar</a>
             </div>
             
	   </form>

	 </div>

   </div>



@endsection