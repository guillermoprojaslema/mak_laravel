@extends('layouts.app')

@section('title', 'Contacto')

@push('styles')
@endpush

@section('content')

    <h3>Contáctanos</h3>

    <div class="col-sm-12">
        <form method="POST" action="{{route('contacto.store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" value="{{old('nombre')}}" class="form-control" id="nombre" aria-describedby="nombre"
                       placeholder="Ej: Juan Pérez" name="nombre">
                {!! $errors->first('nombre', '<p class="form-text  text-danger">:message</p>') !!}

            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" value="{{old('email')}}" class="form-control" id="email" aria-describedby="email"
                       placeholder="micorreo@ejemplo.com" name="email">
                {!! $errors->first('email', '<p class="form-text  text-danger">:message</p>') !!}


            </div>

            <div class="form-group">
                <label for="teléfono">Teléfono</label>
                <input type="text" value="{{old('telefono')}}" class="form-control" id="telefono"
                       aria-describedby="telefono"
                       placeholder="Ej: +56912345678" name="telefono">
                {!! $errors->first('telefono', '<p class="form-text  text-danger">:message</p>') !!}

            </div>

            <div class="form-group">
                <label for="nombre">Asunto</label>
                <input type="text" value="{{old('asunto')}}" class="form-control" id="asunto" aria-describedby="asunto"
                       placeholder="Ej: Agendar una visita" name="asunto">
                {!! $errors->first('asunto', '<p class="form-text  text-danger">:message</p>') !!}

            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea value="{{old('mensaje')}}" class="form-control" id="mensaje" rows="3" name="mensaje"
                          placeholder="Me interesó mucho el departamento..."></textarea>
            </div>
            {!! $errors->first('mensaje', '<p class="form-text  text-danger">:message</p>') !!}


            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <br>
@endsection

@push('javascripts')
@endpush