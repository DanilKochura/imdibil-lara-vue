<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>

    <title>IMDibil</title>
    @if(auth()->check())
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif
    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">


</head>
<body class="" style="background-color: #252525">

<div class="container-fluid m-0 p-0">
    <div class="banner"
        >
        <div class="banner-text">
            <img src="https://imdibil.ru/images/logogo.png" style="width: 300px">
            <h1 class="">Welcome to IMDibil</h1>
            <p>Откройте для себя кино с новой стороны</p>
            <div class="button-container">
                <a href="#history-cards" class="button">Заседания</a>
                <a class="button quiz-btn" href="{{route('game')}}">Викторина</a>
                <a class="button" href="{{route('news')}}">Тройки</a>
                <a class="button" href="{{route('profile.index')}}">
                    <i class="fi fi-user-male d-none d-md-block"></i>
                    <span class="d-block d-md-none">Профиль</span>
                </a>

            </div>
        </div>


        <!-- Floating popcorn kernels -->
        <div id="popcorn-container"></div>

        <!-- Added film reel from Figma -->
        <div class="reel-1">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="reel-2">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="reel-3">
            <img src="https://imdibil.ru/images/pl.svg" alt="Film Reel" class="img-fluid"/>
        </div>
        <div class="splash-1">
            <svg width="891" height="939" viewBox="0 0 891 939" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="2" y="350.765" width="889" height="588" rx="39" fill="#121212"/>
                <g clip-path="url(#clip0_368_290)">
                    <rect x="2" y="350.765" width="889" height="100" rx="15" fill="#121212"/>
                    <rect x="804.48" y="212.765" width="94.8659" height="313.644" transform="rotate(24.3823 804.48 212.765)" fill="#D9D9D9"/>
                    <rect x="657.48" y="205.765" width="94.8659" height="313.644" transform="rotate(24.3823 657.48 205.765)" fill="#D9D9D9"/>
                    <rect x="510.48" y="198.765" width="94.8659" height="313.644" transform="rotate(24.3823 510.48 198.765)" fill="#D9D9D9"/>
                    <rect x="363.48" y="191.765" width="94.8659" height="313.644" transform="rotate(24.3823 363.48 191.765)" fill="#D9D9D9"/>
                    <rect x="216.48" y="184.765" width="94.8659" height="313.644" transform="rotate(24.3823 216.48 184.765)" fill="#D9D9D9"/>
                </g>
                <g clip-path="url(#clip1_368_290)">
                    <rect x="4.01758" y="261.677" width="889" height="100" transform="rotate(-17.1186 4.01758 261.677)" fill="#121212"/>
                    <rect x="730.326" y="-106.42" width="94.8659" height="313.644" transform="rotate(7.26377 730.326 -106.42)" fill="#D9D9D9"/>
                    <rect x="587.777" y="-69.8398" width="94.8659" height="313.644" transform="rotate(7.26377 587.777 -69.8398)" fill="#D9D9D9"/>
                    <rect x="445.229" y="-33.2598" width="94.8659" height="313.644" transform="rotate(7.26377 445.229 -33.2598)" fill="#D9D9D9"/>
                    <rect x="302.682" y="3.31934" width="94.8659" height="313.644" transform="rotate(7.26377 302.682 3.31934)" fill="#D9D9D9"/>
                    <rect x="160.133" y="39.8984" width="94.8659" height="313.644" transform="rotate(7.26377 160.133 39.8984)" fill="#D9D9D9"/>
                </g>
                <path d="M98.5 451.265H2V259.765L55 242.265L107.5 402.265L98.5 451.265Z" fill="#121212" stroke="white" stroke-width="3"/>
                <ellipse cx="26" cy="430.765" rx="12" ry="11" fill="white"/>
                <ellipse cx="81" cy="400.765" rx="12" ry="11" fill="white"/>
                <ellipse cx="40" cy="300.765" rx="12" ry="11" fill="white"/>
                <line x1="53" y1="554.5" x2="822" y2="554.5" stroke="#F6C700" stroke-width="7"/>
                <line x1="279" y1="555" x2="279" y2="718" stroke="#F6C700" stroke-width="2"/>
                <line x1="586" y1="555" x2="586" y2="718" stroke="#F6C700" stroke-width="2"/>
                <line x1="52" y1="717.5" x2="822" y2="717.5" stroke="white"/>
                <line x1="52" y1="795.5" x2="822" y2="795.5" stroke="white"/>
                <line x1="52" y1="873.5" x2="822" y2="873.5" stroke="white"/>
                <defs>
                    <clipPath id="clip0_368_290">
                        <rect width="889" height="100" fill="white" transform="translate(2 350.765)"/>
                    </clipPath>
                    <clipPath id="clip1_368_290">
                        <rect width="889" height="100" fill="white" transform="translate(4.01758 261.677) rotate(-17.1186)"/>
                    </clipPath>
                </defs>
            </svg>
        </div>
        <div class="splash-2">
            <img src="https://imdibil.ru/images/splash.svg" alt="Film Reel" class="img-fluid"/>
        </div>

        <div class="popcorn-box popcorn-container">
            <svg width="395" height="438" viewBox="0 0 395 438" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M340.5 436.5H73L1.5 1.5H393.5L340.5 436.5Z" fill="#2A2A2A" stroke="#5A5A5A"/>
                <path d="M96.5 435L46 1H113L141.5 435H96.5Z" fill="#FFC107" stroke="#F6C700"/>
                <path d="M303.236 437L354 3H286.649L258 437H303.236Z" fill="#FFC107" stroke="#F6C700"/>
                <path d="M177.052 437H221.466L229 3H160L177.052 437Z" fill="#FFC107" stroke="#F6C700"/>
            </svg>
        </div>

        <div class="camera ">
            <svg width="2775" height="1195" viewBox="0 0 2775 1195" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="393" y="787" width="202" height="140" rx="66" fill="#4B4B4B"/>
                <path d="M393 1181C393 1144.55 422.549 1115 459 1115H529C565.451 1115 595 1144.55 595 1181V1195H393V1181Z" fill="#4B4B4B"/>
                <rect x="106" y="410" width="777" height="433" rx="56" fill="#5F5F5F"/>
                <rect x="340" y="234" width="304" height="176" fill="#424242"/>
                <circle cx="335" cy="205" r="166" fill="#484848"/>
                <circle cx="681" cy="205" r="166" fill="#484848"/>
                <circle cx="335.5" cy="204.5" r="93.5" fill="#D9D9D9"/>
                <circle cx="681.5" cy="204.5" r="93.5" fill="#D9D9D9"/>
                <circle cx="335" cy="205" r="29" fill="#3D3D3D"/>
                <circle cx="681" cy="205" r="29" fill="#3D3D3D"/>
                <circle cx="501.5" cy="370.5" r="20.5" fill="#D9D9D9"/>
                <path d="M2775 0L1070.5 494V674L2775 1073.5V0Z" fill="#DCDCDC" fill-opacity="0.5" class="light"/>
                <path d="M913.286 620.522L907.873 552.47C907.36 546.032 911.318 540.079 917.453 538.061L1081.62 484.046C1090.68 481.066 1100 487.812 1100 497.345V677.026C1100 686.738 1090.35 693.499 1081.22 690.186L922.466 632.572C917.309 630.701 913.721 625.991 913.286 620.522Z" fill="#767676"/>
                <path d="M883 535H927V634H883V535Z" fill="#4B4B4B"/>
                <path d="M883 598H893C904.046 598 913 606.954 913 618V703C913 714.046 904.046 723 893 723H883V598Z" fill="#4B4B4B"/>
                <rect x="169" y="510" width="649" height="265" rx="48" fill="#969696"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M660.614 612.45C667.763 621.323 678.718 627 691 627C712.539 627 730 609.539 730 588C730 581.569 728.443 575.501 725.686 570.153L660.614 612.45ZM721.932 564.244C714.802 554.974 703.599 549 691 549C669.461 549 652 566.461 652 588C652 594.746 653.713 601.092 656.727 606.627L721.932 564.244Z" fill="#D9D9D9"/>
                <circle cx="235.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <circle cx="283.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <circle cx="331.5" cy="727.5" r="21.5" fill="#D9D9D9"/>
                <rect x="449" y="909" width="84" height="271" fill="#4B4B4B"/>
                <circle cx="491.5" cy="973.5" r="64.5" fill="#5F5F5F"/>
                <path d="M491 924L523.139 935.698L540.24 965.318L534.301 999L508.101 1020.98H473.899L447.699 999L441.76 965.318L458.861 935.698L491 924Z" fill="#4B4B4B"/>
                <path d="M52 630.452V586.762C52 582.932 49.8125 579.438 46.367 577.766L14.867 562.474C8.2255 559.25 0.5 564.088 0.5 571.47V646.966C0.5 654.484 8.4848 659.314 15.1433 655.823L46.6433 639.308C49.9367 637.582 52 634.17 52 630.452Z" fill="#424242"/>
                <rect x="48" y="579" width="58" height="59" fill="#5F5F5F"/>
                <rect x="28" y="927" width="226" height="55" rx="27.5" fill="#424242"/>
                <ellipse cx="225" cy="551.5" rx="17" ry="16.5" fill="#FFC107" class="light"/>

            </svg>


        </div>
    </div>
</div>
<div class="container my-5">
    <h3 class="text-white">Кто мы?</h3>
    <p class="text-white">
        Imdibil - <s>Киноклуб мгту имени баумана</s> Компания друзей, которые любят обсуждать кино. На протяжении почти двух лет мы периодически собираемся для того, чтобы поговорить о фильмах, и  вот наконец настал момент, когда мы поняли, что хотим делиться нашим <s>авторитетным</s> мнением с вами.
    </p>
    <p class="text-white">
        Этот портал был создан для ведения хроники наших заседаний, но вырос в нечто большее и теперь это уютное место для всех, кто как и мы не может представить свою жизнь без кинематографа
    </p>
    <p class="text-white">
        Кроме этого портала, у нас есть также <a href="https://t.me/imdibil_ru" class="text-gold">телеграм-канал</a>, где мы делимся нашими мнениями и впечатлениями от различных событий из мира кино.
    </p>
</div>
    <div class="container content my-5" id="history-cards">

        <h3 class="text-white">Прошедшие заседания</h3>

        <div class="mt-2">
            <div class="flickity-preloader flickity-white flickity-dot-line"
                 data-flickity='{ "autoPlay": false, "cellAlign": "left", "pageDots": false, "prevNextButtons": false, "contain": true, "rightToLeft": false }'>
                @foreach($meetings as $meeting)
                    <div class="col-6 col-md-2 px-1 rounded-10 moview-card">
                            <div class="card-inner">
                                <div class="card-front">
                                    <img data-src="https://imdibil.ru/images/posters/{{$meeting->movie->poster}}" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Meeting Poster 1" class="lazy movie-poster">
                                </div>
                                <div class="card-back">
                                    <p class="h4">{{$meeting->movie->name_m}}</p>
                                    <p>{{\Carbon\Carbon::parse($meeting->date_at)->translatedFormat('d F Y')}}</p>
                                    <div class="star-rating text-center w-100" data-bs-toggle="tooltip" data-bs-placement="right"
                                         title="Оценка фильма: {{$meeting->movie->our_rate}}" data-rating="{{$meeting->movie->our_rate}}"></div>
                                    <a class="btn btn-outline-warning btn-sm mt-3 rounded-pill" href="{{route('meetings')}}">Подробнее</a>
                                </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

<script>
    function createPopcornKernel() {
        const kernel = document.createElement('div');
        kernel.className = 'popcorn-kernel';

        // Set random size
        const size = Math.random() * 10 + 10; // Size between 10 and 20px
        kernel.style.width = `${size}px`;
        kernel.style.height = `${size}px`;

        // Set random horizontal translation
        const randomX = Math.random() * 100 - 50; // Random value between -50 and 50px
        kernel.style.setProperty('--random-x', `${randomX}px`);

        document.body.appendChild(kernel);

        const rect = document.querySelector('.popcorn-container').getBoundingClientRect();
        kernel.style.left = `${rect.left + rect.width / 2 - size / 2}px`;
        kernel.style.top = `${rect.top - size}px`;

        setTimeout(() => {
            kernel.remove();
        }, 3000);
    }

    setInterval(createPopcornKernel, 500);

    function spawnPopcornKernels() {
        let width = window.innerWidth

        let numKernels = Math.floor(Math.random() * 11) + 5; // Random number between 5 and 15

        if(width <= 800)
        {
            numKernels =0
        }
        for (let i = 0; i < numKernels; i++) {
            const kernel = document.createElement('div');
            kernel.className = 'popcorn';

            // Set random size
            const size = Math.random() * 10 + 10; // Size between 10 and 20px
            kernel.style.width = `${size}px`;
            kernel.style.height = `${size}px`;
            let left = Math.random() * 70 + 20
            let top = Math.random() * 70 + 20
            while (left > 30 && left < 60 && top > 30 && top < 60)
            {
                left = Math.random() * 60 + 20
                top = Math.random() * 60 + 20

            }

            // Set random position
            kernel.style.left = `${left}vw`;
            kernel.style.top = `${top}vh`;

            document.getElementById('popcorn-container').appendChild(kernel);
        }
    }

    document.addEventListener('DOMContentLoaded', spawnPopcornKernels);
</script>
<script src="{{asset('/js/core.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('/js/vendor_bundle.min.js')}}"></script>
<script src="{{asset('/js/main.js')}}"></script>

</body>
</html>
