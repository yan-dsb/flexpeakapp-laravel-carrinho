@extends('layout')
@section('content')
<div class="columns">
        <div class="column">
                <div class="card">
                        <div class="card-content">
                          <div class="media">
                            <div class="media-content">
                              <p class="title is-4">{{$usuario->name}}</p>
                              <p class="subtitle is-6">{{$usuario->email}}</p>
                            </div>
                          </div>
                      
                          <div class="content">
                          <p>CEP: <strong>{{$usuario->cep}}</strong></p>
                          <p>Rua: <strong>{{$usuario->rua}}</strong></p>
                          </div>
                        </div>
                      </div>
        </div>
    </div>
@endsection
