@extends('admin.layout')


@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('admin.quiz.update-quiz', $quiz)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="title" class="col-form-label"><strong>Заголовок</strong></label>
                            <input id="title" class="form-control form-control-sm" name="title"
                                   value="{{ $quiz->title }}" type="text" autocomplete="off">

                            @if($errors->has('title'))
                                <div>
                                    <span
                                        class="invalid-feedback d-block"><strong>{{ $errors->first('title') }}</strong></span>

                                </div>
                            @endif </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="text" class="col-form-label"><strong>Текст для карточки</strong></label>
                            <input id="text" class="form-control form-control-sm" name="text" value="{{ $quiz->text }}"
                                   type="text" autocomplete="off">
                            @if($errors->has('text'))
                                <span
                                    class="invalid-feedback d-block"><strong>{{ $errors->first('text') }}</strong></span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="form-group">

                            <label for="text_preview" class="col-form-label"><strong>Превью</strong></label>
                            <input id="text_preview" class="form-control form-control-sm" name="text_preview"
                                   value="{{ $quiz->text_preview }}" type="text" autocomplete="off">
                            @if($errors->has('text_preview'))
                                <span
                                    class="invalid-feedback d-block"><strong>{{ $errors->first('text_preview') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">
                        <label for="difSel" class="col-form-label"><strong>Категория</strong></label>
                        <select class="form-select" name="type" id="difSel">
                            <option value="1" {{ $quiz->type == '1' ? 'selected' : 'disabled' }}>Стандартная</option>
                            <option value="2" {{ $quiz->type == '2' ? 'selected' : 'disabled' }}>Тематические</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <div class="form-group">

                            <label for="alias" class="col-form-label"><strong>Алиас</strong></label>
                            <input id="alias" class="form-control form-control-sm" name="alias"
                                   value="{{ $quiz->alias }}" type="text" autocomplete="off">
                            @if($errors->has('alias'))
                                <span
                                    class="invalid-feedback d-block"><strong>{{ $errors->first('alias') }}</strong></span>
                            @endif
                        </div>

                    </div>
                    <div class="col-2">
                        <label for="time" class="col-form-label"><strong>Таймер</strong></label>
                        <input id="time" class="form-control form-control-sm" name="time"
                               value="{{ $quiz->time }}" type="number" autocomplete="off">

                    </div>
                    <div class="col-2">
                        <label for="errors" class="col-form-label"><strong>Ошибки</strong></label>
                        <input id="errors" class="form-control form-control-sm" name="errors"
                               value="{{ $quiz->errors }}" type="number" autocomplete="off">
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <div class="form-group">
                            <label for="image" class="col-form-label"><strong>Картинка</strong> <small
                                    class="text-danger text-decoration-underline">Максимальный размер картинки 500
                                    кб.</small></label>
                            <input id="image" class="form-control form-control-sm" name="image" type="file"
                                   value="{{ $quiz->image }}">
                            <img src="{{asset('images/quiz/'.$quiz->image)}}" alt="" class="img-fluid">
                            @if($errors->has('image'))
                                <span
                                    class="invalid-feedback d-block"><strong>{{ $errors->first('image') }}</strong></span>
                            @endif
                        </div>

                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label class="d-flex align-items-center mb-3">
                            <input class="d-none-cloaked" type="checkbox" name="sum" value="1" {{$quiz->sum ? 'checked' :''}}>
                            <i class="switch-icon"></i>
                            <span class="px-3 user-select-none"> Суммировать время</span>
                        </label>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label class="d-flex align-items-center mb-3">
                            <input class="d-none-cloaked" type="checkbox" name="status" value="1" {{$quiz->status ? 'checked' :''}}>
                            <i class="switch-icon"></i>
                            <span class="px-3 user-select-none">Статус</span>
                        </label>
                    </div>
                </div>


                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection
