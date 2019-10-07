@extends('layout')

@section('content')
@foreach ($produtos->chunk(4) as $produtoChunk)
<div class="columns">
    @foreach ($produtoChunk as $produto)
        <div class="column is-one-quarter">
        
        <div class="card">
            <div class="card-content">
                    <figure class="image is-128x128">
                            <img src="{{$produto->imageURL}}">
                          </figure>
              <p class="subtitle">
                {{$produto->nome}} - R$ {{$produto->preco}}
              </p>
            </div>
            <footer class="card-footer">
              <p class="card-footer-item">
                <span>
                <a class="button is-primary is-rounded" href="/adicionar-ao-carrinho/{{$produto->id}}" style="color: white">Adicionar</a>
                </span>
              </p>
            </footer>
          </div>
         
    </div>
    @endforeach
</div>
@endforeach  
@endsection
