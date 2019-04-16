@extends('layouts.app')

@section('title', $pagina->titulo)

@push('styles')
@endpush

<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content">
                <div class="page_link">
                    <a href="{{route('propiedades.index')}}">Inicio</a>
                    <a href="{{route('paginas.show', $pagina->slug)}}">{{ucfirst($pagina->titulo)}}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->


@section('content')
    {!! $pagina->texto !!}
@endsection

@push('javascripts')
@endpush