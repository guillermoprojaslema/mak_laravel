@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.range.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
@endpush

@section('content')
    {{$errors}}

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
                            <i class="fa fa-dollar"></i> {{number_format($oferta->precio, 0, ',', '.')}}
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
                            @if($destacado->venta)
                                <span class="badge badge-secondary">Venta</span>
                            @endif

                            @if($destacado->arriendo)
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
                            <div class="label-rating"><i
                                        class="fa fa-dollar"></i> {{number_format($oferta->precio, 0, ',', '.')}}</div>
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="{{route('propiedades.show', $destacado->id)}}"
                           class="btn btn-sm btn-danger float-right">Detalles</a>
                        <div class="price-wrap h5">
                            <span class="price-new">${{$destacado->precio}}</span>
                            <del class="price-old">${{$destacado->precio}}</del>
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
        });


    </script>
@endpush