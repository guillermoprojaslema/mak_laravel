@extends('layouts.app')

@if($propiedad->edificio_id)
    @section('title', $propiedad->direccion. ', '. $propiedad->edificio()->first()->nombre .', ' . $propiedad->edificio()->first()->barrio()->first()->nombre .', ' . $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->nombre)
@else
    @section('title', $propiedad->direccion. ', '. $propiedad->barrio()->first()->nombre .', ' . $propiedad->barrio()->first()->comuna()->first()->nombre)
@endif

@push('styles')
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($propiedad->edificio_id)
                <h4>{{$propiedad->direccion. ', '. $propiedad->edificio()->first()->nombre .', ' . $propiedad->edificio()->first()->barrio()->first()->nombre .', ' . $propiedad->edificio()->first()->barrio()->first()->comuna()->first()->nombre}}</h4>
            @else
                <h4>{{$propiedad->direccion. ', '. $propiedad->barrio()->first()->nombre .', ' . $propiedad->barrio()->first()->comuna()->first()->nombre}}</h4>
            @endif
        </div>

        <div class="col-md-12">
            <div class="owl-carousel owl-theme">
                @forelse(json_decode($propiedad->galeria) as $foto)
                    <div>
                        <img class="img-fluid img-thumbnail" src="{{$foto }}"
                             alt="{{$propiedad->direccion}}">
                    </div>
                @empty
                    No hay fotos
                @endif
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-md-12">{!! $propiedad->descripcion !!}</div>
    </div>
    <br><br>
    <div class="row">
        <h4>Ficha Técnica</h4>
        <div class="col-sm-12">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-ubicacion-tab" data-toggle="pill"
                       href="#pills-ubicacion"
                       role="tab" aria-controls="pills-ubicacion" aria-selected="true">Ubicación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-financiero-tab" data-toggle="pill" href="#pills-financiero"
                       role="tab"
                       aria-controls="pills-financiero" aria-selected="false">Financiero</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-externos-tab" data-toggle="pill" href="#pills-externos"
                       role="tab"
                       aria-controls="pills-externos" aria-selected="false">Externos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-internos-tab" data-toggle="pill" href="#pills-internos"
                       role="tab"
                       aria-controls="pills-internos" aria-selected="false">Internos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-medidas-tab" data-toggle="pill" href="#pills-medidas"
                       role="tab"
                       aria-controls="pills-medidas" aria-selected="false">Medidas</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-ubicacion" role="tabpanel"
                     aria-labelledby="pills-ubicacion-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                <tr>
                                    <td class="text-left">Clase de Propiedad</td>
                                    <td class="text-right">{{$propiedad->tipo_propiedad}}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Dirección</td>

                                    <td class="text-right">
                                        @if($propiedad->edificio_id)
                                            {{ $propiedad->edificio->direccion}}
                                        @else
                                            {{ $propiedad->direccion }}
                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Dirección referencial</td>
                                    <td class="text-right">
                                        @if($propiedad->edificio_id)
                                            {{ $propiedad->edificio->direccion_referencial }}
                                        @else
                                            {{ $propiedad->direccion_referencial }}
                                        @endif</td>
                                </tr>

                                @if(!$propiedad->edificio_id)
                                    <tr>
                                        <td class="text-left">Barrio</td>
                                        <td class="text-right">{{ $propiedad->barrio->nombre }}</td>

                                    </tr>

                                    <tr>
                                        <td class="text-left">Comuna</td>
                                        <td class="text-right">{{ $propiedad->barrio->comuna->nombre }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <td class="text-left">Edificio</td>
                                        <td class="text-right">{{  $propiedad->edificio->nombre }}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Barrio</td>
                                        <td class="text-right">{{ $propiedad->edificio->barrio->nombre }}</td>

                                    </tr>
                                @endif


                                <tr>
                                    <td class="text-left">Año de construcción</td>
                                    <td class="text-right">{{ $propiedad->ano_construccion }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Clase de Oficina</td>
                                    <td class="text-right">{{ $propiedad->tipo_oficina }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Clase de Casa</td>
                                    <td class="text-right">{{ $propiedad->tipo_casa  }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Orientación</td>
                                    <td class="text-right">{{ $propiedad->orientacion  }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-financiero" role="tabpanel" aria-labelledby="pills-financiero-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                <tr>
                                    <td class="text-left">Precio</td>
                                    <td class="text-right">${{ number_format($propiedad->precio, 2, ',', '.')}}</td>
                                </tr>
                                <tr>
                                    <td class="text-left">Gastos comunes</td>
                                    <td class="text-right">${{ number_format($propiedad->gastos_comunes, 2, ',', '.')}}</td>
                                </tr>

                                @if(Auth::check())
                                    <tr>
                                        <td class="text-left">Avalúo Fiscal
                                        </td>
                                        <td class="text-right">${{ number_format($propiedad->avaluo_fiscal, 2, ',', '.')}}</td>
                                    </tr>

                                    <tr>
                                        <td class="text-left">Contribuciones
                                        </td>
                                        <td class="text-right">${{ number_format($propiedad->contribuciones, 2, ',', '.')}}</td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-externos" role="tabpanel" aria-labelledby="pills-externos-tab">
                    <div class="wor">
                        <div class="col-md-12">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                <tr>
                                    <td class="text-left">Estacionamiento</td>
                                    <td class="text-right">
                                        @if($propiedad->estacionamiento )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred;" class="fa fa-times"></i>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Estacionamiento de visita</td>
                                    <td class="text-right">
                                        @if($propiedad->estacionamiento_visitas )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Planta Libre</td>
                                    <td class="text-right">
                                        @if($propiedad->planta_libre )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Logia</td>
                                    <td class="text-right">
                                        @if($propiedad->logia )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>
                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Terraza</td>
                                    <td class="text-right">
                                        @if($propiedad->terraza )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Lavandería</td>
                                    <td class="text-right">
                                        @if($propiedad->lavanderia )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Piscina</td>
                                    <td class="text-right">
                                        @if($propiedad->piscina )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Gimnasio</td>
                                    <td class="text-right">
                                        @if($propiedad->gimnasio )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Sala de eventos</td>
                                    <td class="text-right">
                                        @if($propiedad->sala_eventos )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Casilleros</td>
                                    <td class="text-right">
                                        @if($propiedad->casilleros )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Bodega</td>
                                    <td class="text-right">
                                        @if($propiedad->bodega )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-internos" role="tabpanel" aria-labelledby="pills-internos-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                <tr>
                                    <td class="text-left">Amoblada</td>
                                    <td class="text-right">
                                        @if($propiedad->amoblada )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <td class="text-left">Sala</td>
                                    <td class="text-right">
                                        @if($propiedad->sala )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Hall</td>

                                    <td class="text-right">
                                        @if($propiedad->hall )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Living-Comedor (juntos)</td>
                                    <td class="text-right">
                                        @if($propiedad->living_comedor )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Oficina secretaria</td>
                                    <td class="text-right">
                                        @if($propiedad->oficina_secretaria )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Sala de reunión</td>
                                    <td class="text-right">
                                        @if($propiedad->sala_reunion )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Baño de visitas</td>
                                    <td class="text-right">
                                        @if($propiedad->bano_visitas )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                    @endif
                                </tr>

                                <tr>
                                    <td class="text-left">Dormitorio de visitas</td>
                                    <td class="text-right">
                                        @if($propiedad->dormitorio_visitas )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Aire acondicionado</td>
                                    <td class="text-right">@if($propiedad->air_conditioning )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Red de computadores</td>
                                    <td class="text-right">
                                        @if($propiedad->red_computadora )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>

                                </tr>

                                <tr>
                                    <td class="text-left">Sauna</td>
                                    <td class="text-right">
                                        @if($propiedad->sauna )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Instalación trifásica</td>
                                    <td class="text-right">
                                        @if($propiedad->instalacion_trifasica )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Alarma contra incendios</td>
                                    <td class="text-right">
                                        @if($propiedad->alarma_incendio )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Alarma</td>
                                    <td class="text-right">
                                        @if($propiedad->alarma )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Iluminación</td>
                                    <td class="text-right">
                                        @if($propiedad->iluminacion )
                                            <i style="color:darkgreen" class="fa fa-check"></i>
                                        @else
                                            <i style="color:darkred" class="fa fa-times"></i>

                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-left">Cocina</td>
                                    <td class="text-right">
                                        @if($propiedad->tipo_cocina )
                                            Americana
                                        @else
                                            Separada
                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <td class="text-left">Dormitorios</td>
                                    <td class="text-right">{{ $propiedad->dormitorio }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Suites</td>
                                    <td class="text-right">{{ $propiedad->suite }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Closets</td>
                                    <td class="text-right">{{ $propiedad->closet }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Walking Closets</td>
                                    <td class="text-right">{{ $propiedad->walking_closet }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Baños</td>
                                    <td class="text-right">{{ $propiedad->bano }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Living</td>
                                    <td class="text-right">{{ $propiedad->living }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Escritorios</td>
                                    <td class="text-right">{{ $propiedad->escritorio }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Sala Privada</td>
                                    <td class="text-right">{{ $propiedad->sala_privada }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Clase de Ventana</td>
                                    <td class="text-right">{{ $propiedad->tipo_ventana }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Clase de Piso</td>
                                    <td class="text-right">{{ $propiedad->tipo_piso }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Sistema de Agua caliente</td>
                                    <td class="text-right">{{ $propiedad->tipo_agua_caliente }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Clase de calefacción</td>
                                    <td class="text-right">{{ $propiedad->calefaccion }}</td>
                                </tr>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-medidas" role="tabpanel" aria-labelledby="pills-medidas-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-borderless table-hover">
                                <tbody>
                                <tr>
                                    <td class="text-left">Metros cuadrados</td>
                                    <td class="text-right">{{ $propiedad->metros_cuadrados }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Metros cuadrados construidos</td>
                                    <td class="text-right">{{ $propiedad->metros_cuadrados_construidos }}</td>
                                </tr>
                                smart
                                <tr>
                                    <td class="text-left">Alto</td>
                                    <td class="text-right">{{ $propiedad->alto }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Ancho</td>
                                    <td class="text-right">{{ $propiedad->ancho }}</td>
                                </tr>

                                <tr>
                                    <td class="text-left">Largo</td>
                                    <td class="text-right">{{ $propiedad->largo }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    </div>
@endsection

@push('scripts')
    <script src="{{asset('js/owl.carousel.js')}}"></script>
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
            });
        });
    </script>
@endpush