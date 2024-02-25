@extends('admin.layout')


@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('admin.quiz.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="site_name" class="col-form-label"><strong>Вопрос</strong></label>
                        <input id="site_name" class="form-control form-control-sm" name="text" value="" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="image" class="col-form-label"><strong>Картинка</strong> <small class="text-danger text-decoration-underline">Максимальный размер картинки 500 кб.</small></label>
                        <input id="image" class="form-control form-control-sm" name="image" type="file">
                    </div>
                    <div class="col-3">
                        <label for="difSel" class="col-form-label"><strong>Тип вопроса</strong></label>
                        <select class="form-select" name="quiz_id" id="difSel">
                            @foreach($quizzes as $quiz)
                                <option value="{{$quiz->id}}" {{$quiz->id == 1 ? 'selected' : ''}}>{{$quiz->alias}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="timing" class="col-form-label"><strong>Время</strong></label>
                        <input id="timing" class="form-control form-control" name="time" value="15" type="number" autocomplete="off">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-12">
                        @for($i = 0; $i < 4; $i++)
                            <div class="row align-items-end">
                                <div class="col-6">
                                    <label for="answer{{ $i+1 }}" class="col-form-label"><strong>Вариант {{ $i+1 }}</strong></label>
                                    <input id="answer{{ $i+1 }}" class="form-control form-control-sm" name="answer[{{ $i+1 }}]" value="{{ old("answer.".($i+1)) }}" type="text" autocomplete="off">
                                </div>
                                <div class="col-1">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-check-input-primary" type="radio" name="correct" id="inlineRadio1{{ $i+1 }}" value="{{ $i+1 }}">
                                        <label class="form-check-label" for="inlineRadio1{{ $i+1 }}">Верный</label>
                                    </div>

                                </div>
                            </div>
                        @endfor

                            @error('correct')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                </div>


                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>


@endsection
