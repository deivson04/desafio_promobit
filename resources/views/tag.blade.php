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
              <a class="nav-link active" href="/">Relatorio de Relevancia</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('cadastro_produto')}}">Produto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('cadastro_tag')}}">Tag</a>
            </li>  
          </ul>
        </div>

        <div class="prod">	
            {{-- apresentação de error de validação... e não so --}}
            @include('inc.erros') 
    
            <form method="POST" action="/cadastro_tag">
                
                    {{-- crsf --}}
                    {{ csrf_field() }}  
            
    
                
                <div class="form-group col-md-2">
                        <label for="id_tag">Name da Tag:</label>
                        <input type="text" class="form-control" id="id_tag" name="text_tag" placeholder="Nome da Tag"> 
                    
                    <button type="button" class="btn btn-primary">Cadastrar</button>
                </div>    
        </form>
    </div>

    @endsection    