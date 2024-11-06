@extends('admin.layout')

@section('content')
    <div class="container my-3">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{route('admin.posts.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Заголовок</label>
                            <input type="text"  value="{{ old('title') }}" name="title" placeholder="О чем на самом деле семь психопатов?" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="alias" class="form-label">Алиас</label>
                            <input type="text" name="alias" class="form-control" id="alias" value="{{ old('alias') }}" placeholder="/o-chem-na-samom-dele-sem-psikhopatov">
                        </div>
                        @error('alias')
                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>

                        @enderror

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea class="summernote-editor w-100"
                                  data-summernote-config='{
		"placeholder":	"Type here...",
		"focus":		false,
		"lang":			"en-US",
		"minHeight":	 300,
		"maxHeight":	 1500,

		" styleTags": ["h2","h3","h4","h5","h6"

			,{
				"title"		:"Paragraph",
				"tag"		:"p",
				"value"		:"p",
				"className"	:""
			}

			,{
				"title"		:"Paragraph Lead",
				"tag"		:"p",
				"value"		:"p",
				"className"	:"lead"
			}

		],

		"toolbar": [
			["font", ["bold", "italic", "underline", "clear"]],
			["para", ["ul", "ol", "paragraph"]],
			["insert", ["link", "picture", "video", "hr"]],
			["view", ["fullscreen", "codeview", "help"]]
		],

		"disableDragAndDrop":	 false,
		"codeviewFilter":		 false,
		"codeviewIframeFilter":	 true
	}' name="text"
                                  data-ajax-url="https://imdibil.ru/api/uploadImage"
                                  data-ajax-params="['action','upload']['param2','value2']"

                        >{{ old('text') }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">

                            <!--

                                NOTE:
                                    data-name="product_id[]"
                                    Is used to generate hidden input fields for each item added to the list
                                    If not provided, name="..." attribute is used!
                                    If none of them found, "item[]" is used by default for input hidden fields!
                            -->
                            <label for="input_product" class="form-label">Фильм</label>

                            <input type="text" class="form-control input-suggest" id="input_product" value=""
                                   placeholder="Product Search..."
                                   data-name="movie_id"
                                   data-input-suggest-mode="append"
                                   data-input-suggest-typing-delay="300"
                                   data-input-suggest-typing-min-char="3"
                                   data-input-suggest-append-container="#inputSuggestContainer"
                                   data-input-suggest-ajax-url="https://imdibil.ru/api/search/movie"
                                   data-input-suggest-ajax-method="GET"
                                   data-input-suggest-ajax-action="key"
                                   data-input-suggest-ajax-limit="1">

                            <small class="d-block text-muted">* min. 3 characters</small>

                        </div>

                        <!-- append data -->
                        <div id="inputSuggestContainer" class="sortable">


                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class=" mt-3">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
