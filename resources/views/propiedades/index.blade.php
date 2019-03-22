@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.range.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-12">
            <h3>Nuestras ofertas</h3>
            <div class="owl-carousel owl-theme">
                @forelse($ofertas as $oferta)
                    <div class="foto-carrusel">
                        <img src="{{  $oferta->foto  }}" alt="{{$oferta->direccion}}">
                        <div>
                            <p>{{$oferta->descripcion_breve}}</p>
                            {{$oferta->tipo_propiedad }}
                            {{$oferta->dormitorio}} <i class="fa fa-bed"></i>
                            {{$oferta->bano}} <i class="fas fa-bath"></i>
                            <b>Sup: </b>{{$oferta->metros_cuadrados}} m<sup>2</sup>
                            <b>Cons: </b>{{$oferta->metros_cuadrados_construidos}} m<sup>2</sup>
                            <div class="precio_clp">{{'$ '.number_format($oferta->precio  , 0, ',', '.')}} CLP</div>
                            <div class="precio_uf">
                                {{'$ '. number_format((float)$oferta->precio / $sbif->uf, 2, ',', '.')}} UF
                            </div>
                            <div class="precio_usd">
                                {{'$ '. number_format((float)$oferta->precio / $sbif->dolar, 2, ',', '.')}} USD
                            </div>
                            <div class="precio_eur">
                                {{'€ '. number_format((float)$oferta->precio / $sbif->euro,  2, ',', '.')}} EUR
                            </div>
                        </div>
                    </div>
                @empty
                    No hay propiedades para mostrar
                @endforelse
            </div>
        </div>

        <div class="col-md-3 col-sm-12">

            @include('partials.busqueda')
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-md-12">
            <h3>Destacados</h3>
        </div>
    </div>
    <div class="row">
        @forelse($destacados as $destacado)
            <div class="col-sm-12 col-md-6">
                <figure class="card card-product">
                    <div class="img-wrap img-thumbnail"><img src="{{$destacado->foto}}"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{$destacado->direccion}}</h4>

                        @if($destacado->edificio_id)
                            <p class="desc">{{$destacado->edificio()->first()->barrio()->first()->nombre}}</p>
                        @else
                            <p class="desc">{{$destacado->barrio()->first()->nombre}}</p>
                        @endif
                        <p class="desc">
                            @if($destacado->negocio = 'venta')
                                <span class="badge badge-secondary">Venta</span>
                            @else
                                <span class="badge badge-secondary">Arriendo</span>
                            @endif

                        </p>

                        <div class="rating-wrap">
                            <div class="label-rating">{{$destacado->descripcion_breve}}</div>
                            <div class="label-rating">{{$destacado->tipo_propiedad }}</div>
                            <div class="label-rating">{{$destacado->dormitorio}}<i class="fa fa-bed"></i></div>
                            <div class="label-rating">{{$destacado->bano}}<i class="fas fa-bath"></i></div>
                            <div class="label-rating"><b>Sup: </b>{{$destacado->metros_cuadrados}} m<sup>2</sup></div>
                            <div class="label-rating"><b>Cons: </b>{{$destacado->metros_cuadrados_construidos}}
                                m<sup>2</sup></div>
                            <div class="label-rating precio_clp">{{'$ '.number_format($oferta->precio  , 0, ',', '.')}}
                                CLP
                            </div>
                            <div class="label-rating precio_uf">
                                {{'$ '. number_format((float)$oferta->precio / $sbif->uf, 2, ',', '.')}} UF
                            </div>
                            <div class="label-rating precio_usd">
                                {{'$ '. number_format((float)$oferta->precio / $sbif->dolar, 2, ',', '.')}} USD
                            </div>
                            <div class="label-rating precio_eur">
                                {{'€ '. number_format((float)$oferta->precio / $sbif->euro,  2, ',', '.')}} EUR
                            </div>
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="{{route('propiedades.show', $destacado->id)}}"
                           class="btn btn-sm btn-danger float-right">Detalles</a>
                        <div class="price-wrap h5">
                            <span class="price-new precio_clp">{{'$ '.number_format($oferta->precio  , 0, ',', '.')}}
                                CLP</span>
                            <del class="price-old precio_clp">{{'$ '.number_format($oferta->precio  , 0, ',', '.')}}
                                CLP
                            </del>

                            <span class="price-new precio_uf">{{'$ '. number_format((float)$oferta->precio / $sbif->uf, 2, ',', '.')}}
                                UF</span>
                            <del class="price-old precio_uf">{{'$ '. number_format((float)$oferta->precio / $sbif->uf, 2, ',', '.')}}
                                UF
                            </del>

                            <span class="price-new precio_usd">{{'$ '. number_format((float)$oferta->precio / $sbif->dolar, 2, ',', '.')}}
                                USD</span>
                            <del class="price-old precio_usd">{{'$ '. number_format((float)$oferta->precio / $sbif->dolar, 2, ',', '.')}}
                                USD
                            </del>

                            <span class="price-new precio_eur">{{'€ '. number_format((float)$oferta->precio / $sbif->euro,  2, ',', '.')}}
                                EUR</span>
                            <del class="price-old precio_eur">{{'€ '. number_format((float)$oferta->precio / $sbif->euro,  2, ',', '.')}}
                                EUR
                            </del>
                        </div> <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
        @empty
            No hay propiedades para mostrar
        @endforelse
    </div> <!-- row.// -->

@endsection

@push('scripts')
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/jquery.range.js')}}"></script>

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