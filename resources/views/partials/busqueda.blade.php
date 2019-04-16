

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content">
                <h5>{{setting('site.slogan_1', 'Tu slogan acá')}}</h5>
                <h3>{{setting('site.slogan_2', 'Otra frase acá')}}</h3>
                <a class="main_btn" href="#">Revisa nuestras ofertas</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="advanced_search">
            <h3>Buscar propiedades</h3>
            <form method="GET" action="{{route('propiedades.busqueda')}}">
                {{ csrf_field() }}
                <div class="search_select">
                    <select class="s_select" name="comuna_id" id="comuna" data-required>
                        <option value="">Seleccione una Comuna</option>
                        @foreach($comunas as $comuna)
                            <option value="{{ $comuna->id }}"{{ old('comuna') == $comuna->id ? ' selected' : '' }}>{{ $comuna->nombre }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('comuna_id', '<p class="red form-text  text-danger">:message</p>') !!}


                    <select class="s_select" name="tipo_propiedad"
                            id="tipo_propiedad" data-required>
                        <option value="">Seleccione una opción</option>
                        <option value="casa" {{ old('tipo_propiedad') == 'casa' ? ' selected' : '' }}>Casa</option>
                        <option value="apartamento" {{ old('tipo_propiedad') == 'apartamento'? ' selected' : '' }}>
                            Apartamento
                        </option>
                        <option value="oficina" {{ old('tipo_propiedad') == 'oficina' ? ' selected' : '' }}>Oficina
                        </option>
                        <option value="tienda_comercial" {{ old('tipo_propiedad') == 'tienda_comercial' ? ' selected' : '' }}>
                            Local
                            Comercial
                        </option>
                        <option value="bodega" {{ old('tipo_propiedad') == 'bodega'? ' selected' : '' }}>Bodega
                        </option>
                        <option value="terreno" {{ old('tipo_propiedad') == 'terreno' ? ' selected' : '' }}>Terreno
                        </option>
                        <option value="estacionamiento" {{ old('tipo_propiedad') == 'estacionamiento' ? ' selected' : '' }}>
                            Estacionamiento
                        </option>
                    </select>
                    {!! $errors->first('tipo_propiedad', '<p class="form-text  text-danger">:message</p>') !!}
                    <select class="s_select" name="divisa" id="divisa">
                        <option value="">Seleccione una divisa</option>
                        <option value="CLP" {{ old('divisa') == 'CLP'? ' selected' : '' }}>$ CLP
                        </option>
                        <option value="UF" {{ old('divisa') == 'UF' ? ' selected' : '' }}>$ UF</option>
                        <option value="USD" {{ old('divisa') == 'USD'? ' selected' : '' }}>$ USD
                        </option>
                        <option value="EUR" {{ old('divisa') == 'EUR' ? ' selected' : '' }}>€ EUR
                        </option>
                    </select>
                    {!! $errors->first('divisa', '<p class="form-text  text-danger">:message</p>') !!}


                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="negocio" value="venta">Venta
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="negocio" value="arriendo">Arriendo
                        </label>
                    </div>
                    {!! $errors->first('negocio', '<p class="red form-text  text-danger">:message</p>') !!}


                </div>
                <div class="search_range">
                    <div class="range_item">
                        <h5>Rango de precios</h5>
                        <div id="slider-range"></div>
                        <input type="text" id="amount" readonly style="border:0;" class="amount">

                    </div>
                </div>
                <input type="hidden" value="" name="min_precio" id="min-precio">
                {!! $errors->first('min_precio', '<p class="form-text  text-danger">:message</p>') !!}
                <input type="hidden" value="" name="max_precio" id="max-precio">
                {!! $errors->first('max_precio', '<p class="form-text  text-danger">:message</p>') !!}
                <button type="submit" value="submit" class="btn submit_btn">Buscar Propiedad</button>
            </form>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->