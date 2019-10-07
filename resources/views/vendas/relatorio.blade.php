@extends('layout')

@section('content')
<div class="columns">
    <div class="column">
        
    <div class="column">
            <h3>Relatório de Vendas </h3>
      <table class="table">
        <thead>
        
          <tr>
            <th>ID da venda</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Vendedor</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($itensvenda as $item)
            <tr>
              <td>{{ $item->venda_id }}</td>
              <td>{{ $item->nome }}</td>
              <td>{{ $item->preco }}</td>
              <td>{{ $item->name }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
      <div class="column is-three-fifths">
      <table class="table">
            <thead>
              <tr>
                <th>Quantidade de vendas</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($relatorio as $relatorio)
                <tr>
                  <td>{{ $relatorio->quantidade }}</td>
                  <td>{{ $relatorio->total }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
    </div>
  </div>
@endsection