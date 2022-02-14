

@extends('layout.app')

@section('conteudo')
  
<div class="adm">
<h3>PAINEL ADMINISTRATIVO</h3>
</div>
<p>Usuario:<strong> {{ session('usuario') }}</strong></p>

<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link active" href="#">Relatorio de Vendas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled"  href="/Usuario_logout" class="btn btn-primary btn-sm">Sair</a>
  </li>
</ul>



 


 <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipo do Kit</th>
      <th scope="col">Quantidade</th>
      <th scope="col">valor</th>
      <th scope="col">Data comprar</th>
      <th scope="col">Nome</th>
      <th scope="col">Endereço</th>
      <th scope="col">Tipo de Pagamento</th>
      <th scope="col">Retirada ou Frete</th>
      <th scope="col">valor total</th>
    </tr>
  </thead>
  <tbody>
    @if(isset($users))
    @if ($users->count())
    @foreach ($users as $use )
       
    <tr>
      <th scope="row">{{$use->id}}</th>
      <td>{{$use->usuario}}</td>
      <td>{{$use->email}}</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td><a href="/cupom?id_usuario={{$use->id}}" class="btn btn-primary">Ver cupom</a></td>
    </tr>
    @endforeach    
    @endif
    @endif
  </tbody>
</table>