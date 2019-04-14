@extends('layouts.app')



@section('content')


    <!--================Properties Area =================-->
    <section class="properties_area">
        <div class="container">
            <div class="main_title">
                <h2>Nuestras propiedades destacadas</h2>
                <p>{{setting('site.propiedades_destacadas', 'Ven a revisar nuestras propiedades destacadas')}}</p>
            </div>
            <div class="row properties_inner">
                @forelse($destacados as $destacado)
                    <div class="col-lg-4">
                        <div class="properties_item">
                            <div class="pp_img">
                                <img class="img-fluid" src="img/properties/pp-1.jpg" alt="">
                            </div>
                            <div class="pp_content">
                                <a href="#"><h4>04 Bed Duplex</h4></a>
                                <div class="tags">
                                    <a href="#">04 Beds</a>
                                    <a href="#">03 Baths</a>
                                    <a href="#">750 sqm</a>
                                    <a href="#"><i class="fa fa-check" aria-hidden="true"></i>Pool</a>
                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i>Bar</a>
                                    <a href="#"><i class="fa fa-times" aria-hidden="true"></i>Pool</a>
                                </div>
                                <div class="pp_footer">
                                    <h5 class="precio_clp">Total: $3.5M</h5>
                                    <h5 class="precio_usd">Total: $3.5M</h5>
                                    <h5 class="precio_eur">Total: $3.5M</h5>
                                    <h5 class="precio_uf">Total: $3.5M</h5>
                                    <a class="main_btn" href="#">For Sale</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
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