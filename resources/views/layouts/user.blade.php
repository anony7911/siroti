<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SiRoti">
    <meta name="keywords" content="siroti, jual, roti">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/assets1/css/style.css" type="text/css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @yield('css')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__siroti">
            <a href="#"><img src="{{ url('/') }}/assets1/img/siroti.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                @if(Route::has('login'))
                    @auth
                        <a href="{{ url('/u/pesanan') }}"
                            class="text-sm text-gray-700 underline"><i class="fa fa-user"></i>
                            {{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline"><i
                                class="fa fa-user"></i>Login</a>
                    @endauth
                @endif
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class = "@if (Request::is('/')) active @endif"><a href           = "/">Home</a></li>
                <li class = "@if (Request::is('u/produk')) active @endif"><a href    = "/u/produk">Produk</a></li>
                <li class = "@if (Request::is('u/keranjang')) active @endif"><a href = "@auth /u/keranjang @else /login @endauth">Keranjang</a></li>
                <li class = "@if (Request::is('u/pesanan')) active @endif"><a href   = "@auth /u/pesanan @else /login @endauth">Pesanan</a></li>
                <li class = "@if (Request::is('u/kontak')) active @endif"><a href    = "u/kontak">Kontak</a></li>
                {{-- logout --}}
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> siroti@gmail.com</li>
                <li>SiRoti - Pabrik Roti Karunia Mandiri Kendari</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top bg-white">
            <div class="container ">
                <div class="row bg-light">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> siroti@gmail.com</li>
                                <li>SiRoti - Pabrik Roti Karunia Mandiri Kendari</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                @if(Route::has('login'))
                                    @auth
                                        {{-- dropdown logout --}}
                                        <div class="header__top__right__language">
                                            <a href="#" class="" data-toggle="dropdown" role="button"
                                                aria-expanded="false" aria-haspopup="true" v-pre>
                                                <i class="fa fa-user mr-2"></i>{{ Auth::user()->name }} <span
                                                    class="caret"></span>
                                            </a>
                                            <ul class="">
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form"
                                                        action="{{ route('logout') }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="text-sm text-gray-700 underline"><i
                                                    class="fa fa-user"></i>Login</a>
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container bg-white">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__siroti font-weight-bold">
                        <a href="./index.html">
                            <h1>SiRoti</h1>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="@if (Request::is('/')) active @endif"><a href="/">Home</a></li>
                            <li class="@if (Request::is('u/produk')) active @endif"><a href="/u/produk">Produk</a></li>
                            <li class="@if (Request::is('u/keranjang')) active @endif"><a
                                    href="/u/keranjang">Keranjang</a></li>
                            <li class="@if (Request::is('u/pesanan')) active @endif"><a href="/u/pesanan">Pesanan</a>
                            </li>
                            <li class="@if (Request::is('u/kontak')) active @endif"><a href="/u/kontak">Kontak</a></li>
                            {{-- logout --}}
                            @auth
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="text-danger"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </form>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    @yield('content')
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__siroti">
                            <a href="#"><img src="{{ url('/') }}/assets1/img/siroti.png"
                                    alt=""></a>
                        </div>
                        <ul>
                            <li>Alamat: JL. Kancil No.17 B, Kel. Andonohu - Kendari</li>
                            <li>Telepon: 0822-4222-3123</li>
                            <li>Email: siroti@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());

                                </script> All rights reserved | This template is made by <a href="#">#.</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img
                                src="{{ url('/') }}/assets1/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ url('/') }}/assets1/js/jquery-3.3.1.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/jquery.nice-select.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/jquery.slicknav.js"></script>
    <script src="{{ url('/') }}/assets1/js/mixitup.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/owl.carousel.min.js"></script>
    <script src="{{ url('/') }}/assets1/js/main.js"></script>

    @livewireScripts

        {{-- nonaktif undeline --}}
        <style>
            a {
                text-decoration: none;
            }

        </style>
    @stack('scripts')
</body>

</html>
