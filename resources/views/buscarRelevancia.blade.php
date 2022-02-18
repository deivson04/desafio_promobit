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
      <a class="nav-link active" href="/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('buscarRelevancia')}}">Relatorio de Relevancia</a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('cadastrar_produto')}}">Produto</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{url('cadastrar_tag')}}">Tag</a>
    </li>  
  </ul>
</div>
   

<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Produto</th>
        <th scope="col">Tag</th>
        
      </tr>
    </thead>
    <tbody>
      @if(isset($users))
      @if($users->count())
      @foreach ($users as $use)
         
      <tr>
        <th scope="row">{{$use->id}}</th>
        <td>{{$use->produto_id}}</td>
        <td>{{$use->tag_id}}</td> 
      </tr>
      
      
      @endforeach    
      @endif
      @endif
    </tbody>
  </table>