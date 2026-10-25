<footer>
    <div class="associate_wrap py-4">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h4>ASSOCIATED WITH:</h4>
                    <img src="{{ asset('images/nepal-gorvenment.jpg') }}" alt="">
                    <img src="{{ asset('images/ntb.jpg') }}" alt="">
                    <img src="{{ asset('images/taan.jpg') }}" alt="">
                    <img src="{{ asset('images/nma.jpg') }}" alt="">
                </div>

                <div class="col-sm-auto">
                    <h4>WE ACCEPT:</h4>
                    <img src="{{ asset('images/card.jpg') }}" alt="">
                </div>

            </div>
        </div>
    </div>

    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <h3>Links</h3>
                    <ul class="footer-link">
                        @foreach ($footer_link as $link)
                        <li>
                            <a href="{{ $link->url }}">{{ $link->title }}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <div class="col-sm">
                    <h3>Services</h3>
                    <ul class="footer-link row">
                        @foreach ($footer_services as $link)
                        <li class="col-6">
                            <a href="{{ $link->url }}">{{ $link->title }}</a>
                        </li>
                        @endforeach
                    </ul>

                </div>
                <div class="col-sm-auto">
                    <h3>Follow us on</h3>
                    <ul class="social-link">
                        @foreach ($socials as $social)
                        <li><a href="{{ $social->url }}"><i class="fa fa-{{ $social->icon }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-auto offset-sm-1">
                    <h3>Contact us</h3>
                    <h4>{{ config('app.name') }}</h4>

                    <p>
                        <i class="fa fa-map-marker"></i> {{ label('global:address') }} <br>
                        <i class="fa fa-phone"></i> {{ label('global:ph_number') }} <br>
                        <i class="fa fa-whatsapp"></i> {{ label('global:whatsapp_number') }} <br>
                        <i class="fa fa-at"></i> {{ label('global:eml_address') }} <br>
                        <i class="fa fa-at"></i> {{ label('global:eml_address1') }}
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="container" id="_f_menu">
        <div class="copyright">
            <p>
                <span>&copy; {{ date('Y') }}, {{ config('app.name') }}</span>
                <span>Kathmandu, Nepal</span>
                <span>All rights reserved.</span>
                <span class="">Design by: <a href="http://theitvilla.com/" target="_black">IT Villa</a></span>
            </p>
        </div>
    </div>
    <div id="backtotop" class="animated slideInUp">
        <i class="fa fa-angle-up"></i>
    </div>
</footer>