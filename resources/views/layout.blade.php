<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Desafio Flexpeak</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

<div>
    <section class="section">
      <div class="container">
        <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
          <div class="navbar-brand">
            <a class="navbar-item is-active">
              <img
                src="http://paginas.unimedfama.com.br/atendimentos/img/logo_flexpeak.png"
                width="200"
                height="200"
              />
            </a>
            <div class="navbar-burger burger" data-target="navMenu">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
            <div class="navbar-item" >
              <a href="/" class="navbar-item">Home</a>
            </div>
            <div class="navbar-item has-dropdown is-hoverable" >
              <a class="navbar-link is-arrowless">Produto</a>
              <div class="navbar-dropdown">
                <a href="/produtos" class="navbar-item">Lista Produtos</a>
              </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link is-arrowless">Usuario</a>
              <div class="navbar-dropdown">
                <a href="/usuarios" class="navbar-item">Lista Usuarios</a>
              </div>
            </div>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link is-arrowless">Venda</a>
              <div class="navbar-dropdown">
                <a href="/relatorio" class="navbar-item">Relatório</a>
              </div>
            </div>
          </div>
          </div>
          <div class="navbar-end">
              <div class="navbar-item">
                  <div class="buttons">
                      <a class="button is-light" href="/carrinho">  Carrinho {{Session::has('carrinho') ? Session::get('carrinho')->totalQtd : ''}}</a>
              @guest
              
              <a class="button is-light" href="{{ route('login') }}">{{ __('Login') }}
                </a>
              @if (Route::has('register'))
              <a class="button is-primary" href="{{ route('register') }}">{{ __('Register') }}
                </a>
              @endif
                </div> 
              </div>
              @else 
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link is-arrowless">{{ Auth::user()->name }}</a>
              <div class="navbar-dropdown">
                <a class="navbar-item" 
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
              @endguest
        </div>
        </nav>
      </div>
    </section>
  </div>
  <div class="container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function(){
                $("#buscar_cep").click(function(){
                    let cep = $('#cep').val();
                    fetch(`https://api.postmon.com.br/v1/cep/${cep}`)
                    .then(function(response){
                        response.json().then(function(data){
                            $('#rua').val(data.logradouro);
                        });
                    })
                    .catch(function(err){
                        alert('cep não encontrado');
                    });
                });
            });
        </script>
    </body>
  </html>