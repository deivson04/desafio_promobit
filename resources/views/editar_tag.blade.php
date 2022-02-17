@extends('layout.app')

    @section('conteudo')

    <div class="adm">
        <h1>DESAFIO PROMOBIT</h1>
        </div>
        <p>Usuario:<strong> {{ session('usuario') }}</strong></p>
        
        <li class="nav-item">
            <a class="nav-link disabled"  href="/Usuario_logout" class="btn btn-primary btn-sm">Sair</a>
          </li>
        
        
        <div class="menu">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="{{url('cadastro_tag')}}">Voltar</a>
            </li>  
          </ul>
        </div>

        <div class="prod">	
            {{-- apresentação de error de validação... e não so --}}
            @include('inc.erros') 
    
            <form method="POST" action="/atualizar_tag">
                
                    {{-- crsf --}}
                    {{ csrf_field() }}  
            
    
                
                <div class="form-group col-md-2">
                        <label for="id_tag">Name da Tag:</label>
                        <input type="text" class="form-control" id="id_tag" name="nome" value="{{$tag->nome}}"> 
                        <input type="hidden" class="form-control"  name="id_tag" value="{{$tag->id}}"> 
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>    
        </form>
    </div>
           
    @endsection    