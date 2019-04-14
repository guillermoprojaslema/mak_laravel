<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{route('propiedades.index')}}"><img
                            src="{{ asset('images/logos/logo_200x100.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">

                        @forelse($paginas as $pagina)
                            <li class="nav-item @if(Request::is($pagina->slug)) active @endif ">
                                <a class="nav-link" href="{{route('paginas.show', $pagina->slug)}}">
                                    {{$pagina->titulo}}
                                </a>
                            </li>
                        @empty
                            <li class="nav-item"><a class="nav-link" href="about-us.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="properties.html">Properties</a></li>
                            <li class="nav-item"><a class="nav-link" href="agents.html">Team</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        @endforelse
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a href="{{route('voyager.login')}}" class="search"><i class="fa fa-user"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h5>{{setting('site.logo_1', 'Tu logo acá')}}</h5>
                <h3>{{setting('site.logo_2', 'Otra frase acá')}}</h3>
                <a class="main_btn" href="#">Revisa nuestras ofertas</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="advanced_search">
            <h3>Buscar propiedades</h3>
            <form method="GET" action="{{route('propiedades.busqueda')}}">
                {{ csrf_field() }}
                <div class="search_select">
                    <select class="s_select" name="tipo_propiedad"
                            id="tipo_propiedad" data-required>
                        <option value="">Seleccione una opción</option>
                        <option value="casa" {{ old('tipo_propiedad') == 'casa' ? ' selected' : '' }}>Casa</option>
                        <option value="apartamento" {{ old('tipo_propiedad') == 'apartamento'? ' selected' : '' }}>
                            Apartamento
                        </option>
                        <option value="oficina" {{ old('tipo_propiedad') == 'oficina' ? ' selected' : '' }}>Oficina
                        </option>
                        <option value="tienda_comercial" {{ old('tipo_propiedad') == 'tienda_comercial' ? ' selected' : '' }}>
                            Local
                            Comercial
                        </option>
                        <option value="bodega" {{ old('tipo_propiedad') == 'bodega'? ' selected' : '' }}>Bodega
                        </option>
                        <option value="terreno" {{ old('tipo_propiedad') == 'terreno' ? ' selected' : '' }}>Terreno
                        </option>
                        <option value="estacionamiento" {{ old('tipo_propiedad') == 'estacionamiento' ? ' selected' : '' }}>
                            Estacionamiento
                        </option>
                    </select>
                    {!! $errors->first('tipo_propiedad', '<p class="form-text  text-danger">:message</p>') !!}
                    <select class="s_select">
                        <option value="">Seleccione una divisa</option>
                        <option value="CLP" {{ old('divisa') == 'CLP'? ' selected' : '' }}>$ CLP
                        </option>
                        <option value="UF" {{ old('divisa') == 'UF' ? ' selected' : '' }}>$ UF</option>
                        <option value="USD" {{ old('divisa') == 'USD'? ' selected' : '' }}>$ USD
                        </option>
                        <option value="EUR" {{ old('divisa') == 'EUR' ? ' selected' : '' }}>€ EUR
                        </option>
                    </select>
                    {!! $errors->first('divisa', '<p class="form-text  text-danger">:message</p>') !!}



                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="negocio" value="venta" >Venta
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="negocio" value="arriendo">Arriendo
                        </label>
                    </div>
                    {!! $errors->first('negocio', '<p class="red form-text  text-danger">:message</p>') !!}


                </div>
                <div class="search_range">
                    <div class="range_item">
                        <h5>Rango de precios</h5>
                        <div id="slider-range"></div>
                        <input type="text" id="amount" readonly style="border:0;" class="amount">

                    </div>
                </div>
                <input type="hidden" value="" name="min" id="min-precio">
                {!! $errors->first('min_precio', '<p class="form-text  text-danger">:message</p>') !!}
                <input type="hidden" value="" name="max" id="max-precio">
                {!! $errors->first('max_precio', '<p class="form-text  text-danger">:message</p>') !!}
                <button type="submit" value="submit" class="btn submit_btn">Buscar Propiedad</button>
            </form>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
