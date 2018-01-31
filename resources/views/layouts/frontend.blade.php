<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('keywordseo')">
    <meta name="description" content="@yield('descseo')">

    @if($setting !== '')
    <meta name="author" content="{{ $setting->author }}">
    <link href="{{ $setting->favicon }}" rel="shortcut icon" type="image/x-icon" />

    {!! $setting->googlewebmaster !!}
    {!! $setting->bingwebmaster !!}
    {!! $setting->alexa !!}
    {!! $setting->googleanalytic !!}

    <meta name="revisit-after" content="{{ $setting->revistafter }}">
    <meta name="robots" content="{{ $setting->robots }}">
    @else
    <meta name="author" content="Abed Putra">
    <link href="" rel="shortcut icon" type="image/x-icon" />

    <meta name="revisit-after" content="">
    <meta name="robots" content="">
    @endif
    <title>@yield('titleseo')</title>

    @if($setting !== '')
    <!-- Bootstrap Core CSS -->
      <link href="{{ $setting->theme }}" rel="stylesheet">
    @else
      <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    @endif

    <!-- Custom CSS -->
    <link href="{{ asset('public/css/landing-page.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if($setting !== '')
                <a class="navbar-brand topnav" href="{{ url('/') }}">{{ $setting->title_site }}</a>
                @else
                <a class="navbar-brand topnav" href="{{ url('/') }}">Default Theme</a>
                @endif

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">
                  @foreach($menu as $item)
                    @if($item->mainmenu_link != '#')
                      <li>
                          <a href="{{ $item->mainmenu_link }}">{{ $item->mainmenu_name }}</a>
                      </li>
                    @endif
                  @if ($item->submenu->count())
                    <li class="dropdown">
                      <a href="" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown">{{ $item->mainmenu_name }} <b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        @foreach ($item->submenu as $subitem)
                            <li><a href="{{$subitem->submenu_link}}">{{ $subitem->submenu_name }}</a></li>
                        @endforeach
                      </ul>
                    </li>
                  @endif
                  @endforeach

                  @if (Route::has('login'))
                    @auth
                        <li>
                          <a href="{{ action('HomeController@index') }}" style="background: #cfcfcf;">Dashboard</a>
                        </li>
                    @else
                      <li>
                        <a href="{{ route('login') }}">Login</a>
                      </li>
                      <li>
                        <a href="{{ route('register') }}">Register</a>
                      </li>
                    @endauth
                  @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright 2017 Powered by <a href="http://abedputra.com/">Abed Putra</a> & <a href="https://laravel.com/">Laravel</a>, Design by <a href="https://startbootstrap.com/">Start Bootstrap</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- js -->
    <script src="{{ asset('public/js/app.js') }}"></script>
</body>

</html>
