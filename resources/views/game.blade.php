@extends('app')

@section('meta')

    <meta name="keywords" content="киновикторина, викторина про кино, тесты на знание кино, викторина кинематограф, кинематограф, веселые тесты, развлекательные тесты" />
    <meta name="description" content="На нашем портале доступны различные викторины на знание мирового кинематографа. Фильмы по кадрам, актеры, франшизы, постеры." />
    <title>Киновикторина</title>
    <meta property="og:site_name" content="IMDibil - Киновикторнв">
    <meta property="og:title" content="Киновикторины">
@endsection

@section('content')
    <style>
        .wrapper {
            background: linear-gradient(rgb(56 56 56 / 100%), rgb(110 110 110 / 76%)), url(https://imdibil.ru/image/bg.jpg) center/cover;

        }
        body
        {
            background: #595959;
        }
    </style>
{{--    <h1>Викторина</h1>--}}
    <div class="container bg-dark bg-opacity-50 my-3  rounded-2">
        <h3 class="text-center text-warning">Фильм по кадру</h3>
        <div class="row text-center">
            @foreach($quizzes as $quiz)
                <div class="col-sm-3 mb-2">
                    <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
                        <div class="card-header">
                            <img src="{{asset('images/quiz/'.$quiz->image)}}" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-warning">{{$quiz->title}}</h5>
                            <p class="card-text">{{$quiz->text}}</p>
                            @php $rank = $quiz->user_medals() @endphp
                            <div class="d-flex justify-content-evenly   ">
                                <x-medal class=" {{($rank and $rank->rank > 0) ? '' : 'fill-inactive'}} fill-brown w-25" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Пройдено 60%"></x-medal>
                                <x-medal class=" {{($rank and $rank->rank > 1) ? '' : 'fill-inactive'}} fill-gray-200 w-25" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Пройдено 80%"></x-medal>
                                <x-medal class=" {{($rank and $rank->rank == 3) ? '' : 'fill-inactive'}} fill-warning w-25" data-bs-toggle="tooltip"
                                         data-bs-placement="top" title="Пройдено 95%"></x-medal>
                            </div>
                            <x-quiz-info errors="{{$quiz->errors}}" results="{{$quiz->unique_results()}}" time="{{$quiz->time}}" count="{{$quiz->questions()->count()}}" class="mt-2"></x-quiz-info>
                        </div>
                        <div class="card-footer text-muted">
                            <a href="{{route('quiz', $quiz->alias)}}" class="btn btn-outline-warning w-100">Играть</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-sm-3 mb-2">
                <div class="bg-dark border-0 card shadow-light-md-hover ">
                    <div class="card-header">
                        <h5 class="text-warning">
                            Список лидеров
                        </h5>
                    </div>
                    <div class="card-body text-white table-leaders">
                        <table class="table table-dark">
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$result['name']}}</td>
{{--                                    @foreach($result['points'] as $point)--}}
{{--                                        <td>{{$point}}</td>--}}
{{--                                    @endforeach--}}
                                    <td>{{$result['sum']}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container bg-dark bg-opacity-50 my-3  rounded-2">
        <h3 class="text-center text-warning">Классическая викторина</h3>
        <div class="row text-center">
            <div class="col-sm-3 mb-2">
                <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom  no-hover">
                    <div class="card-header">
                        <img src="{{asset('images/quiz/simple.png')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">Простые вопросы</h5>
                        <p class="card-text">Кадры фильмов из ТОП-100 Кинопоиска</p>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class="fill-inactive fill-brown w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 60%"></x-medal>
                            <x-medal class=" fill-inactive fill-gray-200 w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 80%"></x-medal>
                            <x-medal class="fill-inactive  fill-warning w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 95%"></x-medal>
                        </div>
                        <x-quiz-info errors="7" results="2" time="20" count="110" class="mt-2"></x-quiz-info>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('quiz', 'simple')}}" class="btn btn-outline-warning w-100">Играть</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
                    <div class="card-header">
                        <img src="{{asset('images/quiz/medium.png')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">Сложные вопросы</h5>
                        <p class="card-text">Более сложные фильмы и неочевидные кадры</p>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class=" fill-inactive fill-brown w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 60%"></x-medal>
                            <x-medal class=" fill-inactive fill-gray-200 w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 80%"></x-medal>
                            <x-medal class=" fill-inactive fill-warning w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 95%"></x-medal>
                        </div>
                        <x-quiz-info errors="7" results="2" time="20" count="110" class="mt-2"></x-quiz-info>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('quiz', 'medium')}}" class="btn btn-outline-warning w-100">Играть</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
{{--                    <div class="card-lock-overlay">--}}
{{--                        <i class="fi fi-locked" style="font-size: 48px;"></i>--}}
{{--                        <div class="lock-content">--}}
{{--                            <span>Будет доступно с 1 апреля</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card-header">
                        <img src="{{asset('images/quiz/hard.png')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">Для душнил</h5>
                        <p class="card-text">Малоизвестные фильмы, части франшиз и пейзажи</p>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class=" fill-inactive fill-brown w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 60%"></x-medal>
                            <x-medal class=" fill-inactive fill-gray-200 w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 80%"></x-medal>
                            <x-medal class=" fill-inactive fill-warning w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 95%"></x-medal>
                        </div>
                        <x-quiz-info errors="7" results="2" time="20" count="110" class="mt-2"></x-quiz-info>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('quiz', 'hard')}}" class="btn btn-outline-warning w-100">Играть</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <div class="bg-dark border-0 card shadow-light-md-hover ">
                    <div class="card-header">
                        <h5 class="text-warning">
                            Список лидеров
                        </h5>
                    </div>
                    <div class="card-body text-white">
                        <ol class="ratelist">
                            @foreach($results as $result)
                                <li><span>{{$result['name']}}</span> <span>{{$result['sum']}}</span></li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if(!auth()->check())
        @include('components.login-modal')
    @endif
@endsection
