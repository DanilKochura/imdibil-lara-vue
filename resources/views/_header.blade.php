
<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Информационный портал киноклуба">
    <meta name="yandex-verification" content="242eb7336dec418c" />
    <!-- Bootstrap CSS -->
{{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor_bundle.min.css">--}}
{{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.datatables.css">--}}
{{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.fancybox.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">

{{--    <?php if($routed_file=='profile.php'): ?>--}}
{{--    <link href="https://imdibil.ru/styles/slick.css" type="text/css" rel="stylesheet"/>--}}
{{--    <link href="https://imdibil.ru/styles/slick-theme.css" type="text/css" rel="stylesheet"/>--}}

{{--    <?php endif; ?>--}}

{{--    <link href="https://imdibil.ru/styles/stylesheet.css" type="text/css" rel="stylesheet"/>--}}

    <title>IMDibil</title>
    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">

</head>
<body class="header-sticky header-fixed">
<header class="p-1 text-white header" >

    <div class="container position-relative">
        <nav class="navbar navbar-expand-lg navbar-dark text-white justify-content-lg-between justify-content-md-inherit">

            <div class="align-items-start">

                <!-- mobile menu button : show -->
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <svg width="25" viewBox="0 0 20 20">
                        <path fill="#fff" d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
                        <path fill="#fff" d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
                        <path fill="#fff" d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
                        <path fill="#fff" d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
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
                    <button class="navbar-toggler pt-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
                        <svg width="20" viewBox="0 0 20 20">
                            <path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
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

                        <a href="/news" class="nav-link">Новости</a>


                    </li>


                    <!-- blog -->
                    <li class="nav-item dropdown">

                        <a href="/feedback" class="nav-link">Форум</a>



                    </li>

                    <!-- demos -->
                    <li class="nav-item dropdown active">

                        <a href="/game" class="nav-link">Викторина</a>

                    </li>

                    <li class="nav-item dropdown">

                        <a href="/special" class="animate-blink nav-link text-warning">
                            5 сезон
                        </a>



                    </li>
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





        </nav>
    </div>
    <!-- /Navbar -->

</header>
