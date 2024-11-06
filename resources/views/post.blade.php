@extends('app')

@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="{{$post->title}}"/>
    <title>{{$post->title}}</title>
    <meta property="og:site_name" content="IMDibil - {{$post->title}}">
    <meta property="og:title" content="{{$post->title}}">

@endsection

@section('content')
    <style>
        body {
            background-color: rgb(46, 46, 46);
        }
    </style>
    <div class="container text-white">


        <h1 class="text-center">{{$post->title}}</h1>

        <svg style="width: 100%"  viewBox="0 0 722 12" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1 5.29003C1 5.29003 67.5 -1.70997 106.5 5.29003C145.5 12.29 166 -7.20975 360.5 5.29003C555 17.7898 461.5 5.29003 574.5 5.29003C687.5 5.29003 722 5.29003 722 5.29003"
                stroke="#FFC107" stroke-width="1"/>
        </svg>
        <div class=" justify-content-between align-items-center d-flex d-md-none">
            <div class="d-flex">
                <div>
                    <img src="https://imdibil.ru/images/uploads/{{$post->user->avatar}}" class="img-fluid rounded-3 avatar">
                </div>
                <div class="ms-2">
                    <p class="h5 mb-0 text-secondary">{{$post->user->name}}</p>
                    <p class="text-secondary fst-italic">{{\Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</p>
                </div>
            </div>
            <i class="fi fi-send h3 text-secondary copy cursor-pointer" id="copy"></i>

        </div>
        <div class="row mt-2">

            <div class="col-md-2">
               <div class="row">
                   <div class="col-3 col-md-12">
                       <img src="https://imdibil.ru/images/posters/{{$post->movie->poster}}" class="img-fluid rounded-3">
                   </div>
                   <div class="text-secondary fs-12p col-9 col-md-12">
                       <p class="name ">{{$post->movie->name_m}}</p>
                       <div class="original">{{$post->movie->original}} </div>
                       <div class="year">Год: {{$post->movie->year_of_cr}}</div>
                       <div class="director">Режиссер: {{ $post->movie->director()->first()->name_d }} </div>
                       <div class="time">Длительность: {{$post->movie->duration}} мин.</div>
                       <div class="genres">Жанры: {{$post->movie->genres->pluck('name_g')->implode(', ')}}</div>
                       <div class="d-none d-md-block">
                           <div class="rates">
                               <table class="table-rate text-center mx-0 mt-3">
                                   <thead>
                                   <tr>
                                       <th class="" scope="col"><img src="{{ asset('images/imdb.png') }}"
                                                                     class="res_logo"></th>
                                       <th class="" scope="col"><a href="{{$post->movie->url}}" target="_blank"><img src="{{ asset('images/kp.png') }}"
                                                                                                                     class="res_logo"></a> </th>
                                   </tr>
                                   </thead>
                                   <tbody>
                                   <tr>
                                       <td class="rate-ch">{{$post->movie->rating}}</td>
                                       <td class="rate-ch">{{$post->movie->rating_kp}}</td>
                                   </tr>
                                   </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
            <div class="col-md-10 fs-5 text-start">
                <div class=" justify-content-between align-items-center d-none d-md-flex">
                    <div class="d-flex">
                        <div>
                            <img src="https://imdibil.ru/images/uploads/{{$post->user->avatar}}" class="img-fluid rounded-3 avatar">
                        </div>
                        <div class="ms-2">
                            <p class="h5 mb-0 text-secondary">{{$post->user->name}}</p>
                            <p class="text-secondary fst-italic">{{\Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y')}}</p>
                        </div>
                    </div>
                    <i class="fi fi-send h3 text-secondary copy cursor-pointer" id="copy"></i>

                </div>
                    {!! $post->text !!}
            </div>
        </div>

        {{--        {!! $post->text !!}--}}

    </div>

@endsection
