<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Информационный портал киноклуба">
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <!-- Bootstrap CSS -->
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor_bundle.min.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.datatables.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.fancybox.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>

    @if(Route::is('profile.index'))

        <link href="https://imdibil.ru/styles/slick.css" type="text/css" rel="stylesheet"/>
        <link href="https://imdibil.ru/styles/slick-theme.css" type="text/css" rel="stylesheet"/>
    @endif


    {{--    <link href="https://imdibil.ru/styles/stylesheet.css" type="text/css" rel="stylesheet"/>--}}

    <title>IMDibil</title>
    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">

</head>
<body class="header-sticky header-fixed">
<header class="p-1 text-white header">

    <div class="container position-relative">
        <nav
            class="navbar navbar-expand-lg navbar-dark text-white justify-content-lg-between justify-content-md-inherit">

            <div class="align-items-start">

                <!-- mobile menu button : show -->
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <svg width="25" viewBox="0 0 20 20">
                        <path fill="#fff"
                              d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
                        <path fill="#fff"
                              d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
                        <path fill="#fff"
                              d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
                        <path fill="#fff"
                              d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
                    </svg>
                </button>

                <!-- navbar : brand (logo) -->
                <a class="navbar-brand" href="/">
                    <img src="https://imdibil.ru/image/logogo.png" width="110" height="38" alt="..." class="logo-head">
                </a>

            </div>

            <div class="navbar-collapse navbar-animate-fadein collapse" id="navbarMainNav" style="">


                <!-- navbar : mobile menu -->
                <div class="navbar-xs d-none"><!-- .sticky-top -->

                    <!-- mobile menu button : close -->
                    <button class="navbar-toggler pt-0 collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                        <svg width="20" viewBox="0 0 20 20">
                            <path
                                d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
                        </svg>
                    </button>

                    <!--
                        Mobile Menu Logo
                        Logo : height: 70px max
                    -->
                    <a class="navbar-brand" href="index.html">
                        <img src="https://imdibil.ru/image/logogo.png" width="110" height="38" alt="...">
                    </a>

                </div>
                <!-- /navbar : mobile menu -->


                <!-- navbar : navigation -->
                <ul class="navbar-nav">

                    <!-- mobile only image + simple search (d-block d-sm-none) -->
                    <li class="nav-item d-block d-sm-none">


                    </li>


                    <!-- home -->
                    <li class="nav-item active">

                        <a href="/" id="mainNavHome" class="nav-link">
                            Главная
                        </a>

                    </li>


                    <!-- pages -->
                    <li class="nav-item">

                        <a href="/statistics" id="mainNavPages" class="nav-link">
                            Аналитика
                        </a>


                    </li>


                    <!-- features -->
                    <li class="nav-item dropdown">

                        <a href="/news" class="nav-link">Тройки</a>


                    </li>


                    <!-- blog -->
                    {{--                    <li class="nav-item dropdown">--}}

                    {{--                        <a href="/feedback" class="nav-link">Форум</a>--}}



                    {{--                    </li>--}}

                    <!-- demos -->
                    <li class="nav-item dropdown active">

                        <a href="/game" class="nav-link">Викторина</a>

                    </li>

                    {{--                    <li class="nav-item dropdown">--}}

                    {{--                        <a href="/special" class="animate-blink nav-link text-warning">--}}
                    {{--                            5 сезон--}}
                    {{--                        </a>--}}
                    {{--                        --}}
                    {{--                    </li>--}}
                    <li class="nav-item dropdown">

                        <a href="/seasons" class=" nav-link">
                            Статистика по сезонам
                        </a>


                    </li>


                    <!-- social icons : mobile only -->
                    <li class="nav-item d-block d-sm-none text-center mb-4">


                    </li>


                </ul>
                <!-- /navbar : navigation -->


            </div>


            <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">





                <li class="list-inline-item mx-1 dropdown">

                    <a href="#" aria-label="My Account" id="dropdownAccountOptions" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" class="d-inline-block text-center text-dark js-stoppropag">
                        @if(Auth::check())
                            <img src="{{asset('build/images/uploads/'.(auth()->user()->avatar ?: 'default.png'))}}" alt="Ваня" class="avatar header">
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white"  viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                        @endif


                    </a>


                    <!-- dropdown -->
                    <div aria-labelledby="dropdownAccountOptions" class="prefix-link-icon prefix-icon-dot dropdown-menu dropdown-menu-clean dropdown-click-ignore end-0 p-2" style="min-width:215px;" data-bs-popper="none">
                        <div class="dropdown-header">
                            {{Auth::check() ? auth()->user()->name  : 'Гость'}}
                        </div>

                        <div class="dropdown-divider"></div>




                        <a href="{{route('profile.index')}}" title="Account Settings" class="dropdown-item text-truncate fw-light">
                            Профиль
                        </a>

                        <div class="dropdown-divider mb-0"></div>

                        @if(Auth::check())
                            <form action="{{route('logout')}}" method="post" id="logoutForm">
                                @csrf
                            </form>
                            <a href="javascript:void(0)" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore" onclick="document.getElementById('logoutForm').submit()">
                                <i class="fi fi-power float-start"></i>
                                Выход
                            </a>
                        @else
                            <a href="{{route('login')}}" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore" >
                                <i class="fi fi-power float-start"></i>
                                Вход
                            </a>
                            <a href="{{route('register')}}" class="prefix-icon-ignore dropdown-footer dropdown-custom-ignore">
                                <i class="fi fi-power float-start"></i>
                                Регистрация
                            </a>
                        @endif

                    </div>

                </li>
            </ul>

        </nav>
    </div>
    <!-- /Navbar -->

</header>

@yield('content')

<div class="container-fluid forum-card">
    <footer class="my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Главная</a></li>
            <li class="nav-item"><a href="/news.php" class="nav-link px-2 text-muted">Новости</a></li>
            <li class="nav-item"><a href="/feedback.php" class="nav-link px-2 text-muted">Форум</a></li>
            <li class="nav-item"><a href="/statistics.php" class="nav-link px-2 text-muted">Аналитика</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 IMDBil</p>
    </footer>
</div>
{{--<script src="{{ asset('/js/app.js')}}"></script>--}}

<script src="{{asset('/js/core.min.js')}}"></script>
<script src="{{asset('/js/vendor_bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/4.7.1/pixi.min.js"></script>--}}
<script src="{{asset('/js/main.js')}}"></script>
{{--<script src="https://imdibil.ru/scripts/main.js"></script>--}}
<a href="#" class="scrollup"></a>
</body>
</html>
