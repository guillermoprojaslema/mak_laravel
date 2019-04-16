@extends('layouts.app')

@include('partials.busqueda')

@section('content')


    <!--================Properties Area =================-->
    <section class="properties_area">
        <div class="container">
            <div class="main_title">
                <h2>Nuestras propiedades destacadas</h2>
                <p>{{setting('site.propiedades_destacadas', 'Ven a revisar nuestras propiedades destacadas')}}</p>
            </div>
            <div class="row properties_inner">
                @forelse($ofertas as $oferta)
                    <div class="col-lg-4">
                        <div class="properties_item">
                            <div class="pp_img">
                                <img class="img-fluid" src="img/properties/pp-1.jpg" alt="">
                            </div>
                            <div class="pp_content">
                                @if($oferta->ruta == 'casas')
                                    <a href="{{route('casas.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->direccion}}
                                            , {{$oferta->barrio()->first()->comuna()->first()->nombre}}.
                                        </h4>
                                    </a>
                                @endif

                                @if($oferta->ruta == 'bodegas')
                                    <a href="{{route('bodegas.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->direccion}}
                                            , {{$oferta->barrio()->first()->comuna()->first()->nombre}}.
                                        </h4>
                                    </a>
                                @endif

                                @if($oferta->ruta == 'terrenos')
                                    <a href="{{route('terrenos.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->direccion}}
                                            , {{$oferta->barrio()->first()->comuna()->first()->nombre}}.
                                        </h4>
                                    </a>
                                @endif




                                @if($oferta->ruta == 'locales_comerciales')
                                    <a href="{{route('casas.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->direccion}}
                                            , {{$oferta->barrio()->first()->comuna()->first()->nombre}}.
                                        </h4>
                                    </a>
                                @endif

                                @if($oferta->ruta == 'oficinas')
                                    <a href="{{route('oficinas.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->edificio()->first()->direccion}}
                                            , {{$oferta->edificio()->first()->barrio()->first()->comuna()->first()->nombre}}
                                            .
                                        </h4>
                                    </a>
                                @endif

                                @if($oferta->ruta == 'apartamentos')
                                    <a href="{{route('apartamentos.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->edificio()->first()->direccion}}
                                            , {{$oferta->edificio()->first()->barrio()->first()->comuna()->first()->nombre}}
                                            .
                                        </h4>
                                    </a>
                                @endif

                                @if($oferta->ruta == 'estacionamientos')
                                    <a href="{{route('estacionamientos.show', $oferta->id)}}">
                                        <h4>
                                            {{$oferta->edificio()->first()->direccion}}
                                            , {{$oferta->edificio()->first()->barrio()->first()->comuna()->first()->nombre}}
                                            .
                                        </h4>
                                    </a>
                                @endif

                                <div class="tags">
                                    <a href="#">{{$oferta->dormitorio}} <i class="fas fa-bed"></i></a>

                                    <a href="#">{{$oferta->bano}} <i class="fas fa-bath"></i></a>

                                    <a href="#">{{$oferta->metros_cuadrados}} <i class="fas fa-ruler-combined"></i></a>

                                    <a href="#">
                                        <i class="fas @if($oferta->amoblado) fa-check @else fa-times @endif"
                                           aria-hidden="true"></i>
                                        <i class="fas fa-couch"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fas @if($oferta->piscina) fa-check @else fa-times @endif"
                                           aria-hidden="true"></i>
                                        <i class="fas fa-swimmer"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa @if($oferta->aire_acondicionado) fa-check @else fa-times @endif"
                                           aria-hidden="true"></i>
                                        <i class="fas fa-temperature-low"></i>
                                    </a>
                                    <a href="#">
                                        {{ucfirst($oferta->negocio)}}
                                    </a>
                                </div>
                                <div class="pp_footer">
                                    <h5 class="precio_clp">{{'$ '.number_format($oferta->precio , 0, ',', '.')}}</h5>
                                    <h5 class="precio_usd">{{'$ '. number_format((float)$oferta->precio / $sbif->dolar, 2, ',', '.')}}
                                        UF</h5>
                                    <h5 class="precio_eur"> {{'$ '. number_format((float)$oferta->precio / $sbif->euro, 2, ',', '.')}}
                                        USD</h5>
                                    <h5 class="precio_uf">{{'€ '. number_format((float)$oferta->precio / $sbif->uf,  2, ',', '.')}}
                                        EUR</h5>

                                    <a class="main_btn" href="#">Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="main_title">
                        <h3>No existen propiedades en ofertas.</h3>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!--================End Properties Area =================-->

@endsection

@push('scripts')


    <script>
        $(document).ready(function () {

            $('.precio_clp').show();
            $('.precio_usd').hide();
            $('.precio_eur').hide();
            $('.precio_uf').hide();


            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                dots: true,
                dotsEach: true,
                autoHeight: true,
                margin: 10,
                lazyLoad: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                autoPlay: true,
            });

            $('.range-slider').jRange({
                from: 0,
                to: 100000,
                step: 1,
                scale: [0, 100000],
                format: '%s',
                width: 300,
                showLabels: true,
                isRange: true
            });

            $('#divisa').change(function () {
                var divisa = $("#divisa option:selected").val();
                if (divisa == 'CLP') {
                    $('.precio_clp').show();
                    $('.precio_usd').hide();
                    $('.precio_eur').hide();
                    $('.precio_uf').hide();
                } else if (divisa == 'USD') {
                    $('.precio_usd').show();
                    $('.precio_clp').hide();
                    $('.precio_eur').hide();
                    $('.precio_uf').hide();

                } else if (divisa == 'EUR') {
                    $('.precio_eur').show();
                    $('.precio_usd').hide();
                    $('.precio_uf').hide();
                    $('.precio_clp').hide();

                } else if (divisa == 'UF') {
                    $('.precio_uf').show();
                    $('.precio_clp').hide();
                    $('.precio_usd').hide();
                    $('.precio_eur').hide();

                }
            });
        });
    </script>
@endpush