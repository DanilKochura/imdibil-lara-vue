@extends('app')

@section('meta')

    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="История заседаний киноклуба IMDibil."/>
    <title>Тройки</title>
    {{--    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">--}}
    <meta property="og:title" content="Хронология заседаний">
@endsection

@section('content')
    <style>
        body {
            background-color: rgb(46, 46, 46);
        }
    </style>


    @foreach($thirds as $third)

        <div class="container  rounded-3 mt-4 content">
            <div class="row bg-main mx-1 p-4 rounded-3">
                <div class="col-sm-12 text-center">
                    <div class="name">Добавлена тройка фильмов от пользователя {{ $third->user->name }} </div>
                </div>
                <div class="selected" style="display: none;">{{ $third->selected ? $third->selected->id : '' }}</div>
            </div>
        </div>
        <div class="container  rounded-3 mt-4 px-md-3">
            <div class="row">
                @foreach ($third->allThird() as $film)
                    @php
                        $sel = $third->selected ? $third->selected->id : null;
                    @endphp
                    <div class="col-md-4 text-white  mx-0 mt-2 mt-md-1 p-0"
                         style="display: flex; flex-direction: column;justify-content: space-between;"
                    >
                        <div class="{{$sel == $film->id ? 'bg-gold-dynamic' : ''}} rounded mx-1 thirds-new" >
                            <div class="bg-main m-1 p-3 rounded"  >
                                <div class="row logo-and-rates">
                                    <div class="col-sm-6 col-6">
                                        <a href="{{$film->url}}" target="_blank"> <img
                                                src="{{asset('/images/posters/'.$film->poster)}}"
                                                class="img-fluid rounded  border rounded-3   br-20px"
                                                style="border-color: {{$sel == $film->id ? 'gold' : 'silver'}} !important;" id="IM"></a>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h5 class="name mb-1">{{$film->name_m}}</h5>
                                        <div class="original text-secondary fw-bold mb-2">{{$film->original}}</div>
                                        <div class="d-flex justify-content-between my-2">
                                            <div class="rounded-3 text-center br-20px p-1 border w-30" style="min-width: 70px; border-color: {{$sel == $film->id ? 'gold' : 'silver'}} !important;">
                                                <div class="year">{{$film->year_of_cr}}</div>
                                                <div class="fs-10p text-secondary">год</div>
                                            </div>
                                            <div class="rounded-3 text-center br-20px p-1 border w-30" style="min-width: 70px; border-color: {{$sel == $film->id ? 'gold' : 'silver'}} !important;">
                                                <div class="time">{{$film->duration}} мин.</div>
                                                <div class="fs-10p text-secondary">прод.</div>
                                            </div>
                                        </div>

                                        <div class="director">Реж.: {{$film->director->name_d}}</div>
                                        <div class="genres">Жанры: {{$film->genres->pluck('name_g')->implode(', ')}}</div>
                                        <svg width="722" style="width: 100%" height="12" viewBox="0 0 722 12" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1 5.29003C1 5.29003 67.5 -1.70997 106.5 5.29003C145.5 12.29 166 -7.20975 360.5 5.29003C555 17.7898 461.5 5.29003 574.5 5.29003C687.5 5.29003 722 5.29003 722 5.29003"
                                                stroke="{{$sel == $film->id ? '#FFC107' : 'silver'}}" stroke-width="2"/>
                                        </svg>
                                        <div class="row  justify-content-evenly mt-2">
                                            <div class="col d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{ asset('images/imdb.png') }}" class="res_logo img-fluid" >
                                                <div class="rate-ch text-center">{{$film->rating}}</div>
                                            </div>
                                            <div class="col d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{ asset('images/kp.png') }}" class="res_logo img-fluid" >
                                                <div class="text-center rate-ch">{{$film->rating_kp}}</div>
                                            </div>

                                        </div>


                                    </div>
                                </div>

                                <div class="row description">
                                    <div class="col-sm-12 description text-lines">{{$film->description}}</div>
                                </div>
                            </div>
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

