@extends('layout')

@section('content')
<div class="columns">
    <div class="column">
      <div class="columns is-mobile">
        <div class="column">
          <a href="/produtos/cadastro" class="button is-primary is-rounded">Cadastrar Produtos</a>
        </div>
      </div>
    <div class="column">
      <table class="table">
        <thead>
        
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>CEP</th>
            <th>Rua</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->id }}</td>
              <td>{{ $usuario->name }}</td>
              <td>{{ $usuario->email }}</td>
              <td>{{ $usuario->cep }}</td>
              <td>{{ $usuario->rua }}</td>
              <td>
                
              <form action="/usuarios/deletar/{{$usuario->id}}" method="POST">
                <a class="button is-info is-rounded" href="/usuarios/show/{{$usuario->id}}" >Editar</a>&nbsp;
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <button
                  class="button is-danger is-rounded"
                >Deletar</button>&nbsp;
            </form>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
@endsection