@extends('admin.layout')


@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-5">
                <a href="{{route('admin.quiz.new')}}" class="btn btn-success">Создать викторину</a>
            </div>
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Опсание</th>
                            <th>Алиас</th>
                            <th>Картинка</th>
                            <th>Таймер</th>
                            <th>Суммирутся</th>
                            <th>Ошибки</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td>{{$quiz->id}}</td>
                                <td>{{$quiz->title}}</td>
                                <td>{{$quiz->text}}</td>
                                <td>{{$quiz->alias}}</td>
                                <td><img src="{{asset('images/quiz/'.$quiz->image)}}" alt="" class="img-fluid"></td>
                                <td>{{$quiz->time}}</td>
{{--                                <td>{{$quiz->questions->count()}}</td>--}}
                                <td>{{$quiz->sum}}</td>
                                <td>{{$quiz->errors}}</td>
                                <td>
                                    <a href="{{route('admin.quiz.questions', $quiz)}}" class="btn  rounded-circle btn-outline-success mb-2">
                                        <i class="fi fi-plus"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
