@extends('layout.app')

{{-- recuperar senha --}}

@section('conteudo')

   <div class="row">
	 
	 <div class="col-md-4 col-md-offset-4">
	 	
	   <form method="POST" action="/executar_recuperar_senha">
	 	     
          {{-- crsf --}}
         {{ csrf_field() }}  
	      

	      {{--usuario--}}
	       <div class="form-group">
	       	   <label for="id_text_email">Email:</label>
	           <input type="text" class="form-control" id="id_email" name="text_email" placeholder="email" required> 
	       </div>
            

            {{--submeter--}} 
             <div class="row text-center">
                <button type="submit" class="btn btn-primary">Recuperar senha</button>
             </div>	
            
            
	         
	         {{-- link para criar nova conta de usuario--}}
             <div class="text-center margin-top-20">
             	<a href="/">Voltar</a>
             </div>

	   </form>

	 </div>

   </div>



@endsection