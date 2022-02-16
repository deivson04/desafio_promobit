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
              <a class="nav-link" href="{{url('cadastrar_produto')}}">Produto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('cadastro_tag')}}">Tag</a>
            </li>  
          </ul>
        </div>
        
    
    
    
    <div class="prod">	
        {{-- apresentação de error de validação... e não so --}}
        @include('inc.erros') 

        <form method="POST" action="/cadastrar_produto">
            
                {{-- crsf --}}
                {{ csrf_field() }}  
        

            
            <div class="form-group col-md-2">
                    <label for="id_nome">Nome do produto:</label>
                <input type="text" class="form-control" id="id_nome" name="text_nome" placeholder="Nome do produto"> 
            
            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Tag A
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Tag B
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  Tag C
                </label>
                <div class="but">
                 
                 <input type="submit" class="btn btn-primary" value="cadastrar">   
                </div> 
            </div>
              
              
        
        </form>
    </div>

    @endsection