@extends('app')



@section('meta')

{{--    <meta name="keywords" content="киноклуб, п" />--}}
    <meta name="description" content="Профиль пользователя {{$user->name}}" />
    <title>{{$user->name}}</title>
    <meta property="og:site_name" content="IMDibil - Информационный портал киноклуба">
    <meta property="og:title" content="{{$user->name}}">
@endsection


@section('content')

    <div class="container main content" style="min-height: 100%">
        <div class="row user-info">
            <div class="col-sm-1"></div>
            <div class="col-sm-2 col-6">
                <img class="user-avatar" src="{{asset('images/uploads/'.($user->avatar ?: 'default.jpg'))}}">
            </div>
            <div class="col-sm-4 col-6 ">
                <div class="d-flex flex-row align-items-center">
                    <h1>{{$user->name}}</h1>
                    <span class="badge badge-success badge-soft ms-1">{{$user->getRole()}}</span>
                </div>
                @if($user->isExpert())
                    <p>Средняя оценка: <span
                            class="badge text-black bg-ch">{{round($user->rates->pluck('rate')->avg(), 2)}}</span></p>
                    <p>Количество встреч: {{$user->rates->pluck('rate')->count()}}</p>
                    <p class="d-none">Дата регистрации: 12.03.2022</p>
                @endif


            </div>
            <div class="col-sm-4 text-black">

                <div
                    class="d-flex my-3 my-md-0 flex-row justify-content-around justify-content-md-start align-items-center">
                    @if(auth()->id() == $user->id)
                        <button type="button" class="btn btn rounded-circle btn-primary mb-2" data-bs-toggle="modal"
                                data-bs-target="#userModal" title="Редактировать личные данные">
                            <i class="fi fi-pencil"></i>
                        </button>
                        <button type="button" class="btn btn-success rounded-circle rounded-md ms-2 mb-2"
                                data-bs-toggle="modal"
                                data-bs-target="#movieAddModal" title="Добавить фильм в базу">
                            {{--                            <span class="d-none">Добавить фильм в базу</span>--}}
                            <i class="fi fi-plus"></i>
                        </button>

                        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Редактировать личные данные</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('profile.update')}}" method="post"
                                              enctype="multipart/form-data">


                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="name" id="floatingInput"
                                                       value="{{$user->name}}">
                                                <label for="floatingInput">Имя</label>
                                            </div>

                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Аватар</label>
                                                <input class="form-control" name="avatar" type="file" id="formFile">
                                            </div>


                                            @csrf
                                            <button type="submit" class="btn btn-primary">Отправить</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if($user->isExpert())
                            <button type="button" class="btn btn-dark rounded-circle ms-2 mb-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#rateAddModal" title="Добавить оценку">
                                <i class="fi fi-star-full"></i>
                            </button>
                            <button type="button" class="btn btn-dark rounded-circle ms-2 mb-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#thirdAddModal" title="Добавить тройку">
                                <i class="fi mdi-filter_3"></i>
                            </button>
                            <button type="button" class="btn btn-danger rounded-circle ms-2 mb-2"
                                    data-bs-toggle="modal"
                                    data-bs-target="#pairAddModal" title="Добавить пару">
                                <i class="fi mdi-filter_2"></i>
                            </button>
                        @endif
                    @endif

                </div>


            </div>

            <div class="modal fade" id="movieAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <p class="h5 modal-title" id="exampleModalLabel">Добавить фильм в базу IMDIBIL <span
                                    class="badge bg-secondary-soft fs-10p align-top cursor-pointer"
                                    data-bs-toggle="tooltip" data-bs-placement="right"
                                    title="Можно найти фильм в базе Кинопоиска по ID или названию а затем перенести в нашу базу">?</span>
                            </p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <form action="/" class="search-m">
                                <div class="container">
                                    <div class="row text-center">

                                        <div class="col-md-7">
                                            <input type="text" class="form-control typed form-control"
                                                   data-typed-string="Запах женщины|4810|Интерстеллар|463897"
                                                   data-typed-speed-forward="1"
                                                   data-typed-speed-back="1"
                                                   data-typed-back-delay="700"
                                                   data-typed-loop-times="infinite"
                                                   data-typed-smart-backspace="true"
                                                   data-typed-shuffle="false"
                                                   data-typed-cursor="|"
                                                   required name="name-movie" id="movie_input">
                                            {{--                                            <label for="movie_input text-small">Название или ID фильма</label>--}}
                                        </div>
                                        <div class="col-md-5">
                                            <input type="submit" class="btn btn-warning w-100" id="search-movie-btn">
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <div class="container">
                                <div class="row m-2 p-2 b1-warning">
                                    <div class="col-md-5">
                                        <img src="" id="posterUrl" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="row name">
                                            <span id="nameRu"></span>
                                        </div>
                                        <div class="row text-gray-900">
                                            <span id="nameOriginal"></span>
                                        </div>
                                        <div class="row text-gray-900">
                                            <span id="filmLength"></span>
                                        </div>
                                        <div class="row text-gray-900">
                                            <div class="col-6">
                                                <span id="ratingImdb" class=" text-gray-900"></span>
                                            </div>
                                            <div class="col-6">
                                                <span id="ratingKinopoisk" class=" text-gray-900"></span>
                                            </div>

                                        </div>
                                        <div class="row text-gray-900">
                                            <span id="year"></span>
                                        </div>

                                    </div>

                                </div>
                                <div class="row  text-center text-gray-900">
                                    <form class="js-ajax bs-validate" novalidate
                                          action="{{route('profile.add-film')}}"
                                          method="POST"

                                          data-ajax-update-url="false"
                                          data-ajax-show-loading-icon="true"

                                          data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                                          data-error-toast-delay="3000"
                                          data-error-toast-position="top-center"

                                          data-error-scroll-up="false"
                                          id="addForm"
                                          data-ajax-callback-function="filmAddCallback">

                                        @csrf
                                        <div class="main-cont"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="rateAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить оценку</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('profile.add-rate')}}" method="post"
                                  class="js-ajax bs-validate" novalidate
                                  data-ajax-update-url="false"
                                  data-ajax-show-loading-icon="true"

                                  data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                                  data-error-toast-delay="3000"
                                  data-error-toast-position="top-center"

                                  data-error-scroll-up="false"
                                  {{--                                  id="addForm"--}}
                                  data-ajax-callback-function="filmAddCallback">
                                @csrf
                                <select class="form-select" name="movie" aria-label="Пример выбора по умолчанию"
                                        required>
                                    <option selected disabled>Выберите фильм</option>
                                    @foreach($unrated as $meeting)
                                        <option id="opt-{{$meeting->id}}"
                                                value="{{$meeting->id}}">{{$meeting->name_m}}</option>
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <div class="rating-area">
                                        <input type="radio" id="star-10" name="rating" value="10">
                                        <label for="star-10" title="Оценка «10»"></label>
                                        <input type="radio" id="star-9" name="rating" value="9">
                                        <label for="star-9" title="Оценка «9»"></label>
                                        <input type="radio" id="star-8" name="rating" value="8">
                                        <label for="star-8" title="Оценка «8»"></label>
                                        <input type="radio" id="star-7" name="rating" value="7">
                                        <label for="star-7" title="Оценка «7»"></label>
                                        <input type="radio" id="star-6" name="rating" value="6">
                                        <label for="star-6" title="Оценка «6»"></label>
                                        <input type="radio" id="star-5" name="rating" value="5">
                                        <label for="star-5" title="Оценка «5»"></label>
                                        <input type="radio" id="star-4" name="rating" value="4">
                                        <label for="star-4" title="Оценка «4»"></label>
                                        <input type="radio" id="star-3" name="rating" value="3">
                                        <label for="star-3" title="Оценка «3»"></label>
                                        <input type="radio" id="star-2" name="rating" value="2">
                                        <label for="star-2" title="Оценка «2»"></label>
                                        <input type="radio" id="star-1" name="rating" value="1">
                                        <label for="star-1" title="Оценка «1»"></label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="thirdAddModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить тройку</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="dropdown">
                                    <input type="text" class="search w-100 form-control" id=""
                                           placeholder="Интерстеллар">
                                    <div
                                        class="res-wrapper bg-white border-1 border-gray-500 border-solid rounded-3 w-100 z-index-10 "
                                        style="position: absolute;
    inset: 0px auto auto 0px;
    margin: 0px;
    transform: translate(0px, 53px);">
                                        <div class="results p-2">

                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="mt-4 mx-0 row">
                                <div class="col selected t">

                                </div>
                                <form action="{{route('profile.add-third')}}" method="post" id="thirdadd"
                                      class="js-ajax bs-validate text-center mt-3" novalidate
                                      data-ajax-update-url="false"
                                      data-ajax-show-loading-icon="true"

                                      data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                                      data-error-toast-delay="3000"
                                      data-error-toast-position="top-center"

                                      data-error-scroll-up="false"
                                      {{--                                  id="addForm"--}}
                                      data-ajax-callback-function="filmAddCallback">
                                    @csrf
                                    <div class="content"></div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="pairAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавить пару</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            @if($user->pair->count() == 0)
                                <form action="" method="post">
                                    <div class="dropdown">
                                        <input type="text" class="search w-100 form-control" id="pair"
                                               placeholder="Интерстеллар">
                                        <div
                                            class="res-wrapper bg-white border-1 border-gray-500 border-solid rounded-3 w-100 z-index-10 "
                                            style="position: absolute;
    inset: 0px auto auto 0px;
    margin: 0px;
    transform: translate(0px, 53px);">
                                            <div class="resultss p-2">

                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="mt-4 mx-0 row">
                                    <div class="col selected p">

                                    </div>
                                    <form action="{{route('profile.add-pair')}}" method="post" id="pairadd"
                                                                                class="js-ajax bs-validate text-center mt-3" novalidate
                                          data-ajax-update-url="false"
                                          data-ajax-show-loading-icon="true"

                                          data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!"
                                          data-error-toast-delay="3000"
                                          data-error-toast-position="top-center"

                                          data-error-scroll-up="false"
                                          {{--                                  id="addForm"--}}
                                          data-ajax-callback-function="filmAddCallback">
                                        @csrf
                                        <div class="content"></div>
                                    </form>

                                </div>
                            @else
                                <div class="row text-center">
                                    <p class="text-center">Вы уже отправили пару на модерацию.</p>

                                    <div class="col-6"><img src="{{asset('/images/posters/'.$user->pair[0]->secondMovie->poster)}}"  class="img-fluid rounded" style="width: 150px; height: 200px"alt=""></div>
                                    <div class="col-6"><img src="{{asset('/images/posters/'.$user->pair[0]->firstMovie->poster)}}"  class="img-fluid rounded" style="width: 150px; height: 200px"alt=""></div>
                                    <form action="{{route('profile.delete-pair', $user->pair[0])}}" method="post" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning mt-3" onclick="delete_user_pair({{$user->id}})">Удалить</button>
                                    </form>
                                </div>
                            @endif
                    </div>
                </div>
            </div>


            <div class="col-sm-1"></div>
        </div>
        @if($quiz->count())
            <div class="row mt-2">
                <div class="col-sm-1"></div>
                <div class="col-md-10 col-12">
                    <p class="h4">Прогресс викторины</p>
                    <table class="table table-dark-profile table-dark m-0 table-responsive"
                           data-lng-empty="No data available in table"
                           data-lng-page-info="Отражены оценки с  _START_ по _END_ из _TOTAL_"
                           data-lng-filtered="(filtered from _MAX_ total entries)"
                           data-lng-loading="Loading..."
                           data-lng-processing="Processing..."
                           data-lng-search="Search..."
                           data-lng-norecords="No matching records found"
                           data-lng-sort-ascending=": activate to sort column ascending"
                           data-lng-sort-descending=": activate to sort column descending"

                           data-main-search="false"
                           data-column-search="false"
                           data-row-reorder="false"
                           data-col-reorder="false"
                           data-responsive="true"
                           data-header-fixed="false"
                           data-select-onclick="false"
                           data-enable-paging="false"
                           data-enable-col-sorting="true"
                           data-autofill="false"
                           data-group="false"
                           data-items-per-page="10"

                           data-enable-column-visibility="false"
                           data-lng-column-visibility="Column Visibility"

                           data-enable-export="false"
                           data-custom-config='{}'>
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Лучший результат</th>
                            <th>Количество попыток</th>
                            <th>Медали</th>
                            @if(auth()->id() == $user->id)
                                <th></th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quiz as $progress)
                            <tr>
                                <td>
                                    <a href="{{route('quiz', $progress->quiz->alias)}}" class="link-warning">
                                        {{$progress->quiz->title}}
                                    </a>
                                </td>
                                <td>{{$progress->points}}</td>
                                <td>{{$progress->attempt}}</td>
                                <td>
                                    @php $rank = $progress->medals()->count() @endphp
                                    <div class="d-flex justify-content-evenly   ">
                                        <x-medal class=" {{($rank and $rank > 0) ? '' : 'fill-inactive'}} fill-brown avatar" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Пройдено 60%"></x-medal>
                                        <x-medal class=" {{($rank and $rank > 1) ? '' : 'fill-inactive'}} fill-gray-200 avatar" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Пройдено 80%"></x-medal>
                                        <x-medal class=" {{($rank and $rank == 3) ? '' : 'fill-inactive'}} fill-warning avatar" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Пройдено 95%"></x-medal>
                                    </div>
                                </td>
                                @if(auth()->id() == $user->id)
                                    <td class="text-center">
                                        @if($progress->date_cert)
                                            <a target="_blank" class="link-secondary" href="{{asset('/certs/'.$progress->id.'.pdf')}}">
                                                <i class="fi fi-arrow-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>

        @endif
        @if($user->isExpert())
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10 mt-3">
                    <div class="mx-2">
                        <div class="row">
                            <div class="col">
                                <p class="h2">Упущенные возможности <span
                                        class="badge bg-secondary-soft fs-10p align-top cursor-pointer"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        title="Список фильмов, которые {{$user->name}} выставлял, но которые не были выбраны">?</span>
                                </p>
                            </div>
                        </div>
                        <div class="row selected overflow-hidden">
                            <div class="your-class mb-0" style="height: 250px;">
                                @foreach($advices as $movie)
                                    <div class="slide-cust" style="">
                                        <a href="{{$movie->url}}" target="_blank">
                                            <img src="{{asset('images/posters/'.$movie->poster)}}" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-sm-1"></div>
                <div class="col-md-10 col-12">
                    <p class="h4">{{auth()->id() == $user->id ? 'Мои оценки' : 'Оценки '.$user->name}}</p>
                    <table class="table-datatable table table-dark-profile table-dark m-0 table-responsive"
                           data-lng-empty="No data available in table"
                           data-lng-page-info="Отражены оценки с  _START_ по _END_ из _TOTAL_"
                           data-lng-filtered="(filtered from _MAX_ total entries)"
                           data-lng-loading="Loading..."
                           data-lng-processing="Processing..."
                           data-lng-search="Search..."
                           data-lng-norecords="No matching records found"
                           data-lng-sort-ascending=": activate to sort column ascending"
                           data-lng-sort-descending=": activate to sort column descending"

                           data-main-search="false"
                           data-column-search="false"
                           data-row-reorder="false"
                           data-col-reorder="false"
                           data-responsive="true"
                           data-header-fixed="false"
                           data-select-onclick="false"
                           data-enable-paging="false"
                           data-enable-col-sorting="true"
                           data-autofill="false"
                           data-group="false"
                           data-items-per-page="10"
                           data-order='[ 1, "desc" ]'
                           data-enable-column-visibility="false"
                           data-lng-column-visibility="Column Visibility"

                           data-enable-export="false"
                           data-custom-config='{}'>
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Оценка</th>
                            <th>Средний балл</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->rates as $rate)
                            <tr>
                                <td class="table-dark"><a class="mov-nam"
                                                          href="{{$rate->meeting->movie->url}}">{{$rate->meeting->movie->name_m}}</a>
                                </td>
                                <td class="rate-ch align-middle">{{$rate->rate}}</td>

                                <td class="rate-ch align-middle">{{$rate->meeting->movie->our_rate}}</td>
                                @if(auth()->id() == $user->id)
                                    <td>
                                        <a href="{{route('profile.delete-rate', $rate)}}"
                                           data-href="{{route('profile.delete-rate', $rate)}}"
                                           class="js-ajax-confirm btn"

                                           data-ajax-confirm-mode="ajax"
                                           data-ajax-confirm-type="danger"

                                           data-ajax-confirm-title="Подтвердите действие"
                                           data-ajax-confirm-body="Вы уверены, что хотите удалить оценку?"

                                           data-ajax-confirm-btn-yes-class="btn-sm btn-danger"
                                           data-ajax-confirm-btn-yes-text="Удалить"
                                           data-ajax-confirm-btn-yes-icon="fi fi-check"

                                           data-ajax-confirm-btn-no-class="btn-sm btn-light"
                                           data-ajax-confirm-btn-no-text="Отменить"
                                           data-ajax-confirm-btn-no-icon="fi fi-close"
                                           data-ajax-confirm-callback-function="my_confirm_callback">
                                            <i class="fi fi-thrash text-danger"></i>
                                        </a>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-1"></div>
            </div>
        @endif

    </div>
    </div>
@endsection
