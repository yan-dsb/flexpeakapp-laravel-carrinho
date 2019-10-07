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
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
              <td>{{ $produto->id }}</td>
              <td>{{ $produto->nome }}</td>
              <td>{{ $produto->preco }}</td>
              <td>
                
              <form action="/produtos/deletar/{{$produto->id}}" method="POST">
                <a class="button is-info is-rounded" href="/produtos/editar/{{$produto->id}}" >Editar</a>&nbsp;
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