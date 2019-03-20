<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route('propiedades.index')}}">
            <img height="50" width="100" class="img-fluid"
                 src="{{ asset('images/logos/logo_200x100.png') }}">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                @forelse($paginas as $pagina)

                    <li class="nav-item @if(Request::is($pagina->slug)) active @endif">
                        <a class="nav-link"
                           href="{{route('paginas.show', $pagina->slug)}}">{{$pagina->titulo}}
                            @if(Request::is('/'.$pagina->slug))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                @empty
                @endif
                @if (Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{route('voyager.login')}}">Inicia Sesión
                        </a>
                    </li>
                @else
                    <li class="nav-item my-2 my-md-0">
                        <a class="nav-link"
                           href="{{route('voyager.dashboard')}}">Administrador
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<br>