<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Facebook and Twitter integration -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/css/magnific-popup.css">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="/css/flexslider.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- Modernizr JS -->
    <script src="/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container-wrap">
            <div class="top-menu">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/post')}}">Post an Ad</a></li>
                            <li class="has-dropdown">
                                <a href="#">Categories</a>
                                <ul class="dropdown" style="display: none;">
                                    @foreach(\App\Category::all() as $item)
                                    <li><a href="#">{{$item->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                @if(Auth::user()->admin)
                                <li><a href="{{url('/admin')}}">Admin</a></li>
                                @endif
                                <li class="has-dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                        <li><a href="{{url('my-posts')}}">My Posts</a></li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <div class="container-wrap">
        @if (isset($msg))
        <div class="panel-body">
            <div class="alert alert-success">
                {{ $msg }}
            </div>
        </div>
        @endif
        @yield('content')
    </div><!-- END container-wrap -->

    <div class="container-wrap">
        <footer id="fh5co-footer" role="contentinfo">
            <div class="row">
                <div class="col-md-3 fh5co-widget">
                    <h4>About Greensoko</h4>
                    <p>Online Marketplace for Farmers</p>
                </div>
                <div class="col-md-3 col-md-push-1">
                    <h4>Latest Posts</h4>
                    <ul class="fh5co-footer-links">

                    </ul>
                </div>

                <div class="col-md-3 col-md-push-1">
                    <h4>Links</h4>
                    <ul class="fh5co-footer-links">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h4>Contact Information</h4>
                    <ul class="fh5co-footer-links">
                        {{--<li><br>Talk to us</li>--}}
                        <li><a href="#">+254 1235 2355 98</a></li>
                        <li><a href="#">hello@greensoko.co.ke</a></li>
                    </ul>
                </div>

            </div>

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2018 Greensoko All Rights Reserved.</small>
                        {{--<small class="block">Designed by--}}
                            {{--<a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a>--}}
                            {{--Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>--}}
                        {{--</small>--}}
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>
        </footer>
    </div><!-- END container-wrap -->
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="/js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="/js/jquery.flexslider-min.js"></script>
<!-- Magnific Popup -->
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/magnific-popup-options.js"></script>
<!-- Counters -->
<script src="/js/jquery.countTo.js"></script>
<!-- Main -->
<script src="/js/main.js"></script>

</body>
</html>

