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
            <div class="owl-carousel owl-theme">
                @forelse($ofertas as $oferta)
                    <div>
                        <img src="{{  $oferta->foto  }}" alt="{{$oferta->direccion}}">
                    </div>
                @empty
                    Hola
                @endforelse
            </div>
        </div>

        <div class="col-md-3 col-sm-12">
            <form method="POST" action="{{route('propiedades.busqueda')}}">
                {!! csrf_field() !!}
                <div class="form-group  {{ $errors->has('comuna') ? 'has-error' : ''}}">
                    <label for="comuna">Comuna</label>
                    <select class="form-control" name="comuna" id="comuna" data-required>
                        <option value="">Seleccione una Comuna</option>
                        @foreach($comunas as $comunas)
                            <option value="{{ $comunas->id }}"{{ old('comuna') == $comunas->id ? ' selected' : '' }}>{{ $comunas->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('comuna', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group  {{ $errors->has('tipo_propiedad') ? 'has-error' : ''}}">
                    <label for="tipo_propiedad">Clase de propiedad</label>
                    <select class="form-control tipo_propiedad" name="tipo_propiedad"
                            id="tipo_propiedad"
                            data-required>
                        <option value="">Seleccione una opción</option>
                        <option value="house" {{ old('tipo_propiedad') == 'casa' ? ' selected' : '' }}>Casa</option>
                        <option value="flat" {{ old('tipo_propiedad') == 'apartamento'? ' selected' : '' }}>Apartamento
                        </option>
                        <option value="office" {{ old('tipo_propiedad') == 'oficina' ? ' selected' : '' }}>Oficina
                        </option>
                        <option value="shop" {{ old('tipo_propiedad') == 'tienda_comercial' ? ' selected' : '' }}>Local
                            Comercial
                        </option>
                        <option value="warehouse" {{ old('tipo_propiedad') == 'bodega'? ' selected' : '' }}>Bodega
                        </option>
                        <option value="land" {{ old('tipo_propiedad') == 'terreno' ? ' selected' : '' }}>Terreno
                        </option>
                        <option value="parking" {{ old('tipo_propiedad') == 'estacionamiento' ? ' selected' : '' }}>
                            Estacionamiento
                        </option>
                    </select>
                    {!! $errors->first('tipo_propiedad', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-group  {{ $errors->has('divisa') ? 'has-error' : ''}} ">
                    <label for="divisa">Divisa:</label>
                    <select class="form-control" name="divisa" id="divisa" data-required>

                        <option value="">Seleccione una divisa</option>
                        <option value="UF" {{ old('divisa') == 'UF' ? ' selected' : '' }}> UF</option>
                        <option value="CLP" {{ old('divisa') == 'CLP'? ' selected' : '' }}> CLP
                        </option>
                        <option value="USD" {{ old('divisa') == 'USD'? ' selected' : '' }}> USD
                        </option>
                        <option value="EUR" {{ old('divisa') == 'USD' ? ' selected' : '' }}> EUR
                        </option>
                    </select>
                    {!! $errors->first('divisa', '<p class="help-block">:message</p>') !!}
                </div>


                <div class="form-group {{ $errors->has('venta') ? 'has-error' : ''}} {{ $errors->has('arriendo') ? 'has-error' : ''}}">
                    <label class="checkbox-inline">
                        <input type="checkbox" value="" id="venta"
                               name="venta" data-required>Venta</label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="true" id="arriendo"
                               name="arriendo" data-required checked>Arriendo</label>
                    {{ $errors->first('venta', '<p class="help-block">:message</p>') }}
                    {{ $errors->first('arriendo', '<p class="help-block">:message</p>') }}
                </div>

                <br><br>
                <div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
                    <label for="precio">Precio</label>
                    <br><br>
                    <input name="precio" type="hidden" class="range-slider" value="100000"/>
                    {{ $errors->first('precio', '<p class="help-block">:message</p>') }}
                </div>
                <br><br>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>


    <div class="row">
        @forelse($propiedades as $propiedad)
            <div class="col-sm-12 col-md-4 col-lg-3">
                <figure class="card card-product">
                    <div class="img-wrap"><img src="{{$propiedad->foto}}"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title">{{$propiedad->direccion}}</h4>

                        @if($propiedad->edificio_id)
                            <p class="desc">{{$propiedad->edificio()->first()->barrio()->first()->nombre}}</p>
                        @else
                            <p class="desc">{{$propiedad->barrio()->first()->nombre}}</p>
                        @endif
                        <p class="desc">
                            @if($propiedad->venta)
                                <span class="badge badge-primary">Venta</span></h1>
                            @endif

                            @if($propiedad->arriendo)
                                <span class="badge badge-primary">Arriendo</span></h1>
                            @endif

                        </p>

                        <div class="rating-wrap">
                            <div class="label-rating">{{$propiedad->metros_cuadrados}} m<sup>2</sup></div>
                            <div class="label-rating">{{$propiedad->bano}} Baños</div>
                        </div> <!-- rating-wrap.// -->
                    </figcaption>
                    <div class="bottom-wrap">
                        <a href="{{route('propiedades.show', $propiedad->id)}}" class="btn btn-sm btn-primary float-right">Detalles</a>
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
                scale: [0, 25, 50, 75, 100],
                format: '%s',
                width: 300,
                showLabels: true,
                isRange: true
            });
        });


    </script>
@endpush