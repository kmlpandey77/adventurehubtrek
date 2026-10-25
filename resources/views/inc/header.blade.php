<header>
    <div class="container">
        <div class="header">
            <div class="row">
                <div class="col-sm-3">
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <div class="col-sm">
                    <ul class="header-contact">
                        <li>
                            <span class="icon"><i class="fa fa-phone"></i></span>
                            <span class="txt">call us <small>{{ label('global:ph_number') }}</small></span>
                        </li>
                        <li>
                            <span class="icon"><i class="fa fa-at"></i></span>
                            <span class="txt">email us <a href="mailto:{{ label('global:eml_address') }}">{{ label('global:eml_address') }}</a></span>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-auto">
                    <form class="top-search" action="{{ url('search') }}" method="GET">
                        <input type="text" placeholder="keywords" name="q">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light navbar-expand-xl">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="mainmenu">
                <ul class="navbar-nav">
                    {!! App\Menu::html($main_menu) !!}
                </ul>
            </div>
        </div>
    </nav>
</header>