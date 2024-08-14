@extends('admin.layout')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <form action="{{route('admin.movies.update', $movie)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Название</label>
                    <input type="text" disabled class="form-control" id="exampleFormControlInput1" value="{{$movie->name_m}}">
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="">Постер</label>
                            <input type="file" name="poster"
                                   data-file-ext="jpg, png, gif, mp3"
                                   data-file-max-size-kb-per-file="30000"
                                   data-file-ext-err-msg="Allowed:"
                                   data-file-size-err-item-msg="File too large!"
                                   data-file-size-err-total-msg="Total allowed size exceeded!"
                                   data-file-toast-position="bottom-center"
                                   data-file-preview-container=".js-file-input-preview-single-container2"
                                   data-file-preview-img-height="auto"
                                   data-file-preview-show-info="false"
                                   data-file-btn-clear="a.js-file-upload-clear2"
                                   class="form-control">

                        </div>

                        <div class="js-file-input-preview-single-container2 ms--n6 me--n6 mt-4 hide-empty">
                            <span data-id="0" data-file-name="maxresdefault.jpg" data-file-size="151024" id="rand_Tzk" class="js-file-input-item bulkNo_w7EXJMpe d-inline-block position-relative overflow-hidden text-center show-hover-container shadow-md m-2 rounded" style="min-width: 100%; min-height: 100%; width: auto; height: auto;"><img src="{{asset('images/posters/'.$movie->poster)}}" alt="" class="animate-bouncein js-file-input-preview mw-100 img-fluid" height="auto"></span>
                        </div>

                        <!--
                            clear files button
                            hidden by default
                        -->
                        <div class="mt-1">
                            <a href="#" class="hide js-file-upload-clear2 btn btn-light btn-sm">
                                Remove Image
                            </a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb-3">
                            <label for="">Постер горизонтальный</label>

                            <input type="file" name="poster_horizontal"
                                   data-file-ext="jpg, png, gif, mp3, webp"
                                   data-file-max-size-kb-per-file="30000"
                                   data-file-ext-err-msg="Allowed:"
                                   data-file-size-err-item-msg="File too large!"
                                   data-file-size-err-total-msg="Total allowed size exceeded!"
                                   data-file-toast-position="bottom-center"
                                   data-file-preview-container=".js-file-input-preview-single-container3"
                                   data-file-preview-img-height="auto"
                                   data-file-preview-show-info="false"
                                   data-file-btn-clear="a.js-file-upload-clear3"
                                   class="form-control">

                        </div>

                        <div class="js-file-input-preview-single-container3 ms--n6 me--n6 mt-4 hide-empty">
                           @if($movie->poster_horizontal)
                                <span data-id="0" data-file-name="maxresdefault.jpg" data-file-size="151024" id="rand_Tzk" class="js-file-input-item bulkNo_w7EXJMpe d-inline-block position-relative overflow-hidden text-center show-hover-container shadow-md m-2 rounded" style="min-width: 100%; min-height: 100%; width: auto; height: auto;"><img src="{{asset('images/posters/'.$movie->poster_horizontal)}}" alt="" class="animate-bouncein js-file-input-preview mw-100 img-fluid" height="auto"></span>
                           @endif
                        </div>

                        <!--
                            clear files button
                            hidden by default
                        -->
                        <div class="mt-1">
                            <a href="#" class="hide js-file-upload-clear3 btn btn-light btn-sm">
                                Remove Image
                            </a>
                        </div>
                    </div>
                </div>

                <div class=" mt-3">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>

@endsection
