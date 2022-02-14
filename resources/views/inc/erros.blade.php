 {{-- apresentação de error de validação --}}
 @if(count($errors) != 0)
 <div class="alert alert-danger">

 {{-- titulo da caixa de erros --}}
 @if(count($errors) == 1)
   <p class="titulo-erro">ERRO:</p> 
 @else 
   <p class="titulo-erro">ERROS:</p>
 @endif
 
    {{-- apresentar erros de (concatenação) --}}
   @foreach($errors->all() as $erro)
     <ul>
         <li>{{ $erro }}</li>
     </ul>
   @endforeach

 </div>

@endif 

{{-- apresentação dos erros de comunicação com o BD --}}

@if(isset($erros_bd))
  <div class="alert alert-danger">
       @foreach($erros_bd as $erro)
      <p>{{ $erro }}</p>

     @endforeach
  </div>
   
@endif