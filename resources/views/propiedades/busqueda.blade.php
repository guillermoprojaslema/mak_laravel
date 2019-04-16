@extends('layouts.app')

@include('partials.busqueda')


@section('content')


    <div class="row">

        <!--================Properties Area =================-->
        <section class="properties_area">
            <div class="container">
                <div class="main_title">
                    <h2>Resultados de búsqueda: </h2>
                </div>
                <div class="row properties_inner">
                    @forelse($propiedades as $propiedad)
                        <div class="col-lg-4">
                            <div class="properties_item">
                                <div class="pp_img">
                                    <img class="img-fluid" src="img/properties/pp-1.jpg" alt="">
                                </div>
                                <div class="pp_content">
                                    <a href="{{route('propiedades.show', $oferta->id)}}">
                                        <h4>
                                            @if(($propiedad->edificio_id))
                                                {{$propiedad->edificio()->first()->direccion}},
                                                #{{$propiedad->edificio()->first()->numero}}
                                                ,  {{$propiedad->edificio()->first()->barrio()->first()->comuna()->first()->nombre}}
                                                .
                                            @else
                                                {{$propiedad->direccion}}
                                                , {{$propiedad->barrio()->first()->comuna()->first()->nombre}}.
                                            @endif
                                        </h4>
                                    </a>
                                    <div class="tags">
                                        <a href="#">{{$propiedad->dormitorio}} <i class="fab fa-bed"></i></a>
                                        <a href="#">{{$propiedad->bano}} <i class="fab fa-bath"></i></a>
                                        <a href="#">{{$propiedad->metros_cuadrados}} <i class="fas fa-ruler-combined"></i></a>
                                        <a href="#"><i class="fa @if($propiedad->amoblado) fa-check @else fa-times @endif"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa @if($propiedad->piscina) fa-check @else fa-times @endif"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i
                                                    class="fa @if($propiedad->aire_acondicionado) fa-check @else fa-times @endif"
                                                    aria-hidden="true"></i></a>
                                    </div>
                                    <div class="pp_footer">
                                        <h5 class="precio_clp">{{'$ '.number_format($propiedad->precio , 0, ',', '.')}}</h5>
                                        <h5 class="precio_usd">{{'$ '. number_format((float)$propiedad->precio / $sbif->dolar, 2, ',', '.')}}
                                            UF</h5>
                                        <h5 class="precio_eur"> {{'$ '. number_format((float)$propiedad->precio / $sbif->eur, 2, ',', '.')}}
                                            USD</h5>
                                        <h5 class="precio_uf">{{'€ '. number_format((float)$propiedad->precio / $sbif->uf,  2, ',', '.')}}
                                            EUR</h5>

                                        <a class="main_btn" href="#">{{$propiedad->tipo_negocio}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="main_title">
                            <h2>No existen propiedades con esos criterios de búsqueda. </h2>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        <!--================End Properties Area =================-->


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