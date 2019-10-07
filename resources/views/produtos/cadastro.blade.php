  
@extends('layout')

@section('content')
<div class="columns">
        <div class="column is-two-fifths">
            <h3>Produto</h3>
      <form action="/produtos/cadastro" method="POST" >
        <div class="field">
          <label class="label">Nome</label>
          <div class="control">
            <input class="input" type="name" placeholder="Digite o nome do produto" name="nome">
          </div>
        </div>
        <div class="field">
            <label class="label">Imagem URL</label>
            <div class="control">
              <input class="input" type="text" placeholder="Cole a URL da imagem" name="imageURL">
            </div>
          </div>
        <div class="field">
          <label class="label">Preço</label>
          <div class="control">
            <input class="input" type="text" name="preco" placeholder="Digite o preço do produto">
          </div>
        </div>
        <hr>
        <div class="field is-grouped">
        <button class="button is-success">Salvar</button>
        <a href="/produtos" style="margin-left: 20px" class="button is-info">Voltar</a>
        </div>
        @csrf
      </form>
      </div>
      </div>
@endsection