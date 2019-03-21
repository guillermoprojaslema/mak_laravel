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
                        <h4 class="title">{{$propiedad->direccion}}</h4>

                        @if($propiedad->edificio_id)
                            <p class="desc">{{$propiedad->edificio()->first()->barrio()->first()->nombre}}</p>
                        @else
                            <p class="desc">{{$propiedad->barrio()->first()->nombre}}</p>
                        @endif
                        <p class="desc">
                            @if($propiedad->venta)
                                <span class="badge badge-secondary">Venta</span>
                            @endif

                            @if($propiedad->arriendo)
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
                            <div class="label-rating"><i
                                        class="fa fa-dollar"></i> {{number_format($propiedad->precio, 0, ',', '.')}}
                            </div>
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="{{route('propiedades.show', $propiedad->id)}}"
                           class="btn btn-sm btn-danger float-right">Detalles</a>
                        <div class="price-wrap h5">
                            <span class="price-new">${{$propiedad->precio}}</span>
                            <del class="price-old">${{$propiedad->precio}}</del>
                        </div> <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </figure>
            </div> <!-- col // -->
        @empty
            No hay propiedades para mostrar
        @endforelse


    </div> <!-- row.// -->

    <div class="row">
        <div class="col-md-12">
            {{ $propiedades->links() }}
        </div>
    </div>

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