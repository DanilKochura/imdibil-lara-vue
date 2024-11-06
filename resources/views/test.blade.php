<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
{{--    <meta name="description" content="Киновикторина - {{$quiz['title']}}. {{$quiz['text']}}">--}}
{{--    <title>Викторина {{$quiz['title']}}</title>--}}
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>
    <title>IMDibil</title>
    @if(auth()->check())
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif
    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">
{{--    <script defer="defer" src="{{asset('/build/js/chunk-vendors.38a12871.js')}}"></script>--}}
{{--    <script defer="defer" src="{{asset('/build/js/app.efcba95f.js')}}"></script>--}}
{{--    <link href="{{asset('/build/css/app.3c78f6a9.css')}}" rel="stylesheet">--}}
    @include('components.counters')

</head>
<body class="" style="background-color: #595959">


<div id="app" v-quiz="">
    <character-quiz-app></character-quiz-app>
</div>

</body>
</html>
