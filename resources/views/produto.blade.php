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
              <a class="nav-link" href="{{url('cadastrar_tag')}}">Tag</a>
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
                    <label for="id_name">Nome do produto:</label>
                <input type="text" id="id_name" class="form-control" name="name" placeholder="Name do produto"> 
            
                @foreach ($tags as $tag)
                      
                
             <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">              
                  {{$tag->nome}}
                </label>
              </div>
              @endforeach
              
                <div class="but">   
                 <input type="submit" class="btn btn-primary" value="cadastrar">   
                </div> 
            </div>
              
              
        
        </form>
    </div>
    <table class="table table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @if(isset($tags))
        @if ($tags->count())
        @foreach ($tags as $tag )
           
        <tr>
          <th scope="row">{{$tag->id}}</th>
          <td>{{$tag->nome}}</td>
          <div class="bot"> 
            <td><a href="/atualizar_tag/{{$tag->id}}" class="btn btn-primary">Editar</a></td>
          </div>  
          <div class="bot"> 
            <td><a href="/deletar_tag/{{$tag->id}}" class="btn btn-primary">Apagar</a></td>
          </div> 
        
        </tr>
        
        
        @endforeach    
        @endif
        @endif
      </tbody>
    </table>
    
    
    
    @endsection