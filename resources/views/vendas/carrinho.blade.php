@extends('layout')

@section('content')
    @if (Session::has('carrinho'))
    <div class="columns">
            
            <div class="column">
              <table class="table">
                <thead>
                
                  <tr>
                    <th>Quantidade</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $produto)
                    <tr>
                      <td>{{ $produto['qtd']}}</td>
                      <td>{{ $produto['item']['nome'] }}</td>
                      <td>{{ $produto['item']['preco']}}</td>
                      <td>
                        
                      <form action="/reduzir/{{$produto['item']['id']}}" method="get">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <button
                          class="button is-danger is-rounded"
                        >Remover um</button>&nbsp;
                    </form>
                    <form action="/remover/{{$produto['item']['id']}}" method="get">
                      <input type="hidden" name="_method" value="DELETE">
                      {{ csrf_field() }}
                      <button
                        class="button is-danger is-rounded"
                      >Remover tudo</button>&nbsp;
                  </form>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="column">
                    <p>Valor Total: <strong>{{$totalPreco}}</strong></p>
                    <hr>
                    <div class="columns is-mobile">
                      
                      <div class="column">
                            <form action="/carrinho" method="POST">
                                {{ csrf_field() }}
                                <button
                                  class="button is-primary is-rounded"
                                >Finalizar Venda</button>&nbsp;
                            </form>
                      </div>
                    </div>
            </div>
            </div>
          </div>
    @else
    @endif
@endsection