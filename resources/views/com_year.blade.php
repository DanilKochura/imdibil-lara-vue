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
    <script src="https://imdibil.ru/js/core.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body.new-year {
            background-color: #18370f !important;
        }

        body {
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

    </div>

    <div class="banner-text">

        <div class="year-text">
            2024
        </div>
        <div class="d-flex justify-content-center">
            <hr id="main-hr">

        </div>
        <div class="key-event-preview">IMDIBIL</div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 text-center fw-bold" data-aos="fade-up">
            <div class="d-flex align-items-center flex-column">
                <div class="align-items-center d-flex header-famous justify-content-center">
                    <div>
                            <span data-toggle="count"
                                  data-count-from="0"
                                  data-count-to="{{$meetings->count()}}"
                                  data-count-duration="2000"
                                  data-count-decimals="0">0</span>

                    </div>
                </div>

                <div class="text-secondary mt-3">
                    заседаний мы провели за год
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @php $i = 0; @endphp
        @foreach($top as $key => $meet)
            @if($i++ == 0)
                <div class="col-12 d-flex justify-content-center my-5"data-aos="flip-up">
                    <div style="
                width: 80%;
                min-height: 400px;
                background-image: url('{{asset('images/posters/'.$meet->movie->poster)}}');
                background-size: cover;
                border-radius: 7px;
                background-position: center;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-end;
                border: 5px solid gold;
                " class=" "
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true">
                        <div class="big-circle-stat text-white"  style="margin: -12px; border-color: gold;color: gold;     align-self: flex-start;">#{{$i}}</div>
                        <div class="big-circle-stat" style="margin: -12px; border-color: gold; color: gold">{{$meet->movie->our_rate}}</div>
                    </div>
                </div>
            @elseif($i == 2 or $i == 3)
                <div class="col-6  my-5" data-aos="flip-up">
                    <div style="
                width: 80%;
                min-height: 200px;
                background-image: url('{{asset('images/posters/'.$meet->movie->poster)}}');
                background-size: cover;
                border-radius: 7px;
                background-position: center;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-end;
                border: 5px solid  {{$i == 2 ? 'silver' : '#cb7f19'}};
                " class=" "
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true">
                        <div class="big-circle-stat text-white"  style="margin: -12px; border-color: {{$i == 2 ? 'silver' : '#cb7f19'}};color: {{$i == 2 ? 'silver' : '#cb7f19'}};     align-self: flex-start;">#{{$i}}</div>

                        {{--                <div class="big-circle-stat text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Оценка КП" style="/*background: url('{{asset('images/kp.png')}}'); */margin: -12px; border-color: #f09020; background-color: #7a470c">{{$stats['guilty']['rating']}}</div>--}}
                        <div class="big-circle-stat" style="margin: -12px; border-color: {{$i == 2 ? 'silver' : '#cb7f19'}}; color: {{$i == 2 ? 'silver' : '#cb7f19'}}">{{$meet->movie->our_rate}}</div>
                    </div>
                </div>
            @else
                <div class="col-4  my-3"data-aos="flip-up">
                    <div style="
                min-height: 150px;

                background-image: url('{{asset('images/posters/'.$meet->movie->poster)}}');
                background-size: cover;
                border-radius: 7px;
                background-position: center;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-end;
                border: 5px solid;
                " class=" border-success"
                         data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true">
                        <div class="big-circle-stat text-white border-success"  style="margin: -12px;   align-self: flex-start;">#{{$i}}</div>

                        {{--                <div class="big-circle-stat text-white"  data-bs-toggle="tooltip" data-bs-placement="top" title="Оценка КП" style="/*background: url('{{asset('images/kp.png')}}'); */margin: -12px; border-color: #f09020; background-color: #7a470c">{{$stats['guilty']['rating']}}</div>--}}
                        <div class="big-circle-stat border-success text-success" style="margin: -12px;">{{$meet->movie->our_rate}}</div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        <canvas id="densityChartAvg" width="600" height="400" style="width: 600px; height: 600px"></canvas>
        <script>
            const ctx = document.getElementById('densityChartAvg');
            const labels = ["{!!  implode('","',array_keys($meets))!!}"]
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Количество участников',
                    data: ["{!!  implode('","',array_values($meets))!!}"],
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

                }
            };
            let chart = new Chart(ctx, config);



        </script>
    </div>


    <div class="row mt-5">
        <h4 class="text-secondary text-center">Средние оценки и количество встреч</h4>
        @foreach($avg as $id => $meets)
            <div class="col-3 my-4 d-flex justify-content-center flex-column align-items-center">
                <img src="{{asset('images/uploads/'.\App\Models\User::find($id)->avatar)}}" alt="" class="img-fluid avatar">
                <p class="text-center text-white"><span class="rate-ch">{{round($meets, 1)}}</span> <span   >({{$count[$id]}})</span></p>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <canvas id="ChartChart" width="600" height="400" style="width: 600px; height: 600px"></canvas>
        <script>
            let context2 = document.getElementById('Chart');

            const ctx31 = document.getElementById('ChartChart');

            new Chart(ctx31, {
                type: 'line',
                data: {
                    labels: ["{!!  implode('","',array_keys($dates))!!}"],
                    datasets: [{
                        label: 'Количество заседаний',
                        data: ["{!!  implode('","',array_values($dates))!!}"],
                        borderWidth: 4,
                        borderColor: 'gold',
                        cubicInterpolationMode: 'monotone',
                        tension: 0.4
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        </script>
    </div>


    <div class="row justify-content-center my-5">
        <a href="{{'year'}}" class="btn btn-outline-warning w-50">Моя статистика</a>
    </div>

{{--    <div class="row mt-5">--}}
{{--        <canvas id="densityChart" width="600" height="400" style="width: 600px; height: 600px"></canvas>--}}
{{--        <script>--}}

{{--            const ctx = document.getElementById('densityChart');--}}
{{--            const labels = ["{!!  implode('","',array_keys($dates))!!}"]--}}
{{--            const data = {--}}
{{--                labels: labels,--}}
{{--                datasets: [{--}}
{{--                    label: 'Количество заседаний по месяцам',--}}
{{--                    data: [{{implode(',', array_values($dates))}}],--}}
{{--                    fill: false,--}}
{{--                    cubicInterpolationMode: 'monotone',--}}
{{--                    tension: 0.4,--}}
{{--                    borderColor: 'gold',--}}

{{--                    borderWidth: 1--}}
{{--                }]--}}
{{--            };--}}

{{--            const config = {--}}
{{--                type: 'line',--}}
{{--                data,--}}
{{--                options: {--}}
{{--                    plugins: {--}}
{{--                        legend: {--}}
{{--                            display: false--}}
{{--                        },--}}


{{--                    },--}}

{{--                    hover: {--}}
{{--                        animationDuration: 0--}}
{{--                    },--}}

{{--                }--}}
{{--            };--}}
{{--            new Chart(ctx, config);--}}

{{--        </script>--}}
{{--    </div>--}}


</div>



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

</script>

<link rel="stylesheet" href="https://imdibil.ru/js/vendor_bundle.min.js">
<link rel="stylesheet" href="https://imdibil.ru/js/vendor.aos.js">
</body>
</html>

