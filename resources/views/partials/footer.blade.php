<!--================ start footer Area  =================-->
<footer class="footer-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 class="footer_title">Acerca de nosotros</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget instafeed">
                    <h6 class="footer_title">Instagram Feed</h6>
                    <ul class="list instafeed d-flex flex-wrap">
                        @forelse($paginas as $pagina)
                            <li><a href="{{route('paginas.show', $pagina->slug)}}">{{$pagina->titulo}}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget f_social_wd">
                    <h6 class="footer_title">Follow Us</h6>
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