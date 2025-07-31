@extends('app')

@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="История заседаний киноклуба IMDibil. {{$meeting->movie->name_m}}"/>
    <title>Заседание #{{$meeting->id}} - {{$meeting->movie->name_m}}</title>
    <meta property="og:site_name" content="IMDibil - {{$meeting->movie->name_m}}">
    <meta property="og:title" content="Хронология заседаний - {{$meeting->movie->name_m}}">

@endsection

@section('content')

    <style>
        body {
            background-color: rgb(46, 46, 46);
        }

    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="image-first-poster border-gold-1 d-none d-sm-block bg-zoom-hover"
                     style="background-image: url('{{asset('/images/posters/'.($meeting->movie->poster_horizontal ?? $meeting->movie->poster))}}')"></div>
                <img class="img-fluid d-block d-sm-none  border rounded-3   br-20px"
                     style="border-color: gold !important;"
                     src="{{asset('/images/posters/'.($meeting->movie->poster_horizontal ?? $meeting->movie->poster))}}">
            </div>
            <div class="col-md-5 text-white">
                <div class="d-flex justify-content-between">
                    <h2 class="text-white">{{$meeting->movie->name_m}} <span class="text-secondary fs-6">
                        {{$meeting->movie->original}}
                            </span></h2>
                    <div class="fs-2">#{{$meeting->id}}</div>
                </div>
                <svg width="722" style="width: 100%" height="12" viewBox="0 0 722 12" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 5.29003C1 5.29003 67.5 -1.70997 106.5 5.29003C145.5 12.29 166 -7.20975 360.5 5.29003C555 17.7898 461.5 5.29003 574.5 5.29003C687.5 5.29003 722 5.29003 722 5.29003"
                        stroke="#FFC107" stroke-width="2"/>
                </svg>
                <div class="d-flex justify-content-between my-2">
                    <div class="rounded-3 br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="year">{{$meeting->movie->year_of_cr}}</div>
                        <div class="fs-10p text-secondary">год выхода</div>
                    </div>
                    <div class="rounded-3  br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="time">{{$meeting->movie->duration}} мин.</div>
                        <div class="fs-10p text-secondary">продолжительность</div>
                    </div>
                    <div class="rounded-3  br-20px movie-info-pill border" style="border-color: gold !important;">
                        <div class="director">{{ $meeting->movie->director()->first()->name_d }} </div>
                        <div class="fs-10p text-secondary">режиссер</div>
                    </div>
                </div>
                <p class="fs-10p">{{$meeting->movie->description}}</p>
                <div class="d-flex d-sm-block justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div class="rate-ch me-2" style="font-size: 2rem">
                            {{$meeting->movie->our_rate}}
                        </div>
                        <div>
                            <div class="star-rating-big d-sm-flex d-none text-center w-100"
                                 data-rating="{{$meeting->movie->our_rate}}"></div>
                            <div class="star-rating d-flex d-sm-none text-center w-100"
                                 data-rating="{{$meeting->movie->our_rate}}"></div>
                        </div>
                    </div>
                    <div class="d-flex text-secondary gap-3">
                        <div>
                            IMDB: {{$meeting->movie->rating}}
                        </div>
                        <div>
                            КП: {{$meeting->movie->rating_kp}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2">
                <div class="row">
                    @foreach($meeting->rates as $rate)

                        <div class="d-block d-sm-flex col-md-6 col-2 align-items-center mt-3 mt-0-md">
                            <a href="profile/{{ $rate->user->id  }}" class="mx-auto my-2">
                                <img src="https://imdibil.ru/images/uploads/{{$rate->user->avatar}}"
                                     alt="{{$rate->user->name}}" class="avatar">
                            </a>
                            <div
                                class="rate-ch text-center w-1 {{$meeting->author == $rate->user->id ? 'text-gold' : ''}}">{{ $rate->rate  }}</div>
                        </div>

                    @endforeach
                </div>
            </div>
            @if($meeting->movie->citates->count() > 0)
                <div class="col-12 text-white mt-4">
                    <h3>Цитаты</h3>
                    <div class="row">
                        @foreach($meeting->movie->citates as $cit)
                            @if($cit->auth_only == 1 and \Illuminate\Support\Facades\Auth::user()?->role != 2) @continue($loop) @endif

                            <div class="col-md-4">
                                <div class="m-1 p-2 border rounded border-secondary">
                                    <figure>
                                        <blockquote class="blockquote fst-italic">
                                            <p>{{$cit->text}}</p>
                                        </blockquote>
                                        @if($cit->author)
                                            <figcaption class="blockquote-footer text-end">
                                                {{$cit->author}}
                                            </figcaption>
                                        @endif
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>
    <div class="container">
        <hr class="text-white">
        <h2 class="text-white">Предыдущие заседания</h2>
        <div class="row">
            @foreach($meetings as $meeting)
                <div class="col-6 col-md-2 px-1 rounded-10 moview-card mt-3">
                    <div class="card-inner">
                        <div class="card-front">
                            <img data-src="https://imdibil.ru/images/posters/{{$meeting->movie->poster}}" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" alt="Meeting Poster 1" class="lazy movie-poster">
                        </div>
                        <div class="card-back">
                            <p class="h4">{{$meeting->movie->name_m}}</p>
                            <p>{{\Carbon\Carbon::parse($meeting->date_at)->translatedFormat('d F Y')}}</p>
                            <div class="star-rating text-center w-100" data-bs-toggle="tooltip" data-bs-placement="right"
                                 title="Оценка фильма: {{$meeting->movie->our_rate}}" data-rating="{{$meeting->movie->our_rate}}"></div>
                            <a class="btn btn-outline-warning btn-sm mt-3 rounded-pill" href="{{route('meeting', $meeting)}}">Подробнее</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>


@endsection
