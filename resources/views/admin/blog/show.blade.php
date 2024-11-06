@extends('admin.layout')


@section('content')
    <div class="container">
        <div class="row my-4">
            <div class="col-3">
                <a href="{{route('admin.posts.create')}}" class="btn btn-success">Новый пост</a>
            </div>
        </div>
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

               data-enable-export="false"
               data-lng-export="<i class='fi fi-squared-dots fs-5 lh-1'></i>"
{{--               data-lng-csv="CSV"--}}
{{--               data-lng-pdf="PDF"--}}
{{--               data-lng-xls="XLS"--}}
{{--               data-lng-copy="Copy"--}}
{{--               data-lng-print="Print"--}}
{{--               data-lng-all="All"--}}
               data-export-pdf-disable-mobile="true"
               data-export='["csv", "pdf", "xls"]'
               data-options='["copy", "print"]'

               data-custom-config='{}'>
            <thead>
            <tr>
                <th>ID</th>
                <th>Картинка</th>
                <th>Ответы</th>
                <th>Сложность</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
{{--                    <td><img src="{{asset('/images/quiz/'.$post->image)}}"  class="img-fluid" style="max-width:400px " alt=""></td>--}}
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        {{$post->text}}
                    </td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
