<form method="GET" action="{{route('propiedades.busqueda')}}">
    {{ csrf_field() }}
    <div class="form-group  {!! $errors->has('comuna') ? 'has-error' : ''!!}">
        <label for="comuna">Comuna</label>
        <select class="form-control" name="comuna_id" id="comuna" data-required>
            <option value="">Seleccione una Comuna</option>
            @foreach($comunas as $comuna)
                <option value="{{ $comuna->id }}"{{ old('comuna') == $comuna->id ? ' selected' : '' }}>{{ $comuna->nombre }}</option>
            @endforeach
        </select>
        

        {!! $errors->first('comuna_id', '<p class="red form-text  text-danger">:message</p>') !!}
    </div>
    <div class="form-group  {{ $errors->has('tipo_propiedad') ? 'has-error' : '' }}">
        <label for="tipo_propiedad">Clase de propiedad</label>
        <select class="form-control tipo_propiedad" name="tipo_propiedad"
                id="tipo_propiedad"
                data-required>
            <option value="">Seleccione una opción</option>
            <option value="casa" {{ old('tipo_propiedad') == 'casa' ? ' selected' : '' }}>Casa</option>
            <option value="apartamento" {{ old('tipo_propiedad') == 'apartamento'? ' selected' : '' }}>Apartamento
            </option>
            <option value="oficina" {{ old('tipo_propiedad') == 'oficina' ? ' selected' : '' }}>Oficina
            </option>
            <option value="tienda_comercial" {{ old('tipo_propiedad') == 'tienda_comercial' ? ' selected' : '' }}>Local
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
    </div>
    <div class="form-group  {!! $errors->has('divisa') ? 'has-error' : ''!!} ">
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
        {!! $errors->first('divisa', '<p class="form-text  text-danger">:message</p>') !!}
    </div>


    <div class="form-group form-check-inline">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="negocio">Venta
        </label>
    </div>
    <div class="form-group form-check-inline">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="negocio">Arriendo
        </label>
    </div>


    <br><br>
    <div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
        <label for="precio">Precio</label>
        <br><br>
        <input name="precio" type="hidden" class="range-slider" value="100000"/>
        {!! $errors->first('precio', '<p class="form-text  text-danger">:message</p>') !!}
    </div>
    <br><br>
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>

