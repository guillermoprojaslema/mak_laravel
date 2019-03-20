<!doctype html>
<!--[if IE 9]>
<html class="ie9 no-js" lang="{{ app()->getLocale() }}"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#a20000">

    <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/1713/4549/t/17/assets/favicon.ico?8231455578558435871"
          type="image/x-icon"/>
    <meta name="google-site-verification" content="GPuzmdzXQI2A0Dtga7-vwNNg2FwkgE5uj1yyWGYlfGM"/>

    <title>@yield('title') - {{ setting('site.title', config('app.name')) }}</title>

    <meta name="description" content="La propiedad que buscas, está aquí">
    <meta name="author" content="Mak Propiedades">
    <meta name='robots' content='index,follow'/>

    <link rel="canonical" href="{{ url('/') }}"/>
    <link rel='shortlink' href='{{ url('/') }}'/>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="theme-color" content="#a20000">


    @stack('meta_tags_open_graph')


    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    @stack('styles')


    {{--@include('partials.scripts_social_network')--}}

</head>

<body>

@include('partials.nav_bar')
<div id="app" class="container">
    @yield('content')
</div>

@include('partials.footer')

@if ( !empty(setting('site.google_analytics_tracking_id')) && env('APP_ENV') == 'production')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async
            src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', '{{ setting('site.google_analytics_tracking_id') }}');
    </script>
@endif

<script src="/js/app.js"></script>
@stack('scripts')

</body>
</html>

