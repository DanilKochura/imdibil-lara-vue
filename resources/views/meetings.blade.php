@extends('app')

@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="История заседаний киноклуба IMDibil."/>
    <title>Главная</title>
    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">
    <meta property="og:title" content="Хронология заседаний">

@endsection

@section('content')

    <!-- Fullscreen Banner -->
    <div class="fullscreen-banner">
        <img src="https://imdibil.ru/images/back.webp" alt="Banner Image" class="banner-image">
        <img src="https://imdibil.ru/images/back.webp" alt="Banner Image" class="banner-image">
        <div class="banner-content">
            <img src="https://imdibil.ru/images/logogo.png" alt="IMDibil Logo" class="logo">
            <h1>Добро пожаловать на IMDIbil</h1>
            <a href="#cards-section" class="banner-button">Explore More</a>
        </div>
    </div>

    <!-- Cards Section -->
    <div class="container content" id="cards-section">
        <div class="container-fluid mt-2">
            <div class="flickity-preloader flickity-white flickity-dot-line"
                 data-flickity='{ "autoPlay": false, "cellAlign": "left", "pageDots": false, "prevNextButtons": false, "contain": true, "rightToLeft": false }'>
                @foreach($meetings as $meeting)
                    <div class="col-12 col-md-2 px-1 rounded-10">
                        <div class="movie-card">
                            <img src="https://imdibil.ru/images/posters/{{$meeting->movie->poster}}" alt="Movie Poster"
                                 class="movie-poster">
                            <a href="#meeting-{{$meeting->id}}" class="more-details-button">подробнее</a>
                            <div class="movie-info">
                                <p class="h4">{{$meeting->movie->name_m}}</p>
                                <p>{{\Carbon\Carbon::parse($meeting->date_at)->translatedFormat('d F Y')}}</p>
                                <div class="star-rating text-center w-100" data-bs-toggle="tooltip" data-bs-placement="right"
                                     title="Оценка фильма: {{$meeting->movie->our_rate}}" data-rating="{{$meeting->movie->our_rate}}"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Meeting Blocks -->
    @foreach($meetings as $meeting)
        <div class="row m-0" id="meeting-{{$meeting->id}}" style="justify-content: center">
            <div class="three"><h1>Заседание #{{$meeting->id}}</h1></div>
        </div>
        <div class="container rounded forum-card my-4">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-md-2 poster"><a href="{{$meeting->movie->url}}" target="_blank"><img
                            src="{{asset('/images/posters/'.$meeting->movie->poster)}}" class="img-fluid rounded"
                            id="IM"/></a></div>
                <div class="col-md-4 text-left description">
                    <p class="name">{{$meeting->movie->name_m}}</p>
                    <div class="original">{{$meeting->movie->original}} <span
                            class="text-secondary fs-6">#{{$meeting->movie->position}}</span></div>
                    <div class="year">Год: {{$meeting->movie->year_of_cr}}</div>
                    <div class="director">Режиссер: {{ $meeting->movie->director()->first()->name_d }} </div>
                    <div class="time">Длительность: {{$meeting->movie->duration}} мин.</div>
                    <div class="rates">
                        <table class="table-rate text-center mx-0 mt-3">
                            <thead>
                            <tr>
                                <th class="bg-main" scope="col"><img src="{{ asset('images/imdb.png') }}"
                                                                     class="res_logo"></th>
                                <th class="bg-main" scope="col"><img src="{{ asset('images/kp.png') }}"
                                                                     class="res_logo"></th>
                                <th class="bg-main" scope="col"><img src="{{ asset('images/logogo.png') }}"
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
                <div
                    class="rating-tab col-md-4 col-xl-4 px-2 col-12 px-md-0 justify-content-center row row-cols-{{count($meeting->rates) > 8 ? '5' : 4}}">
                    @foreach($meeting->rates as $rate)
                        @if($rate->user == null)
                            {{dd($rate)}}
                        @endif
                        <div class="col d-flex flex-column border-bottom-sm mt-4 mt-0-md">
                            <a href="profile/{{ $rate->user->id  }}" class="mx-auto my-2">
                                <img src="https://imdibil.ru/images/uploads/{{$rate->user->avatar}}"
                                     alt="{{$rate->user->name}}" class="avatar">
                            </a>
                            <div class="rate-ch text-center w-1">{{ $rate->rate  }}</div>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">
                {{ $meetings->withQueryString()->links() }}
            </div>
        </div>
    </div>

@endsection
