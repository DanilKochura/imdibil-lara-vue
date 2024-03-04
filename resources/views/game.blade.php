@extends('app')

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
                        <div class="text-white">
                            <i class="fi fi-time"></i>
                            <span>15 секунд на ответ</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class=" fill-brown w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 60%"></x-medal>
                            <x-medal class="  fill-gray-200 w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 80%"></x-medal>
                            <x-medal class="  fill-warning w-25" data-bs-toggle="tooltip" data-bs-placement="top"
                                     title="Пройдено 95%"></x-medal>
                        </div>
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
                        <div class="text-white">
                            <i class="fi fi-time"></i>
                            <span>15 секунд на ответ</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class=" fill-inactive fill-brown w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 60%"></x-medal>
                            <x-medal class=" fill-inactive fill-gray-200 w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 80%"></x-medal>
                            <x-medal class=" fill-inactive fill-warning w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 95%"></x-medal>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('quiz', 'medium')}}" class="btn btn-outline-warning w-100">Играть</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                {{--                <div>--}}
                {{--                    <div>--}}
                {{--                        <i class="fi fi-locked"></i>--}}
                {{--                    </div>--}}
                {{--                    <div>--}}
                {{--                        Станет доступно с 10 марта--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="bg-dark border-0 card shadow-light-md-hover transition-hover-zoom no-hover">
                    <div class="card-lock-overlay">
                        <i class="fi fi-locked" style="font-size: 48px;"></i>
                        <div class="lock-content">
                            <span>Будет доступно с 15 марта</span>
                        </div>
                    </div>
                    <div class="card-header">
                        <img src="{{asset('images/quiz/hard.png')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-warning">Для душнил</h5>
                        <p class="card-text">Малоизвестные фильмы, части франшиз и пейзажи</p>
                        <div class="text-white">
                            <i class="fi fi-time"></i>
                            <span>20 секунд на ответ</span>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <x-medal class=" fill-inactive fill-brown w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 60%"></x-medal>
                            <x-medal class=" fill-inactive fill-gray-200 w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 80%"></x-medal>
                            <x-medal class=" fill-inactive fill-warning w-25" data-bs-toggle="tooltip"
                                     data-bs-placement="top" title="Пройдено 95%"></x-medal>
                        </div>
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
                            <li><span>Ваня</span> <span>150</span></li>
                            <li>Ваня</li>
                            <li>Ваня</li>
                            <li>Ваня</li>
                            <li>Ваня</li>
                            <li>Ваня</li>
                            <li>Ваня</li>
                            <li>Ваня</li>
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
