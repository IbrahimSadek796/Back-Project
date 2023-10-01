<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> @yield('title','Male-Fashion')</title>

    <!-- Google Font -->




    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Favicons -->
    <link rel="stylesheet" href="{{url('/css/all.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css">

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links ">
                @yield('RegLog')
            </div>

        </div>

        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7">
                        <div class="header__top__left">
                            <p class="">Free shipping, 30-day return or refund guarantee.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__links ">

                                @yield('RegLog')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar bg-body-tertiary ">
            <form class="container-fluid border-radius-lg w-50 my-5">
                <div class="input-group">

                <input type="search"
                class="form-control rounded"
                placeholder="Find Product here"
                name="search"
                value="{{ request('search') }}">
                </div>
            </form>
        </div>
        <div class="container ">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="./index.html"><img src="{{url('img/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <nav class="header__menu mobile-menu ">
                        <ul>

                            @yield('links')
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>

