@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.range.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h3>Resultados de tu busqueda</h3>
        </div>
    </div>
    <div class="row">

        <div class="col-md-12">
            @include('partials.busqueda')
        </div>

        @forelse($propiedades as $propiedad)
            <div class="col-sm-6">
                <figure class="card card-product">
                    <div class="img-wrap img-thumbnail"><img src="{{$propiedad->foto}}"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">
                            @if($propiedad->edificio_id) {{$propiedad->edificio()->first()->direccion .' #'. $propiedad->edificio()->first()->numero. ' Apt '. $propiedad->numero }}
                            @else {{$propiedad->direccion.' #'. $propiedad->numero}}
                            @endif
                        </h4>

                        @if($propiedad->edificio_id)
                            <p class="desc"><i class="fa fa-building"></i> {{$propiedad->edificio()->first()->nombre}},
                                <i class="fa fa-map-marker"></i> {{$propiedad->edificio()->first()->barrio()->first()->nombre}}
                                , {{$propiedad->edificio()->first()->barrio()->first()->comuna->first()->nombre}}</p>
                        @else
                            <p class="desc"><i class="fa fa-map-marker"></i> {{$propiedad->barrio()->first()->nombre}}
                                , {{$propiedad->barrio()->first()->comuna()->first()->nombre}}</p>
                        @endif
                        <p class="desc">
                            @if($propiedad->negocio = 'venta')
                                <span class="badge badge-secondary">Venta</span>
                            @else
                                <span class="badge badge-secondary">Arriendo</span>
                            @endif


                        </p>

                        <div class="rating-wrap">
                            <div class="label-rating">{{$propiedad->descripcion_breve}}</div>
                            <div class="label-rating">{{$propiedad->tipo_propiedad }}</div>
                            <div class="label-rating">{{$propiedad->dormitorio}}<i class="fa fa-bed"></i></div>
                            <div class="label-rating">{{$propiedad->bano}}<i class="fas fa-bath"></i></div>
                            <div class="label-rating"><b>Sup: </b>{{$propiedad->metros_cuadrados}} m<sup>2</sup></div>
                            <div class="label-rating"><b>Cons: </b>{{$propiedad->metros_cuadrados_construidos}}
                                m<sup>2</sup></div>
                            <div class="label-rating precio_clp">{{'$ '.number_format($propiedad->precio  , 0, ',', '.')}}
                                CLP
                            </div>
                            <div class="label-rating precio_uf">
                                {{'$ '. number_format((float)$propiedad->precio / $sbif->uf, 2, ',', '.')}} UF
                            </div>
                            <div class="label-rating precio_usd">
                                {{'$ '. number_format((float)$propiedad->precio / $sbif->dolar, 2, ',', '.')}} USD
                            </div>
                            <div class="label-rating precio_eur">
                                {{'€ '. number_format((float)$propiedad ->precio / $sbif->euro,  2, ',', '.')}} EUR
                            </div>
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        @if($propiedad->ruta == 'casas')
                            <a href="{{route('casas.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif
                        @if($propiedad->ruta == 'apartamentos')
                            <a href="{{route('apartamentos.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif

                        @if($propiedad->ruta == 'locales_comerciales')
                            <a href="{{route('locales_comerciales.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif

                        @if($propiedad->ruta == 'bodegas')
                            <a href="{{route('bodegas.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif

                        @if($propiedad->ruta == 'oficinas')
                            <a href="{{route('oficinas.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif

                        @if($propiedad->ruta == 'terrenos')
                            <a href="{{route('terrenos.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif

                        @if($propiedad->ruta == 'estacionamientos')
                            <a href="{{route('estacionamientos.show', $propiedad->id)}}"
                               class="btn btn-sm btn-danger float-right">Detalles</a>
                        @endif


                        <div class="price-wrap h5">
                            <span class="price-new">${{$propiedad->precio}}</span>
                            <del class="price-old">${{$propiedad->precio}}</del>
                        </div> <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
        @empty
            Su búsqueda no generó ningun resultado
        @endforelse


    </div> <!-- row.// -->

    <div class="row">
        <div class="col-md-12">
            {{ $propiedades->links() }}
        </div>
    </div>

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