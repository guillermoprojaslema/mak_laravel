<!--================ start footer Area  =================-->
<footer class="footer-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Acerca de nosotros</h6>
                    <p>{{setting('site.acerca_nosotros', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua')}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">Nuestras secciones</h6>
                    <ul class="list instafeed d-flex flex-wrap">
                        @forelse($paginas as $pagina)
                            <li><a href="{{route('paginas.show', $pagina->slug)}}">{{$pagina->titulo}}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Indicadores Económicos</h6>
                    <p>Dólar: ${{number_format($sbif->dolar, 0, ',', '.')}}</p>
                    <p>Euro: ${{number_format($sbif->euro, 0, ',', '.')}}</p>
                    <p>UF: ${{number_format($sbif->uf, 0, ',', '.')}}</p>
                    <p>UTM: ${{number_format($sbif->utm, 0, ',', '.')}}</p>
                    <p>IPC: ${{number_format($sbif->ipc, 2, ',', '.')}}</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title">Síguenos</h6>
                    <p>Visita nuestras redes sociales</p>
                    <div class="f_social">
                        <a href="{{setting('site.facebook_url')}}"><i class="fab fa-facebook"></i></a>
                        <a href="{{setting('site.twitter_url')}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{setting('site.instagram_url')}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{setting('site.pinterest_url')}}"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->