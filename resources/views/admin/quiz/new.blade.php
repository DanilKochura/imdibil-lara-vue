@extends('admin.layout')


@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('admin.quiz.save-quiz')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="name" class="col-form-label"><strong>Заголовок</strong></label>
                        <input id="name" class="form-control form-control-sm" name="name" value="" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="text" class="col-form-label"><strong>Текст для карточки</strong></label>
                        <input id="text" class="form-control form-control-sm" name="text" value="" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="text_preview" class="col-form-label"><strong>Превью</strong></label>
                        <input id="text_preview" class="form-control form-control-sm" name="text_preview" value="" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-12">
                        <label for="alias" class="col-form-label"><strong>Алиас</strong></label>
                        <input id="alias" class="form-control form-control-sm" name="alias" value="" type="text" autocomplete="off">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="image" class="col-form-label"><strong>Картинка</strong> <small class="text-danger text-decoration-underline">Максимальный размер картинки 500 кб.</small></label>
                        <input id="image" class="form-control form-control-sm" name="image" type="file">
                    </div>
                    <div class="col-3">
                        <label for="difSel" class="col-form-label"><strong>Категория</strong></label>
                        <select class="form-select" name="type" id="difSel">
                            <option value="1" selected>Стандартная</option>
                        </select>
                    </div>
                </div>


                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>


@endsection
