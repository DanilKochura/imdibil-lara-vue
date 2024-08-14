@extends('app')

@section('meta')

    <meta name="keywords"
          content="киновикторина, фильм по кадру, викторина онлайн, викторина про кино, тесты на знание кино, викторина кинематограф, кинематограф, веселые тесты, развлекательные тесты"/>
    <meta name="description"
          content="Порверьте свои знания мирового кино, проходя наши киновикторины онлайн. Фильм по кадру, актеры, франшизы, постеры."/>
{{--    На нашем портале доступны различные киновикторины на знание мирового кинематографа--}}
    <meta name="robots" content="index, follow" />

    <title>Киновикторина</title>
    <meta property="og:site_name" content="IMDibil - Киновикторина">
    <meta property="og:title" content="Киновикторины IMDIBIL">
    <meta property="og:image" content="{{asset('images/quiz_preview.png')}}">
    @if(auth()->check())
        <meta id="user_id" content="{{auth()->id()}}">
    @endif
@endsection

@section('content')
    <style>
        .wrapper {
            background: linear-gradient(rgb(56 56 56 / 100%), rgb(110 110 110 / 76%)), url(https://imdibil.ru/image/bg.jpg) center/cover;

        }

        body {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) !important;
        }
    </style>
                   <div class="container" >
                       <div class="row">
                           <h1 class="text-gold text-center">Викторины</h1>
                       </div>
                       <div class="row" id="sticker-handler">
                           <div class="col-12 col-md-8">
                               <div class="container bg-dark bg-opacity-50 my-3  rounded-2">
                                   <h3 class="text-center text-warning">Угадай фильм по кадру</h3>
                                   <div class="row text-center">
                                       @foreach($quizzes as $quiz)
                                           <div class="col-sm-4 col-6 mb-2 px-1">
                                               <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
                                                   {{--                        @if($quiz->id == 3)--}}
                                                   {{--                            <div class="card-lock-overlay">--}}
                                                   {{--                                <i class="fi fi-locked" style="font-size: 48px;"></i>--}}
                                                   {{--                                <div class="lock-content">--}}
                                                   {{--                                    <span>Будет доступно с 20 марта</span>--}}
                                                   {{--                                </div>--}}
                                                   {{--                            </div>--}}
                                                   {{--                        @endif--}}
                                                   <div class="card-header">
                                                       <img src="{{asset('images/quiz/'.$quiz->image)}}" class="card-img-top"
                                                            alt="...">
                                                   </div>
                                                   <div class="card-body">
                                                       <h5 class="card-title text-warning">{{$quiz->title}}</h5>
                                                       <p class="card-text d-none d-sm-block">{{$quiz->text}}</p>
                                                       @php $rank = $quiz->user_medals() @endphp
                                                       <div class="d-flex justify-content-evenly">
                                                           <x-medals type="{{$quiz->medal}}"
                                                                     class=" {{($rank and $rank->rank > 0) ? '' : 'fill-inactive'}} fill-brown w-25"
                                                                     data-bs-toggle="tooltip"
                                                                     data-bs-placement="top" title="Пройдено 60%"></x-medals>
                                                           <x-medals type="{{$quiz->medal}}"
                                                                     class=" {{($rank and $rank->rank > 1) ? '' : 'fill-inactive'}} fill-gray-200 w-25"
                                                                     data-bs-toggle="tooltip"
                                                                     data-bs-placement="top" title="Пройдено 80%"></x-medals>
                                                           <x-medals type="{{$quiz->medal}}"
                                                                     class=" {{($rank and $rank->rank == 3) ? '' : 'fill-inactive'}} fill-warning w-25"
                                                                     data-bs-toggle="tooltip"
                                                                     data-bs-placement="top" title="Пройдено 95%"></x-medals>
                                                       </div>
                                                       <x-quiz-info errors="{{$quiz->errors}}" results="{{$quiz->attempts}}"
                                                                    time="{{$quiz->time}}" count="{{$quiz->questions()->count()}}"
                                                                    class="mt-2"></x-quiz-info>
                                                   </div>
                                                   <div class="card-footer text-muted">
                                                       <a href="{{route('quiz', $quiz->alias)}}" class="btn btn-outline-warning w-100">Играть</a>
                                                   </div>
                                               </div>
                                           </div>
                                       @endforeach


                                   </div>
                               </div>


                               @if(count($quizzesAll))
                                   <div class="container bg-dark bg-opacity-50 my-3  rounded-2">
                                       <h3 class="text-center text-warning">Тематические тесты</h3>
                                       <div class="row text-center">
                                           @foreach($quizzesAll as $quiz)
                                               <div class="col-sm-4 col-6 mb-2  px-1">
                                                   <div
                                                       class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
                                                       {{--                        @if($quiz->id == 3)--}}
                                                       {{--                            <div class="card-lock-overlay">--}}
                                                       {{--                                <i class="fi fi-locked" style="font-size: 48px;"></i>--}}
                                                       {{--                                <div class="lock-content">--}}
                                                       {{--                                    <span>Будет доступно с 20 марта</span>--}}
                                                       {{--                                </div>--}}
                                                       {{--                            </div>--}}
                                                       {{--                        @endif--}}
                                                       <div class="card-header">
                                                           <img src="{{asset('images/quiz/'.$quiz->image)}}" class="card-img-top"
                                                                alt="...">
                                                       </div>
                                                       <div class="card-body">
                                                           <h5 class="card-title text-warning">{{$quiz->title}}</h5>
                                                           <p class="card-text d-none d-sm-block">{{$quiz->text}}</p>
                                                           @php $rank = $quiz->user_medals() @endphp
                                                           <div class="d-flex justify-content-evenly   ">
                                                               <x-medal
                                                                   class=" {{($rank and $rank->rank > 0) ? '' : 'fill-inactive'}} fill-brown w-25"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-placement="top" title="Пройдено 60%"></x-medal>
                                                               <x-medal
                                                                   class=" {{($rank and $rank->rank > 1) ? '' : 'fill-inactive'}} fill-gray-200 w-25"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-placement="top" title="Пройдено 80%"></x-medal>
                                                               <x-medal
                                                                   class=" {{($rank and $rank->rank == 3) ? '' : 'fill-inactive'}} fill-warning w-25"
                                                                   data-bs-toggle="tooltip"
                                                                   data-bs-placement="top" title="Пройдено 95%"></x-medal>
                                                           </div>
                                                           <x-quiz-info errors="{{$quiz->errors}}"
                                                                        results="{{$quiz->attempts}}"
                                                                        time="{{$quiz->time}}" count="{{$quiz->questions()->count()}}"
                                                                        class="mt-2"></x-quiz-info>
                                                       </div>
                                                       <div class="card-footer text-muted">
                                                           <a href="{{route('quiz', $quiz->alias)}}"
                                                              class="btn btn-outline-warning w-100 btn-quiz">Играть</a>
                                                       </div>
                                                   </div>
                                               </div>
                                           @endforeach

                                       </div>
                                   </div>
                               @endif
                               @if(!auth()->check())
                                   @include('components.login-modal')
                               @endif
                           </div>

                           <div class="col-4 d-none d-sm-block my-3" id="stick_wrapper">
                               <div class="row  test-stick" id="test-stick">
                                       <div class="bg-dark mb-3 border-0 card shadow-light-md-hover mx-0 px-0">
                                           <div style="margin: 20px">
                                               <h5 class="text-center text-warning mb-1 pb-1">Ваша активность</h5>
                                               <div class="graph">

                                                   <ul class="days">
                                                       <li>Пн</li>
                                                       <li>Вт</li>
                                                       <li>Ср</li>
                                                       <li>Чт</li>
                                                       <li>Пт</li>
                                                       <li>Сб</li>
                                                       <li>Вс</li>
                                                   </ul>
                                                   <ul class="squares">
                                                       <!-- added via javascript -->
                                                   </ul>

                                               </div>
                                           </div>
                                           <div class="p-3 position-absolute text-center w-100 " style="top: 10%">
                                               <div class="spinner-grow text-success position-absolute" id="loader-activity" role="status">
                                                   <span class="visually-hidden">Loading...</span>
                                               </div>
                                           </div>
                                           @if(!auth()->check())
                                               <div class="p-3 position-absolute text-center w-100 rounded" style="backdrop-filter: brightness(50%); height: 100%">
                                                   <div class="mt-4">
                                                       <button type="button" class="btn btn-sm  btn-outline-warning mb-2" data-bs-toggle="modal"
                                                               data-bs-target="#modalLogin" title="Редактировать личные данные">
                                                           Авторизуйтесь
                                                       </button>
                                                       <p class="text-white">чтобы сохранять свой результат</p>
                                                   </div>
                                               </div>
                                           @endif
                                       </div>
                                   <div class="bg-dark border-0 card shadow-light-md-hover">
                                       <div class="card-header">
                                           <h5 class="text-warning text-center">
                                               Список лидеров
                                           </h5>
                                       </div>
                                       <div class="card-body text-white table-leaders">
                                           <table class="table table-dark">
                                               <thead>
                                               <tr class="fs-10p text-secondary">
                                                   <th>#</th>
                                                   <th colspan="2"> пользователь</th>
                                                   <th >очки</th>
                                                   <th class="fs-10p text-secondary">поп.</th>
                                               </tr>
                                               </thead>
                                               <tbody class="border-0">
                                               @foreach($results as $result)
                                                    @if($loop->iteration == 8) @break($loop) @endif
                                                   <tr class="align-middle @if($result['id'] == auth()->id()) text-success @endif">
                                                       <td>{{$loop->iteration}}</td>
                                                       <td>
                                                           <a href="{{route('profile.index', $result['id'])}}">
                                                               <img
                                                                   src="{{asset('images/uploads/'.($result['avatar'] ?: 'default.jpg'))}}"
                                                                   alt="Ваня" class="avatar header">
                                                           </a>
                                                       </td>
                                                       <td>{{$result['name']}}</td>
                                                       {{--                                    @foreach($result['points'] as $point)--}}
                                                       {{--                                        <td>{{$point}}</td>--}}
                                                       {{--                                    @endforeach--}}
                                                       <td>{{$result['sum']}}</td>
                                                       <td >{{$result['attempts']}}</td>
                                                   </tr>
                                               @endforeach
                                               </tbody>
                                           </table>

                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
                   </div>






    <div class="bottom-0 end-0 m-4 position-fixed z-index-100 d-block d-sm-none">

        <a href="#" class="btn-burger-menu btn-toggle bg-dark rounded d-inline-block px-3 py-3 shadow-md js-togglified"
           style="width:60px;height:60px;" data-bs-target="#fullMenuOveer" data-toggle-container-class="hide-force"
           data-toggle-body-class="overflow-hidden">
          <span class="group-icon text-center">
            <span class="burger-menu"></span>
            <i class="fi fi-close text-center w-100 fs-2 lh-1 text-white" style="margin-top: -8px;"></i>
          </span>
        </a>

    </div>

    <div id="fullMenuOveer"
         class="position-fixed top-0 bottom-0 left-0 right-0 text-white z-index-99 d-none"
         style="background: linear-gradient(180deg,#5e5e5e 0,#1e1e1e);">


        <!-- container -->
        <div class="d-lg-flex text-white justify-content-evenly mx-5">

            <!-- left column -->


            <!-- right column -->
            <div class="col-12 col-lg-7 d-lg-flex">
                <div class="w-100 align-self-center text-center-md text-center-xs py-2">

                    <h5 class="text-warning">
                        Список лидеров
                    </h5>
                    <div class="row banner-leaders">

                        @foreach($results as $result)
                            <div class="col-12 mt-2 {{$loop->iteration == 1 ? 'text-gold fw-bold fs-bigger' : ''}}">
                                <div class="row align-items-center">
                                    <div class="col-1">{{$loop->iteration}}</div>
                                    <div class="col-3">
                                        <a href="{{route('profile.index', $result['id'])}}">
                                            <img src="{{asset('images/uploads/'.($result['avatar'] ?: 'default.jpg'))}}"
                                                 alt="Ваня"
                                                 class="avatar header  {{$loop->iteration == 1 ? 'border-warning' : ''}}">
                                        </a>
                                    </div>
                                    <div class="col-4">{{$result['name']}}</div>
                                    {{--                                    @foreach($result['points'] as $point)--}}
                                    {{--                                        <td>{{$point}}</td>--}}
                                    {{--                                    @endforeach--}}
                                    <div class="col-2">
                                        <div class="text-center">{{$result['sum']}}</div>
                                        <div class="fs-10p text-secondary">очки</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="text-center">{{$result['attempts']}}</div>
                                        <div class="fs-10p text-secondary">поп.</div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>


                </div>
            </div>

        </div>
    </div>

@endsection
