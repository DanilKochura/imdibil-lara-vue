@extends('admin.layout')

@section('content')
    <div class="container mt-2">
        <div class="row mb-3">
            <form action="{{route('admin.quiz.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-2">
                    <div class="col-5">
                        <label for="site_name" class="col-form-label"><strong>Вопрос </strong><span class="text-sm text-secondary">*необязательное поле</span></label>
                        <input id="site_name" class="form-control form-control-sm" name="text" value="" type="text" autocomplete="off">
                    </div>
                    <div class="col-5">
                        <label for="image" class="col-form-label"><strong>Картинка</strong> <small class="text-danger text-decoration-underline">Максимальный размер картинки 500 кб.</small></label>
                        <input id="image" class="form-control form-control-sm" name="image" type="file">
                    </div>
                        <input type="hidden" value="{{$quiz->id}}" name="quiz_id">
                    <div class="col-2">
                        <label for="timing" class="col-form-label"><strong>Время</strong></label>
                        <input id="timing" class="form-control form-control" name="time" value="{{$quiz->time}}" type="number" autocomplete="off">
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

        <div class="row">
            <div class="col-12">
                <table class="table-datatable table table-bordered table-hover table-striped"
                       data-lng-empty="No data available in table"
                       data-lng-page-info="Showing _START_ to _END_ of _TOTAL_ entries"
                       data-lng-filtered="(filtered from _MAX_ total entries)"
                       data-lng-loading="Loading..."
                       data-lng-processing="Processing..."
                       data-lng-search="Search..."
                       data-lng-norecords="No matching records found"
                       data-lng-sort-ascending=": activate to sort column ascending"
                       data-lng-sort-descending=": activate to sort column descending"

                       data-main-search="true"
                       data-column-search="false"
                       data-row-reorder="false"
                       data-col-reorder="true"
                       data-responsive="true"
                       data-header-fixed="true"
                       data-select-onclick="true"
                       data-enable-paging="true"
                       data-enable-col-sorting="true"
                       data-autofill="false"
                       data-group="false"
                       data-items-per-page="10"

                       data-enable-column-visibility="true"
                       data-lng-column-visibility="Column Visibility"

                       data-enable-export="true"
                       data-lng-export="<i class='fi fi-squared-dots fs-5 lh-1'></i>"
                       data-lng-csv="CSV"
                       data-lng-pdf="PDF"
                       data-lng-xls="XLS"
                       data-lng-copy="Copy"
                       data-lng-print="Print"
                       data-lng-all="All"
                       data-export-pdf-disable-mobile="true"
                       data-export='["csv", "pdf", "xls"]'
                       data-options='["copy", "print"]'

                       data-custom-config='{}'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Вариант 1</th>
                            <th>Вариант 2</th>
                            <th>Вариант 3</th>
                            <th>Вариант 4</th>
                            <th>Таймер</th>
                            <th>Картнка</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quiz->questions as $question)
                            <tr>
                                <td>{{$question->id}}</td>
                                @foreach($question->answers as $answer)
                                    <td class="{{$answer->correct ? 'text-success fw-bold' : ''}}">{{$answer->text}}</td>
                                    @endforeach
                                <td>{{$question->time}}</td>
                                <td>
                                    <a class="fancybox" href="{{asset('images/quiz/'.$question->image)}}">
                                        <!-- thumbnail -->
                                        <img src="{{asset('images/quiz/'.$question->image)}}" alt="" class="img-fluid"></td>

                                </a>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


@endsection
