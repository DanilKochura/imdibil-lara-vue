@extends('app')

@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="История заседаний киноклуба IMDibil."/>
    <title>Главная</title>
    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">
    <meta property="og:title" content="Хронология заседаний">

@endsection

@section('content')
    @if(\App\UseCases\ThemeTrait::isNewYear())
       @include('components/ny-containers')
    @endif



    <style>
        body {
            background-color: rgb(46, 46, 46);
        }
    </style>
    @php
        $movie = $meetings[0];
    @endphp
    {{--            <div class="container-fluid m-0 p-0">--}}
    {{--                <div style="position:relative;">--}}
    {{--                    <div style="position: absolute;bottom: -40px;left: -20px;width: 120%;display: flex;align-items: center;">--}}
    {{--                        <svg style="width: 5em" width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
    {{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M60 120C93.1371 120 120 93.1371 120 60C120 26.8629 93.1371 0 60 0C26.8629 0 0 26.8629 0 60C0 93.1371 26.8629 120 60 120ZM60.0001 106C85.4051 106 106 85.4051 106 60.0001C106 34.5949 85.4051 14 60.0001 14C34.5949 14 14 34.5949 14 60.0001C14 85.4051 34.5949 106 60.0001 106ZM60.5582 44.9455C67.9486 44.9455 73.94 38.9543 73.94 31.5636C73.94 24.1731 67.9486 18.1818 60.5582 18.1818C53.1676 18.1818 47.1763 24.1731 47.1763 31.5636C47.1763 38.9543 53.1676 44.9455 60.5582 44.9455ZM56.6545 84.2545C56.6545 91.6451 50.6633 97.6363 43.2727 97.6363C35.8821 97.6363 29.8908 91.6451 29.8908 84.2545C29.8908 76.8639 35.8821 70.8727 43.2727 70.8727C50.6633 70.8727 56.6545 76.8639 56.6545 84.2545ZM60.5578 69.2001C65.3309 69.2001 69.2003 65.3307 69.2003 60.5576C69.2003 55.7845 65.3309 51.9152 60.5578 51.9152C55.7847 51.9152 51.9154 55.7845 51.9154 60.5576C51.9154 65.3307 55.7847 69.2001 60.5578 69.2001ZM101.54 51.6364C101.54 59.027 95.5487 65.0182 88.1581 65.0182C80.7675 65.0182 74.7763 59.027 74.7763 51.6364C74.7763 44.2458 80.7675 38.2546 88.1581 38.2546C95.5487 38.2546 101.54 44.2458 101.54 51.6364ZM77.5638 97.6363C84.9543 97.6363 90.9456 91.6451 90.9456 84.2545C90.9456 76.8639 84.9543 70.8727 77.5638 70.8727C70.1732 70.8727 64.1819 76.8639 64.1819 84.2545C64.1819 91.6451 70.1732 97.6363 77.5638 97.6363ZM46.0607 51.6364C46.0607 59.027 40.0695 65.0182 32.6789 65.0182C25.2884 65.0182 19.2972 59.027 19.2972 51.6364C19.2972 44.2458 25.2884 38.2546 32.6789 38.2546C40.0695 38.2546 46.0607 44.2458 46.0607 51.6364Z" fill="#FFBF00"/>--}}
    {{--                        </svg>--}}
    {{--                    </div>--}}
    {{--                    <img src="{{asset('/images/posters/'.$meetings[0]->movie->poster_horizontal)}}" alt="" class="img-fluid">--}}

    {{--                </div>--}}

    {{--                <p class="text-white fs-10p px-2 mt-5">{{$meetings[0]->movie->description}}</p>--}}
    {{--            </div>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="image-first-poster border-gold-1 d-none d-sm-block bg-zoom-hover"
                     style="background-image: url('{{asset('/images/posters/'.$movie->movie->poster_horizontal)}}')"></div>
                <img class="img-fluid d-block d-sm-none  border rounded-3   br-20px"
                     style="border-color: gold !important;"
                     src="{{asset('/images/posters/'.$movie->movie->poster_horizontal)}}">
            </div>
            <div class="col-md-5 text-white">
                <div class="d-flex justify-content-between">
                    <h2 class="text-white">{{$movie->movie->name_m}} <span class="text-secondary fs-6">
                        {{$movie->movie->original}}
                            </span></h2>
                    <div class="fs-2">#{{$movie->id}}</div>
                </div>
                <svg width="722" style="width: 100%" height="12" viewBox="0 0 722 12" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 5.29003C1 5.29003 67.5 -1.70997 106.5 5.29003C145.5 12.29 166 -7.20975 360.5 5.29003C555 17.7898 461.5 5.29003 574.5 5.29003C687.5 5.29003 722 5.29003 722 5.29003"
                        stroke="#FFC107" stroke-width="2"/>
                </svg>
                <div class="d-flex justify-content-between my-2">
                    <div class="rounded-3 br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="year">{{$movie->movie->year_of_cr}}</div>
                        <div class="fs-10p text-secondary">год выхода</div>
                    </div>
                    <div class="rounded-3  br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="time">{{$movie->movie->duration}} мин.</div>
                        <div class="fs-10p text-secondary">продолжительность</div>
                    </div>
                    <div class="rounded-3  br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="director">{{ $movie->movie->director()->first()->name_d }} </div>
                        <div class="fs-10p text-secondary">режиссер</div>
                    </div>
                </div>
                <p class="fs-10p">{{$movie->movie->description}}</p>
                <div class="d-flex d-sm-block justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div class="rate-ch me-2" style="font-size: 2rem">
                            {{$movie->movie->our_rate}}
                        </div>
                        <div>
                            <div class="star-rating-big d-sm-flex d-none text-center w-100"
                                 data-rating="{{$movie->movie->our_rate}}"></div>
                            <div class="star-rating d-flex d-sm-none text-center w-100"
                                 data-rating="{{$movie->movie->our_rate}}"></div>
                        </div>
                    </div>
                    <div class="d-flex text-secondary gap-3">
                        <div>
                            IMDB: {{$movie->movie->rating}}
                        </div>
                        <div>
                            КП: {{$movie->movie->rating_kp}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
                <div class="row">
                    @foreach($movie->rates as $rate)
                        @if($rate->user == null)
                            {{dd($rate)}}
                        @endif
                        <div class="d-block d-sm-flex col-md-6 col-2 align-items-center mt-3 mt-0-md">
                            <a href="profile/{{ $rate->user->id  }}" class="mx-auto my-2">
                                @if($rate->user->avatar)
                                    <img src="https://imdibil.ru/images/uploads/{{$rate->user->avatar}}"
                                         alt="{{$rate->user->name}}" class="avatar">
                                @else
                                    <img src="https://imdibil.ru/images/uploads/default.jpg"
                                         alt="{{$rate->user->name}}" class="avatar">
                                @endif
                            </a>
                            <div
                                class="rate-ch text-center w-1 {{$movie->author == $rate->user->id ? 'text-gold' : ''}}">{{ $rate->rate  }}</div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <hr class="text-white">
        <h2 class="text-white">Предыдущие заседания</h2>
        <div class="row">

        </div>
        @foreach($meetings as $meeting)
            <div class="row rounded forum-card my-4 justify-content-center justify-content-md-start movie-card">
                <div class="col-md-2 col-6 poster"><a href="{{route('meeting', $meeting)}}" target="_blank"><img
                            src="{{asset('/images/posters/'.$meeting->movie->poster)}}" class="img-fluid rounded"
                            id="IM"/></a></div>
                <div class="col-md-3 col-6 text-start text-small-sm text-left description">
                    <p class="name ">{{$meeting->movie->name_m}}</p>
                    <div class="original">{{$meeting->movie->original}} </div>
                    <div class="year">Год: {{$meeting->movie->year_of_cr}}</div>
                    <div class="director">Режиссер: {{ $meeting->movie->director()->first()->name_d }} </div>
                    <div class="time">Длительность: {{$meeting->movie->duration}} мин.</div>
                    <div class="genres">Жанры: {{$meeting->movie->genres->pluck('name_g')->implode(', ')}}</div>
                    <div class=" d-block d-sm-none"> Дата:
                        <span> {{ \Illuminate\Support\Carbon::parse($meeting->date_at)->locale("ru")->translatedFormat("d F Y") }} </span>
                    </div>
                    <div class="d-none d-md-block">
                        <div class="rates">
                            <table class="table-rate text-center mx-0 mt-3">
                                <thead>
                                <tr>
                                    <th class="" scope="col"><img src="{{ asset('images/imdb.png') }}"
                                                                  class="res_logo"></th>
                                    <th class="" scope="col"><a href="{{$meeting->movie->url}}" target="_blank"><img src="{{ asset('images/kp.png') }}"
                                                                                                     class="res_logo"></a> </th>
                                    <th class="" scope="col"><img src="{{ asset('images/logogo.png') }}"
                                                                  class="res_logo"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="rate-ch">{{$meeting->movie->rating}}</td>
                                    <td class="rate-ch">{{$meeting->movie->rating_kp}}</td>
                                    <td class="rate-ch">{{$meeting->movie->our_rate}} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-secondary pt-0 pt-md-2"> Дата:
                            <span> {{ \Illuminate\Support\Carbon::parse($meeting->date_at)->locale("ru")->translatedFormat("d F Y") }} </span>
                        </div>
                    </div>
                </div>
                <div class=" col-12 d-block d-md-none">
                    <div class="rates">
                        <table class="table-rate text-center mx-0 mt-3">
                            <thead>
                            <tr>
                                <th class="" scope="col"><img src="{{ asset('images/imdb.png') }}"
                                                              class="res_logo"></th>
                                <th class="" scope="col"><img src="{{ asset('images/kp.png') }}"
                                                              class="res_logo"></th>
                                <th class="" scope="col"><img src="{{ asset('images/logogo.png') }}"
                                                              class="res_logo"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="rate-ch">{{$meeting->movie->rating}}</td>
                                <td class="rate-ch">{{$meeting->movie->rating_kp}}</td>
                                <td class="rate-ch">{{$meeting->movie->our_rate}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div
                    class="rating-tab col-md-4 col-xl-4 px-2 col-12 px-md-0 justify-content-center row row-cols-{{count($meeting->rates) > 8 ? '5' : 4}}">
                    @foreach($meeting->rates as $rate)
                        @if($rate->user == null)
                            {{dd($rate)}}
                        @endif
                        <div class="col d-flex flex-column mt-4 mt-0-md">
                            <a href="profile/{{ $rate->user->id  }}" class="mx-auto my-2">
                                @if($rate->user->avatar)
                                    <img src="https://imdibil.ru/images/uploads/{{$rate->user->avatar}}"
                                         alt="{{$rate->user->name}}" class="avatar">
                                @else
                                    <img src="https://imdibil.ru/images/uploads/default.jpg"
                                         alt="{{$rate->user->name}}" class="avatar">
                                @endif
                            </a>
                            <div class="rate-ch text-center w-1">{{ $rate->rate  }}</div>
                        </div>

                    @endforeach
                </div>
                <div class="col-3 d-none d-md-block">
                    @if($meeting->movie->citates->count() > 0)
                        <p class="text-center">Цитаты</p>
                        <div class="swiper-container  swiper-btn-group swiper-btn-group-end text-white"
                             data-swiper='{
                            "slidesPerView": 1,
                            "spaceBetween": 0,
                            "autoplay": false,
                            "loop": true,
                            "pagination": { "type": "bullets" }
                        }'>

                            <div class="swiper-wrapper" style="">

                                @foreach($meeting->movie->citates as $cit)
                                    @if($cit->auth_only == 1 and \Illuminate\Support\Facades\Auth::user()?->role != 2) @continue($loop) @endif
                                    <div class="swiper-slide h-100 d-middle">
                                        <figure>
                                            <blockquote class="blockquote">
                                                <p>{{ $cit->text }}</p>
                                            </blockquote>
                                            @if($cit->author)
                                                <figcaption class="blockquote-footer text-end">
                                                    {{$cit->author}}
                                                </figcaption>
                                            @endif
                                        </figure>
                                    </div>


                                @endforeach



                            </div>

                            <div class="swiper-pagination"></div>

                        </div>
                    @endif

                </div>
            </div>

        @endforeach

    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">
                {{ $meetings->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <style>

        .text-gold {
            color: var(--gold);
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.4) 100%),
            url('{{asset('/images/posters/'.$meetings[0]->movie->poster_horizontal)}}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 6rem 0;
            position: relative;
            clip-path: polygon(0 0, 100% 0, 100% 90%, 0 100%);
            margin-bottom: -50px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            backdrop-filter: blur(2px);
        }

        .movie-poster {
            border-radius: 10px;
            box-shadow: 0 25px 50px -12px rgba(255, 215, 0, 0.25);
            transition: all 0.3s ease;
            border: 2px solid rgba(255, 215, 0, 0.3);
        }

        .movie-poster:hover {
            transform: scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(255, 215, 0, 0.4);
        }

        .gold-divider {
            position: relative;
            height: 3px;
            background: linear-gradient(90deg, transparent 0%, #FFD700 50%, transparent 100%);
            margin: 1.5rem 0;
            opacity: 0.7;
        }

        /* Movie Cards */
        .movie-card {
            background: linear-gradient(145deg, #222 0%, #1a1a1a 100%);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            overflow: hidden;
            border: 1px solid rgba(255, 215, 0, 0.1);
            position: relative;
            animation: fadeIn 0.6s ease forwards;
            opacity: 0;
        }

        .movie-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FFD700, #FFA500);
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(255, 215, 0, 0.1);
            border-color: rgba(255, 215, 0, 0.3);
        }

        .movie-poster-small {
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .movie-poster-small:hover {
            transform: scale(1.03);
        }

        /* Buttons */
        .btn-gold {
            background: linear-gradient(135deg, var(--gold) 0%, var(--gold-dark) 100%);
            color: #1a1a1a;
            font-weight: bold;
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
        }

        .btn-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 215, 0, 0.4);
            color: #1a1a1a;
        }

        /* Ratings */
        .rating-badge {
            background: rgba(255, 215, 0, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            border-radius: 8px;
            padding: 0.3rem 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .rating-badge img {
            filter: brightness(0) saturate(100%) invert(84%) sepia(55%) saturate(546%) hue-rotate(358deg) brightness(102%) contrast(102%);
        }

        /* Section Titles */
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--gold), transparent);
        }

        /* Star Rating */
        .star-rating-big {
            display: inline-flex;
            align-items: center;
        }

        .star-rating-big .star {
            color: var(--gold);
            font-size: 1.5rem;
            margin-right: 2px;
        }

        /* Genre Badges */
        .genre-badge {
            display: inline-block;
            background: rgba(255,215,0,0.1);
            border: 1px solid rgba(255,215,0,0.2);
            border-radius: 15px;
            padding: 0.2rem 0.8rem;
            margin: 0.2rem;
            transition: all 0.3s ease;
        }

        .genre-badge:hover {
            background: rgba(255,215,0,0.2);
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animation delays for cards */
        .movie-card:nth-child(1) { animation-delay: 0.1s; }
        .movie-card:nth-child(2) { animation-delay: 0.2s; }
        .movie-card:nth-child(3) { animation-delay: 0.3s; }
        .movie-card:nth-child(4) { animation-delay: 0.4s; }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
                background-attachment: scroll;
                clip-path: polygon(0 0, 100% 0, 100% 95%, 0 100%);
                margin-bottom: -30px;
            }

            .movie-poster {
                margin-bottom: 1.5rem;
            }
        }
    </style>
@endsection
