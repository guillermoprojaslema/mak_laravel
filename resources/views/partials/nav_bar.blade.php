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
                <h5>{{setting('site.slogan_1', 'Tu slogan acá')}}</h5>
                <h3>{{setting('site.slogan_2', 'Otra frase acá')}}</h3>
                <a class="main_btn" href="#">Revisa nuestras ofertas</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="advanced_search">
            @include('partials.busqueda')
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->
