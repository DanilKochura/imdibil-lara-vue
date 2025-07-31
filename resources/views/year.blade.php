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
    <link rel="stylesheet" href="{{ asset('/css/vendor_bundle.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com"> <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body.new-year {
            background-color: #18370f !important;
        }
        body
        {
            font-family: Montserrat !important;
        }
        a {
            color: gold;
        }

        .big-circle-stat {
            border: 5px solid;
            width: 50px;
            height: 50px;
            background: #18370f;
            border-radius: 50%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .small-circle-stat {
            border: 2px solid;
            width: 30px;
            height: 30px;
            background: #18370f;
            border-radius: 50%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        #preview {
            height: 100vh;
            background-size: cover;
        //background: #3a3a3a;
        }

        .fs-10p {
            font-size: 10px;
        }

        .year-text {
            /* left: 50%; */
            font-size: 300px;
            width: 100%;
            text-align: center;
            font-weight: 700;

            color: white;
            transition: 2s;
            opacity: 1;
        //color: rgba(225,225,225, .01); animation: 2s apearance; //background-image: url(src/assets/1990/gif.gif); //background-size: contain; //background-repeat: repeat; //-webkit-background-clip:text;
        }

        .perspective-rotate {
            animation: 5s rotate ease-in-out infinite;
        }

        @keyframes rotate {
            0% {
                perspective-origin: 20%;
            }
            50% {
                perspective-origin: 70%;

            }
            100% {
                perspective-origin: 20%;
            }
        }

        .movie-info-pill {
            padding: 5px;
            border-radius: 20px;
            text-align: center;
            min-width: 150px;
        }

        .grey-zone {
            color: #c2c2c2;
        }

        .green-zone {
            color: #03c03c;
        }

        .red-zone {
            color: red;
        }

        .gold {
            color: gold;
        }

        @media screen and (max-width: 600px) {
            .movie-info-pill {
                min-width: 70px;
            }

            .star-rating-big {
                font-size: 1.5rem;
            }

            .year-text {
                font-size: 100px;
                bottom: 50%;
            }

            .main-slide .background-image {
                filter: brightness(0.7) !important;
            }

            .key-event-preview {
                font-size: 30px !important;
            }
        }

        .image-first-poster {
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center;
            border-radius: 20px;

        }

        .br-20px {
            border-radius: 20px !important;
        }

        .key-event-preview {
            /* left: 50%; */
            font-size: 70px;
            width: 100%;
            text-align: center;
            font-weight: 700;

            color: white;
            transition: 2s;
            opacity: 0;
        //color: rgba(225,225,225, .01); animation-duration: 2s; animation-delay: 2s; animation-name: apearance; animation-fill-mode: forwards; //background-image: url(src/assets/1990/gif.gif); //background-size: contain; //background-repeat: repeat; //-webkit-background-clip:text;
        }

        #main-hr {
            width: 0;
            color: gold;
            opacity: 0.9;
            height: 6px;
            animation: 3s forwards raise_width;
        }

        @keyframes raise_width {
            from {
                width: 0%;
            }
            to {
                width: 100%;
            }
        }

        .banner-text {
            position: absolute;
            height: 100vh;
            display: flex;
            width: 100%;
            top: 0;
            flex-direction: column;
            justify-content: center;
        }

        @keyframes apearance {
            from {
                opacity: 0;

            }
            to {
                opacity: 1;

            }
        }

        .ts-white {
            text-shadow: 1px 1px white;

        }

        .ts-black {
            text-shadow: 1px 1px black;

        }

        .header-famous {
            font-size: 120px;
            text-shadow: 1px 1px black;
            padding: 0 0 5px 0;
            color: gold;
            width: 250px;
            height: 250px;
            background: white;
            border-radius: 50%;
        }

        .fs-lower {
        //font-size: small;
        }

        .overlay-dark-gray:after {
            background-color: #2e2e2e;
        }

        .main-slide .background-image {
            height: 100vh;
            background-image: url(src/assets/1990/111.gif);
            background-size: cover;
            background-attachment: fixed;
            filter: brightness(0.3);
            background-position: center;
        }

        @media screen and (max-width: 600px) {

            .main-slide .background-image {
                filter: brightness(0.35) !important;
                background-image: url(src/assets/1990/vertical.gif);
                background-size: cover;
                background-position-x: center;
                background-position-y: top;


            }


        }

        .gold-swiper .swiper-pagination-progressbar-fill, .swiper-container:not(.swiper-btn-group).swiper-primary .swiper-button-next, .swiper-container:not(.swiper-btn-group).swiper-primary .swiper-button-prev, .swiper-container:not(.swiper-btn-group).swiper-primary .swiper-pagination-bullet-active {
            background-image: none !important;
            background: gold !important;
            color: #fff !important;
        }
    </style>
</head>
<body
    class="header-sticky header-fixed @if(Route::is('statistics')) bg-dark @endif {{ \App\UseCases\ThemeTrait::isNewYear() ? 'new-year' : ''}}">


<div class="main-slide">
    <div class="background-image">
        <div class="sow-util-slideshow position-relative overlay-dark overlay-opacity-3"
             data-sow-slideshow-interval="1500"
             data-sow-slideshow-fade-delay="1000"
             data-sow-slideshow="
		@foreach($stats['posters'] as $poster)
           {{$poster}},
        @endforeach
		" style="width:100%;height:100vh">
        </div>
    </div>

    <div class="banner-text">

        <div class="year-text">
            2024
        </div>
        <div class="d-flex justify-content-center">
            <hr id="main-hr">

        </div>
        <div class="key-event-preview">Статистика твоего киногода</div>
        <div class="key-event-preview">{{$name}}</div>
    </div>
</div>
<div class="container py-5" >
    <div class="row">
        <div class="col-md-6 text-center fw-bold" data-aos="fade-up">
            <div class="d-flex align-items-center flex-column">
                <div class="align-items-center d-flex header-famous justify-content-center">
                    <div>
                            <span data-toggle="count"
                                  data-count-from="0"
                                  data-count-to="{{$stats['rate']}}"
                                  data-count-duration="2000"
                                  data-count-decimals="0">0</span>

                    </div>
                </div>
                @php

                    $end = $stats['rate'] % 10;
                    $ending = "фильмов";
                    if ($stats['rate'] % 100 < 10 or $stats['rate'] % 100 > 14)
                        {
                             if ($end == 1)
                        {
                            $ending = "фильм";
                        }
                    elseif (in_array($end, [2, 3, 4]))
                    {
                        $ending = "фильма";
                    }
                        }

                @endphp
                <div class="text-secondary mt-3">
                    {{$ending}} ты посмотрел в этом году
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 text-center fw-bold" data-aos="fade-up">
            <div class="d-flex align-items-center flex-column">
                <div style="
                font-size: 70px;
                color: gold;
                text-shadow: 1px 1px white;
                @php

                $hours = round($stats['durability']/60, 0);
                $end = $hours % 10;
                $ending = "часов";
                if ($hours % 100 < 10 or $hours % 100 > 14)
                    {
                         if ($end == 1)
                    {
                        $ending = "час";
                    }
                elseif (in_array($end, [2, 3, 4]))
                {
                    $ending = "часа";
                }
                    }

                @endphp
                ">{{count($stats['unique'])}}</div>
                <div class="text-secondary mt-3">
                    из них никто кроме тебя не смотрел
                </div>
            </div>

        </div>
    </div>
</div>
<div class="swiper-container swiper-white my-4" data-swiper='{
		"slidesPerView": 6,
		"spaceBetween": 4,
		"slidesPerGroup": 1,
		"loop": false,
		"autoplay": { "delay" : 1000, "disableOnInteraction": false },
		"breakpoints": {
			"1024": { "slidesPerView": "8" },
			"920":	{ "slidesPerView": "6" },
			"640":	{ "slidesPerView": "7" }
		}
	}'>
    <div class="hide swiper-wrapper">
        @php
            $posters = $stats['posters'];
            shuffle($posters) @endphp
        @foreach($posters as $poster)
            <div class="swiper-slide">
                <img src="{{$poster}}" class="img-fluid rounded" alt="...">
            </div>
        @endforeach
    </div>
</div>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 text-center fw-bold" data-aos="fade-up">
            <div class="d-flex align-items-center flex-column">
                <div class="text-secondary mt-3">
                    это заняло примерно
                </div>
                <div style="
                font-size: 70px;
                color: gold;
                text-shadow: 1px 1px white;
                @php

                $hours = round($stats['durability']/60, 0);
                $end = $hours % 10;
                $ending = "часов";
                if ($hours % 100 < 10 or $hours % 100 > 14)
                    {
                         if ($end == 1)
                    {
                        $ending = "час";
                    }
                elseif (in_array($end, [2, 3, 4]))
                {
                    $ending = "часа";
                }
                    }

                @endphp
                ">{{$hours}} {{$ending}}</div>
            </div>

        </div>
    </div>
    <div class="row mt-5">
        <h3 class="text-secondary text-center">
            Вот так распределились оценки по месяцам
        </h3>
        <canvas id="densityChart" width="600" height="400" style="width: 600px; height: 600px"></canvas>
        <script>

            const ctx = document.getElementById('densityChart');
            const labels = ["{!!  implode('","',array_keys($stats['month']))!!}"]
            const data = {
                labels: labels,
                datasets: [{
                    axis: 'y',
                    label: 'Количество фильмов',
                    data: [{{implode(',', array_values( $stats['month']))}}],
                    fill: false,
                    backgroundColor: [
                        'rgba(34,65,164,0.91)',
                        'rgb(26,105,161)',
                        'rgb(20,168,155)',
                        'rgb(23,185,94)',
                        'rgb(85,194,32)',
                        'rgb(131,185,22)',
                        'rgb(189,133,31)',
                        'rgb(176,98,19)',
                        'rgb(176,80,19)',
                        'rgb(201,37,22)',
                    ],

                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data,
                options: {
                    plugins: {
                        legend: {
                            display: false
                        },


                    },
                    indexAxis: 'y',

                    hover: {
                        animationDuration: 0
                    },

                }
            };
            new Chart(ctx, config);

        </script>
    </div>

    <div class="row my-5" data-aos="fade-right">
        <div class="col-6 text-center rounded-3" data-aos="fade-right">
            <div style="font-size: 50px;" class="bg-ch  rounded-3 text-white ts-black">
                {{round($stats['mean'], 2)}}
            </div>
            <p class="text-secondary">средняя</p>
        </div>
        <div class="col-6 text-center  rounded-3" data-aos="fade-right">
            <div style="font-size: 50px;" class="bg-ch rounded-3 text-white  ts-black">
                {{$stats['mode']}}
            </div>
            <p class="text-secondary">самая популярная</p>

        </div>
    </div>

    <div class="row my-5 py-4" data-aos="fade-right">
        <h3 class="text-secondary text-center">
            Guilty pleasure года <span
                class="badge bg-secondary fs-10p align-top cursor-pointer"
                data-bs-toggle="tooltip" data-bs-placement="right"
                title="Фильм с самой высокой относительно КП оценкой">?</span>
        </h3>
        <div class="row">


{{--            <div class="col-6">--}}

{{--                <p class="mb-0 fw-bold text-center rate-ch ts-white"--}}
{{--                   style="font-size: 100px;">{{$stats['guilty']['user']}}</p>--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <img src="{{asset('images/kp.png')}}" alt="" class="img-fluid rounded-3" style="width: 50px">--}}
{{--                    <p class="text-white mb-0 fs-5 px-3"><span class="rate-ch">{{$stats['guilty']['rating']}}</span></p>--}}
{{--                </div>--}}

{{--            </div>--}}

{{--            <div class="col-6 transform-3d-right perspective-rotate">--}}
{{--                <img src="{{$stats['guilty']['poster']}}" alt="" class="img-fluid rounded-3 border-success"--}}
{{--                     style="border: 4px solid">--}}
{{--            </div>--}}
            <div class="col-12 d-flex justify-content-center perspective-rotate transform-3d-right">
                <div style="
                width: 80%;
                min-height: 400px;
                background-image: url('{{$stats['guilty']['poster']}}');
                background-size: cover;
                border-radius: 7px;
                background-position: center;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-end;
                border: 5px solid;
                " class="border-success "
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true">
                    <div class="big-circle-stat text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Оценка КП" style="/*background: url('{{asset('images/kp.png')}}'); */margin: -12px; border-color: #f09020; background-color: #7a470c">{{$stats['guilty']['rating']}}</div>
                    <div class="big-circle-stat border-success text-success ts-black" data-bs-toggle="tooltip" data-bs-placement="top" title="Твоя оценка" style="margin: -12px; width: 60px; height: 60px; font-size: x-large;">{{$stats['guilty']['user']}}</div>
{{--                    <div class="big-circle-stat border-success text-success">{{$stats['guilty']['dev']}}</div>--}}
                </div>
            </div>
        </div>
        <p class="gold fw-bold fs-5 m-0 text-center mt-5" style="max-height: 60px;
    overflow: hidden;">{{$stats['guilty']['title']}}</p>

    </div>

    <div class="row my-5 py-4" data-aos="fade-right">
        <h3 class="text-secondary text-center">
            Разочарование года <span
                class="badge bg-secondary fs-10p align-top cursor-pointer"
                data-bs-toggle="tooltip" data-bs-placement="right"
                title="Фильм с самой низкой относительно КП оценкой">?</span>
        </h3>
        <div class="col-12 d-flex justify-content-center perspective-rotate transform-3d-left">
            <div style="
                width: 80%;
                min-height: 400px;
                background-image: url('{{$stats['sad']['poster']}}');
                background-size: cover;
                border-radius: 7px;
                background-position: center;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-end;
                border: 5px solid;
                " class="border-danger"
                 data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true">
                <div class="big-circle-stat text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Оценка КП" style="/*background: url('{{asset('images/kp.png')}}'); */margin: -12px; border-color: #f09020; background-color: #7a470c">{{$stats['sad']['rating']}}</div>
                <div class="big-circle-stat border-danger rate-ch ts-black" data-bs-toggle="tooltip" data-bs-placement="top" title="Твоя оценка" style="margin: -12px; width: 60px; height: 60px; font-size: x-large;">{{$stats['sad']['user']}}</div>
                {{--                    <div class="big-circle-stat border-success text-success">{{$stats['guilty']['dev']}}</div>--}}
            </div>
        </div>
    </div>
    <p class="gold fw-bold fs-5 m-0 text-center mt-5" style="max-height: 60px;
    overflow: hidden;">{{$stats['sad']['title']}}</p>

{{--    <p class="gold fw-bold fs-5 m-0 text-center" style="max-height: 60px;--}}
{{--    overflow: hidden;">{{$stats['sad']['title']}}</p>--}}
{{--        <div class="row">--}}
{{--            <div class="col-6">--}}

{{--                <p class="mb-0 fw-bold text-center rate-ch ts-white"--}}
{{--                   style="font-size: 100px;">{{$stats['sad']['user']}}</p>--}}
{{--                <div class="d-flex justify-content-center">--}}
{{--                    <img src="{{asset('images/kp.png')}}" alt="" class="img-fluid rounded-3" style="width: 50px">--}}
{{--                    <p class="text-white mb-0 fs-5 px-3"><span class="rate-ch">{{$stats['sad']['rating']}}</span></p>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="col-6 transform-3d-right perspective-rotate">--}}
{{--                <img src="{{$stats['sad']['poster']}}" alt="" class="img-fluid rounded-3 border-danger"--}}
{{--                     style="border: 4px solid">--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


    <div class="row my-5 py-4" data-aos="fade-right">
        <h3 class="text-secondary text-center">
            Топ актеров <span
                class="badge bg-secondary fs-10p align-top cursor-pointer"
                data-bs-toggle="tooltip" data-bs-placement="right"
                title="По количеству просмотренных фильмов">?</span>
        </h3>
        <div class="row">
            <div class="col-12 d-flex justify-content-center" data-aos="flip-up">
                <div style="
                width: 250px;
                height: 250px;
                background-image: url('{{asset('images/year/'.$stats['actors']['mode'][0]['file'])}}');
                background-size: cover;
                background-position: center;
                border-radius: 50%;
                display: flex;
                flex-direction: row;
                justify-content: flex-end;
                align-items: flex-end;
                border: 5px solid;
                " class="border-success"
                     data-bs-toggle="tooltip" data-bs-placement="top"
                     title="{{$stats['actors']['mode'][0]['name']}}">
                    <div
                        class="big-circle-stat border-success text-success">{{$stats['actors']['mode'][0]['count']}}</div>
                </div>
            </div>
            @for($i = 1; $i < 4; $i++)
                <div class="col-4 mt-3" data-aos="fade-down-right" data-aos-delay="{{200*$i}}">
                    <div style="
                width: 100px;
                height: 100px;
                background-image: url('{{asset('images/year/'.$stats['actors']['mode'][$i]['file'])}}');
                background-size: cover;
                background-position: center;
                border-radius: 50%;
                display: flex;
                flex-direction: row;
                justify-content: flex-end;
                align-items: flex-end;
                border: 2px solid;
                " class="border-white"
                         data-bs-toggle="tooltip" data-bs-placement="top"
                         title="{{$stats['actors']['mode'][$i]['name']}}">
                        <div
                            class="small-circle-stat border-white text-white">{{$stats['actors']['mode'][$i]['count']}}</div>
                    </div>
                </div>
            @endfor

        </div>
    </div>

    <div class="row my-5 py-4" data-aos="fade-right">
        <h3 class="text-secondary text-center">
            Топ режиссеров <span
                class="badge bg-secondary fs-10p align-top cursor-pointer"
                data-bs-toggle="tooltip" data-bs-placement="right"
                title="По количеству просмотренных фильмов">?</span>
        </h3>
        <div class="row">
            <div class="col-12 d-flex justify-content-center" data-aos="flip-up">
                <div style="
                width: 250px;
                height: 250px;
                background-image: url('{{asset('images/year/'.$stats['directors']['mode'][0]['file'])}}');
                background-size: cover;
                background-position: center;
                border-radius: 50%;
                display: flex;
                flex-direction: row;
                justify-content: flex-end;
                align-items: flex-end;
                border: 5px solid;
                " class="border-success"
                     data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                     title="{{$stats['directors']['mode'][0]['name']}}: <br> <ul>
                     @foreach($stats['directors']['mode'][0]['top'] as $film)
                       <li> <a href='https://www.kinopoisk.ru/film/{{$film['kp_id']}}' target='_blank'>{{$film['title']}}</a>  - {{$film['rate']}} </li>
                     @endforeach
                     </ul>">
                    <div
                        class="big-circle-stat border-success text-success">{{$stats['directors']['mode'][0]['count']}}</div>
                </div>
            </div>
            @for($i = 1; $i < 4; $i++)
                <div class="col-4 mt-3" data-aos="fade-down-right" data-aos-delay="{{200*$i}}">
                    <div style="
                width: 100px;
                height: 100px;
                background-image: url('{{asset('images/year/'.$stats['directors']['mode'][$i]['file'])}}');
                background-size: cover;
                background-position: center;
                border-radius: 50%;
                display: flex;
                flex-direction: row;
                justify-content: flex-end;
                align-items: flex-end;
                border: 2px solid;
                " class="border-white"
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                         {{--                    <a href='https://www.kinopoisk.ru/film/{{$film['kp_id']}}' target='_blank'>{{$film['title']}}</a>--}}
                         title="{{$stats['directors']['mode'][$i]['name']}}: <br> <ul>
                     @foreach($stats['directors']['mode'][$i]['top'] as $film)
                       <li> {{$film['title']}}   - {{$film['rate']}} </li>
                     @endforeach
                     </ul>">
                        <div
                            class="small-circle-stat border-white text-white">{{$stats['directors']['mode'][$i]['count']}}</div>
                    </div>
                </div>
            @endfor

        </div>
    </div>

    <div class="row">
        <div class="col-12">
{{--            <h3 class="text-secondary text-center">--}}
{{--                Топ жанров <span--}}
{{--                    class="badge bg-secondary fs-10p align-top cursor-pointer"--}}
{{--                    data-bs-toggle="tooltip" data-bs-placement="right"--}}
{{--                    title="По количеству просмотренных фильмов">?</span>--}}
            </h3>
{{--            @for($i = 0; $i < count($stats['genres']['mode']); $i++)--}}
{{--                <div class="d-flex py-2 justify-content-between text-center text-white fs-1 mx-5" data-aos="fade-right"--}}
{{--                     data-aos-delay="{{200*$i}}">--}}
{{--                    <div>--}}
{{--                        {{$i+1}}.--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        {{$stats['genres']['mode'][$i]['name']}}--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        {{$stats['genres']['mode'][$i]['count']}}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endfor--}}
        </div>
    </div>
    <h3 class="text-secondary text-center">Топ жанров</h3>
    <div class="row text-white">
        <div class="col-12 mx-2">
            <table class="w-100" id="myTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Жанр</th>
                    <th onclick="sortTable(2)">Кол-во</th>
                    <th onclick="sortTable(3)">Средняя</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stats['genre'] as $key => $genre)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$genre['name']}}</td>
                        <td>{{$genre['co']}}</td>
                        <td class="rate-ch">{{$genre['avg']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
        <div class="row py-4">
            <h3 class="text-secondary text-center">Другие результаты</h3>

            @foreach($users as $id => $user)
                @if($user == $name)
                    @continue
                @endif
                <div class="col-4 my-3">
                    <a href="{{route('year', $id)}}" class="btn btn-outline-warning w-100">{{$user}}</a>
                </div>
            @endforeach
        </div>
</div>





<script src="https://imdibil.ru/js/core.min.js"></script>

<link rel="stylesheet" href="https://imdibil.ru/js/vendor_bundle.min.js">
<link rel="stylesheet" href="https://imdibil.ru/js/vendor.aos.js">
<script>
    const RateCl = document.querySelectorAll('.rate-ch');
    RateCl.forEach(element => {
        console.log(element.textContent);
        rateCheck(element);
    });


    $.each($('.bg-ch'), function (key, el) {
        console.log(parseFloat(el.textContent))
        $(el).removeClass('text-black')
        if (parseFloat(el.textContent) >= 7.0) {
            el.classList.add("bg-success");
        } else if (parseFloat(el.textContent) >= 5.0) {
            el.classList.add("bg-secondary");
            el.classList.add("text-black");

        } else el.classList.add("bg-danger");

    })

    // Access the first element in the NodeList
    RateCl[0];

    function rateCheck(el) {
        // console.log(parseFloat(el.textContent))
        if (parseFloat(el.textContent) >= 7.0) {
            el.classList.add("green-zone");
        } else if (parseFloat(el.textContent) >= 5.0) {
            el.classList.add("grey-zone");
        } else el.classList.add("red-zone");
    }

    // $('.perspective-rotate').on('click', function (){
    //     let i = 0
    //     let timer = setInterval(function() {
    //         if (i === 360) clearInterval(timer);
    //         else {
    //             let perspective = $(this).css('perspective-origin');
    //             // $(this).css('perspective-origin', perspective+10)
    //             // i+=10;
    //             console.log(perspective)
    //         }
    //     }, 2000); // и
    // });
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("myTable");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Сделайте цикл, который будет продолжаться до тех пор, пока
        никакого переключения не было сделано: */
        while (switching) {
            // Начните с того, что скажите: переключение не выполняется:
            switching = false;
            rows = table.rows;
            /* Цикл через все строки таблицы (за исключением
            во-первых, который содержит заголовки таблиц): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Начните с того, что не должно быть никакого переключения:
                shouldSwitch = false;
                /* Получите два элемента, которые вы хотите сравнить,
                один из текущей строки и один из следующей: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Проверьте, должны ли две строки поменяться местами,
                основанный на направлении, asc или desc: */
                if (dir == "asc") {
                    if (parseFloat(x.innerHTML.toLowerCase()) > parseFloat(y.innerHTML.toLowerCase())) {
                        // Если это так, отметьте как переключатель и разорвать цикл:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (parseFloat(x.innerHTML.toLowerCase()) < parseFloat(y.innerHTML.toLowerCase())) {
                        // Если это так, отметьте как переключатель и разорвать цикл:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* Если переключатель был отмечен, сделайте переключатель
                и отметьте, что переключатель был сделан: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Каждый раз, когда выполняется переключение, увеличьте это число на 1:
                switchcount ++;
            } else {
                /* Если переключение не было сделано и направление "asc",
                установите направление на "desc" и снова запустите цикл while. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
</body>
</html>

