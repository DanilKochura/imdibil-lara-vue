@extends('app')

@section('meta')

    <meta name="keywords" content="киноклуб, мгту" />
    <meta name="description" content="История заседаний киноклуба IMDibil." />
    <title>Тройки</title>
{{--    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">--}}
    <meta property="og:title" content="Хронология заседаний">
@endsection

@section('content')
    <div class="container content" id="test-div">
    </div>



    @foreach($thirds as $third)

        <div class="container forum-card rounded-3 mt-4 content">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="name">Добавлена тройка фильмов от пользователя {{ $third->user->name }} </div>
                </div>
                <div class="selected" style="display: none;">{{ $third->selected ? $third->selected->id : '' }}</div>
            </div>
        </div>
        <div class="container forum-card rounded-3 mt-4 px-md-3">
            <div class="row th">
                @foreach ($third->allThird() as $film)
                    <div class="col-md-4 thirds mx-0 px-1 px-md-2 mt-2 mt-md-1"
                         style="display: flex; flex-direction: column;justify-content: space-between;"
                         id="id-{{$film->id}}">
                        <div class="row logo-and-rates">
                            <div class="col-sm-6 col-6">
                                <a href="{{$film->url}}" target="_blank"> <img src="{{asset('/images/posters/'.$film->poster)}}"
                                                                               class="img-fluid rounded" id="IM"></a>
                            </div>
                            <div class="col-sm-6 col-6">
                                <h5 class="name">{{$film->name_m}}</h5>
                                <div class="original">{{$film->original}}</div>
                                <div class="year">Год: {{$film->year_of_cr}}</div>
                                {{--                                <div class="type">Жанр:--}}
                                {{--                                        <?php--}}
                                {{--                                        $n = count($film->genre);--}}
                                {{--                                        for($i = 0; $i<$n-1; ++$i)--}}
                                {{--                                        {--}}
                                {{--                                            echo $film->genre[$i]. ", ";--}}
                                {{--                                        }--}}
                                {{--                                        echo $film->genre[$i];--}}
                                {{--                                        }}--}}
                                {{--                                </div>--}}
                                <div class="director">Режиссер: {{$film->director->name_d}}</div>
                                <div class="time">Длительность: {{$film->duration}}мин.</div>
                                <div class="row d-sm-none mt-2">
                                    <div class="col">
                                        <img src="{{ asset('images/imdb.png') }}" class="res_logo">
                                    </div>
                                    <div class="col">
                                        <img src="{{ asset('images/kp.png') }}" class="res_logo">
                                    </div>
                                    @if($film->our_rate)
                                        <div class="col">
                                            <img src="{{ asset('images/logogo.png') }}" class="res_logo">
                                        </div>
                                    @endif
                                </div>
                                <div class="row d-sm-none">
                                    <div class="col rate-ch">
                                        {{$film->rating}}
                                    </div>
                                    <div class="col rate-ch">
                                        {{$film->rating_kp}}
                                    </div>
                                    @if ($film->our_rate)
                                        <div class="col rate-ch">
                                            {{$film->our_rate}}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-none d-sm-block">
                                    <table class="table-rate text-center" style="height: 100px;">
                                        <tbody>
                                        <tr>
                                            <td><img src="{{ asset('images/imdb.png') }}" class="res_logo"></td>
                                            <td class="rate-ch">{{$film->rating}}</td>
                                        </tr>
                                        <tr>
                                            <th><img src="{{ asset('images/kp.png') }}" class="res_logo"></th>
                                            <td class="rate-ch">{{$film->rating_kp}}</td>
                                        </tr>
                                        @if($film->our_rate)

                                            <tr>
                                                <th><img src="{{ asset('images/logogo.png') }}" class="res_logo"></th>
                                                <td class="rate-ch">{{$film->our_rate}}</td>
                                            </tr>
                                        @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row description">
                            <div class="col-sm-12 description">{{$film->description}}</div>
                        </div>


                </div>

@endforeach

                    </div>
            </div>
            @endforeach
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-6 ">

                        {{ $thirds->links() }}

                    </div>
                </div>
            </div>

        @endsection

