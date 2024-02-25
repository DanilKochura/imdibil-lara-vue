<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Информационный портал киноклуба">
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <script src="{{asset('/js/callbacks.js')}}"></script>
    <title>IMDibil</title>
    @if(auth()->check())
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    @endif
    <link rel="shortcut icon" href="https://imdibil.ru/image/favicon.ico" type="image/x-icon">
    <script defer="defer" src="{{asset('/build/js/chunk-vendors.1ee941d0.js')}}"></script>
    <script defer="defer" src="{{asset('/build/js/app.7a50e775.js')}}"></script>
    <link href="{{asset('/build/css/app.8579c552.css')}}" rel="stylesheet">

</head>
<body class="" style="background-color: #595959">


<div id="app" v-quiz="{{$quiz}}">
</div>

</body>
</html>
