@extends('admin.layout')


@section('content')
    <div class="container mt-5">
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
               data-items-per-page="50"

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
                <th>Картинка2</th>
                <th>Название</th>
                <th>КК</th>
                <th>Год</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{$movie->id}}</td>
                    <td>{{asset('/images/posters/'.$movie->poster)}}</td>
                    <td>{{$movie->poster_horizontal}}</td>
{{--                    <td><img src="{{asset('/images/posters/'.$movie->poster)}}"  class="img-fluid" style="max-width:400px; image-rendering: optimizeSpeed " alt=""></td>--}}
{{--                    <td><img src="{{asset('/images/posters/'.$movie->poster_horizontal)}}"  class="img-fluid" style="max-width:400px " alt=""></td>--}}
                    <td>{{$movie->name_m}}</td>
                    <td>{{$meetings->contains($movie->id) ? 'да' : 'нет'}}</td>
                    <td>{{$movie->year_of_cr}}</td>

                    <td>
                        <div class="d-flex flex-column align-items-center">
                            <div>
                                <a href="{{route('admin.movies.edit', $movie)}}" class="btn  rounded-circle btn-outline-primary mb-2">
                                    <i class="fi fi-pencil"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
