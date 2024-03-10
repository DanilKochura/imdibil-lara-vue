<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <!-- Bootstrap CSS -->
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor_bundle.min.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.datatables.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.fancybox.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>

@if(Route::is('profile.index'))

        <link href="{{asset('css/slick.css')}}" type="text/css" rel="stylesheet"/>
        <link href="{{asset('css/slick-theme.css')}}" type="text/css" rel="stylesheet"/>
    @endif
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">


    {{--    <link href="https://imdibil.ru/styles/stylesheet.css" type="text/css" rel="stylesheet"/>--}}

    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">

</head>
<body class="header-sticky header-fixed @if(Route::is('statistics')) bg-dark @endif">

<div class="wrapper">
    <header id="header" class="p-1 text-white header bg-dark">

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
                        <img src="https://imdibil.ru/images/logogo.png" width="110" height="38" alt="..." class="logo-head">
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
                        <a class="navbar-brand" href="/">
                            <img src="https://imdibil.ru/images/logogo.png" width="110" height="38" alt="...">
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

{{--                            <a href="/seasons" class=" nav-link">--}}
{{--                                Статистика по сезонам--}}
{{--                            </a>--}}


                        </li>


                        <!-- social icons : mobile only -->
                        <li class="nav-item d-block d-sm-none text-center mb-4">


                            <a href="https://t.me/imdibil_ru" class=" nav-link">
                                <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"></path>
                                </svg>
                                Подписывайтесь на телеграмм
                            </a>
                        </li>


                    </ul>
                    <!-- /navbar : navigation -->


                </div>


                <ul class="list-inline list-unstyled mb-0 d-flex align-items-end">





                    <li class="list-inline-item mx-1 dropdown">

                        <a href="#" aria-label="My Account" id="dropdownAccountOptions" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true" class="d-inline-block text-center text-dark js-stoppropag">
                            @if(Auth::check())
                                <img src="{{asset('images/uploads/'.(auth()->user()->avatar ?: 'default.jpg'))}}" alt="Ваня" class="avatar header">
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

    <div class="container-fluid bg-dark bottom-0 py-4">
        <footer >
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/" class="nav-link px-2 text-muted">Главная</a></li>
                <li class="nav-item"><a href="{{route('news')}}" class="nav-link px-2 text-muted">Новости</a></li>
{{--                <li class="nav-item"><a href="/feedback.php" class="nav-link px-2 text-muted">Форум</a></li>--}}
                <li class="nav-item"><a href="{{'statictics'}}" class="nav-link px-2 text-muted">Аналитика</a></li>
                <li class="nav-item"><a href="{{'quiz'}}" class="nav-link px-2 text-muted">Викторина</a></li>
            </ul>
            <p class="text-center text-muted">© 2022 - {{\Carbon\Carbon::now()->format('Y')}} IMDBil</p>
        </footer>
    </div>
</div>

<a class="bg-facebook fill-gray-100 d-none d-sm-block p-2 position-fixed rounded-circle left-widget" href='https://t.me/imdibil_ru' target='_blank'>
    <div class='telegram-icon'>
        <svg viewBox='0 0 64 64'><path d='M56.4,8.2l-51.2,20c-1.7,0.6-1.6,3,0.1,3.5l9.7,2.9c2.1,0.6,3.8,2.2,4.4,4.3l3.8,12.1c0.5,1.6,2.5,2.1,3.7,0.9 l5.2-5.3c0.9-0.9,2.2-1,3.2-0.3l11.5,8.4c1.6,1.2,3.9,0.3,4.3-1.7l8.7-41.8C60.4,9.1,58.4,7.4,56.4,8.2z M50,17.4L29.4,35.6 c-1.1,1-1.9,2.4-2,3.9c-0.2,1.5-2.3,1.7-2.8,0.3l-0.9-3c-0.7-2.2,0.2-4.5,2.1-5.7l23.5-14.6C49.9,16.1,50.5,16.9,50,17.4z'/></svg>
    </div>
</a>

<script src="{{asset('/js/core.min.js')}}"></script>
<script src="{{asset('/js/vendor_bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/4.7.1/pixi.min.js"></script>--}}
<script src="{{asset('/js/main.js')}}"></script>
{{--<script src="https://imdibil.ru/scripts/main.js"></script>--}}
<script src="{{ asset('/js/app.js')}}"></script>

@if(Route::is('statistics'))
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endif
<a href="#" class="scrollup"></a>
</body>
</html>
