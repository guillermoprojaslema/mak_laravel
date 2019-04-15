@extends('layouts.app')

@section('title', 'Contacto')



<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content">
                <div class="page_link">
                    <a href="{{route('propiedades.index')}}">Inicio</a>
                    <a href="{{route('paginas.show', 'contacto')}}">Contacto</a>
                </div>
                <h2>Contáctanos</h2>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->


@section('content')


    <!--================Contact Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            {{--<div id="mapBox" class="mapBox"--}}
                 {{--data-lat="40.701083"--}}
                 {{--data-lon="-74.1522848"--}}
                 {{--data-zoom="13"--}}
                 {{--data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."--}}
                 {{--data-mlat="40.701083"--}}
                 {{--data-mlon="-74.1522848">--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>{{setting('site.ciudad', 'Santiago')}}, {{setting('site.pais','Chile')}}</h6>
                            <p>{{setting('site.direccion', 'El partidor ·1648')}}</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="tel:{{setting('site.telefono', '+56985540696')}}">{{setting('site.telefono', '+56985540696')}}</a></h6>
                            <p>{{setting('site.horario', 'Lunes a Viernes de 9:00 a 18:00')}}</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="mailto:{{setting('site.email')}}">{{setting('site.email')}}</a></h6>
                            <p>Envíanos un correo a cualquier hora</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form class="row contact_form" action="{{route('contacto.store')}}" method="post" id="contactForm" novalidate="novalidate">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                                {!! $errors->first('nombre', '<p class="red form-text  text-danger">:message</p>') !!}

                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
                                {!! $errors->first('email', '<p class="red form-text  text-danger">:message</p>') !!}

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                                {!! $errors->first('telefono', '<p class="red form-text  text-danger">:message</p>') !!}

                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Asunto">
                                {!! $errors->first('asunto', '<p class="red form-text  text-danger">:message</p>') !!}

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control" name="mensaje" id="mensaje" rows="1" placeholder="Ej: Me gustaría agendar una visita al departamento..."></textarea>
                                {!! $errors->first('mensaje', '<p class="red form-text  text-danger">:message</p>') !!}

                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--================Contact Area =================-->
@endsection

@push('javascripts')
@endpush