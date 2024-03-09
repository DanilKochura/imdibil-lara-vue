@extends('app')



@section('meta')

    <meta name="keywords" content="киноклуб, мгту" />
    <meta name="description" content="История заседаний киноклуба IMDibil." />
    <title>Главная</title>
    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">
    <meta property="og:title" content="Хронология заседаний">
@endsection

@section('content')
<div class="container content" id="test-div">
{{--    <div class="row">--}}
{{--        <div class="col rounded forum-card  mt-4 d-none d-md-block">--}}
{{--            <div class="text-center">--}}
{{--                <form method="get" action="">--}}
{{--                    <div class="row justify-content-center">--}}
{{--                        <div class="col-3">--}}
{{--                            <select name="sort" class="form-select form-select-sm" id="">--}}
{{--                                <option value="id_meet">По номеру встречи</option>--}}
{{--                                <option value="rating_kp">По оценке КП</option>--}}
{{--                                <option value="rating">По оценке IMDB</option>--}}
{{--                                <option value="our_rate">По оценке IMDBil</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-3">--}}
{{--                            <select name="order"  class="form-select  form-select-sm" id="">--}}
{{--                                <option value="asc">По возрастанию</option>--}}
{{--                                <option value="desc">По убыванию</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-1">--}}
{{--                            <select name="show" class="form-select form-select-sm" id="">--}}
{{--                                <option value="5">5</option>--}}
{{--                                <option value="10">10</option>--}}
{{--                                <option value="20">20</option>--}}
{{--                                <option value="50">50</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-3">--}}
{{--                            <button type="submit" class="btn btn-warning btn-sm">Подтвердить</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
</div>



@foreach($meetings as $meeting)

    <div class="row m-0" style="justify-content: center"><div class="three"><h1>Заседание #{{$meeting->id}}</h1></div></div>
    <div class="container rounded forum-card my-4">
        <div class="row justify-content-center justify-content-md-start" >
            <div class="col-md-2 poster"><a href="{{$meeting->movie->url}}" target="_blank"><img src="{{asset('/images/posters/'.$meeting->movie->poster)}}" class="img-fluid rounded"id="IM" /></a></div>
            <div class="col-md-4 text-left description">
                <p class="name">{{$meeting->movie->name_m}}</p>
                <div class="original">{{$meeting->movie->original}}</div>
                <div class="year">Год: {{$meeting->movie->year_of_cr}}</div>
{{--                <div class="type">Жанр:--}}
{{--                        <?php--}}
{{--                        $n = count($m['genre']);--}}
{{--                        for($j = 0; $j<$n-1; ++$j)--}}
{{--                        {--}}
{{--                            echo $m['genre'][$j]. ", ";--}}
{{--                        }--}}
{{--                        echo $m['genre'][$j];?> </div>--}}
                <div class="director">Режиссер:  {{ $meeting->movie->director()->first()->name_d }} </div>
                <div class="time">Длительность: {{$meeting->movie->duration}} мин.</div>
                <div class="rates">
                    <table class="table-rate text-center mx-0 mt-3">
                        <thead>
                        <tr>
                            <th class="bg-main" scope="col"><img src="{{ asset('images/imdb.png') }}" class="res_logo"></th>
                            <th class="bg-main" scope="col"><img src="{{ asset('images/kp.png') }}" class="res_logo"></th>
                            <th  class="bg-main" scope="col"><img src="{{ asset('images/logogo.png') }}" class="res_logo"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="rate-ch">{{$meeting->movie->rating}}</td>
                            <td class="rate-ch">{{$meeting->movie->rating_kp}}</td>
                            <td class="rate-ch">{{$meeting->movie->our_rate}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-secondary pt-0 pt-md-2"> Дата: <span> {{ \Illuminate\Support\Carbon::parse($meeting->date_at)->locale("ru")->translatedFormat("d F Y") }} </span></div>
            </div>
            <div class="rating-tab col-md-4 col-xl-4 px-2 col-12 px-md-0 justify-content-center row row-cols-{{count($meeting->rates) > 8 ? '5' : 4}}">
                 @foreach($meeting->rates as $rate)
                     @if($rate->user == null)
                         {{dd($rate)}}
                     @endif
                     <div class="col d-flex flex-column border-bottom-sm mt-4 mt-0-md">
                             <a href="profile/{{ $rate->user->id  }}" class="mx-auto my-2">
                                 <img  src="https://imdibil.ru/uploads/{{$rate->user->login}}.jpg" alt="{{$rate->user->name}}" class="avatar">
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

