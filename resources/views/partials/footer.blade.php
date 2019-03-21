<footer class="bg-dark" style="color: rgba(255, 255, 255, 0.5)">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <br>
                    <img class="logo-footer" src="{{asset('images/logos/logo_200x100.png')}}" alt="logo-footer"
                         data-at2x="assets/img/logo.png">
                    <p>
                        {{ setting('site.description')}}
                    </p>
                </div>
                <div class="col-md-4 col-lg-4 offset-lg-1">
                    <br>
                    <h3>Contact</h3>
                    <p><i class="fa fa-map-marker-alt"></i>Dirección: {{setting('site.direccion')}}</p>
                    <p><i class="fa fa-phone"></i> Teléfono: {{setting('site.telefono')}}</p>
                    <p><i class="fa fa-envelope"></i> Email: <a
                                href="mailto:{{setting('site.correo')}}">{{setting('site.correo')}}</a></p>
                </div>
                <div class="col-md-4 col-lg-3">
                    <br>
                    <h3>Síguenos</h3>
                    <p>
                        <a href="{{setting('site.facebook')}}"><i class="fa fa-facebook"></i></a>
                        <a href="{{setting('site.twitter')}}"><i class="fa fa-twitter"></i></a>
                        <a href="{{setting('site.google')}}"><i class="fa fa-google-plus-g"></i></a>
                        <a href="{{setting('site.instagram')}}"><i class="fa fa-instagram"></i></a>
                        <a href="{{setting('site.pinterest')}}"><i class="fa fa-pinterest"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>