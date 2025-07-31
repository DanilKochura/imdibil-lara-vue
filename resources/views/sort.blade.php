<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta')
    <meta name="yandex-verification" content="242eb7336dec418c"/>
    <!-- Bootstrap CSS -->
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor_bundle.min.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.datatables.css">--}}
    {{--    <link rel="stylesheet" href="https://imdibil.ru/scheduler/assets/css/vendor.fancybox.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/css/core.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/vendor_bundle.min.css')}}">
    <script src="https://imdibil.ru/js/core.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Стили для элемента перетаскивания */
        .sort-handle {
            cursor: move;
            margin-right: 10px;
        }

        /* Стили для отображения постера */
        .poster {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }

        /* Стили для номера строки */
        .row-number {
            width: 30px;
            display: inline-block;
            text-align: center;
            margin-right: 10px;
        }


    </style>
</head>
<body class="bg-dark">

    <div class="container mt-4">
        @if(!$rates->count())
            <ul id="movieList" class="list-group">
                @foreach($movies as $key=>$movie)
                    <li class="list-group-item d-flex align-items-center justify-content-between" data-id="{{$movie->movie->id}}">

                        <div class="d-flex align-items-center">
                            <div class="row-number">{{$key+1}}</div>
                            <img class="poster" src="{{asset('images/posters/' . $movie->movie->poster)}}" alt="Постер фильма 1">
                            <div>
                                <a href="{{$movie->movie->url}}" target="_blank">
                                    <span class="movie-title">{{$movie->movie->name_m}}</span>
                                </a>
                            </div>
                            <span></span>
                        </div>
                        <div>
                            <span class="sort-points mx-2">0</span>
                        <span class="sort-handle">
                      <i class="fi fi-list"></i>
                    </span>
                        </div>
                    </li>
                @endforeach
            </ul>
            <button id="confirmBtn" class="btn btn-primary mt-3">Подтвердить</button>
        @else
            <p>Ты уже оставил голос. Удалить его?</p>
            <form action="{{route('deleteVote')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        @endif
    </div>

    <!-- Подключение jQuery -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Подключение jQuery UI Touch Punch для поддержки сенсорных событий -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <!-- Подключение Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $("#movieList").sortable({
                handle: ".sort-handle",
                update: updateRowNumbers
            });

            function updateRowNumbers() {
                let points = [
                    0, 20, 18, 16, 13, 12, 11,10, 9, 8, 7, 6, 5, 4, 3, 2, 1
                ]
                $("#movieList li").each(function(index) {
                    $(this).find(".row-number").text(index + 1);
                    if(index+1 > 16) {
                        $(this).find('.sort-points').text('')
                        $(this).addClass('bg-danger-soft')
                    } else
                    {
                        $(this).find('.sort-points').text(points[index+1])
                        $(this).removeClass('bg-danger-soft')
                    }
                });
            }

            updateRowNumbers();

            $("#confirmBtn").click(function() {
                let sequence = [];
                $("#movieList li").each(function() {
                    sequence.push($(this).data("id"));
                });
                let jsonResult = JSON.stringify(sequence);
                console.log("Выбранная последовательность:", jsonResult);
                $.ajax({
                        url: '/api/sortfix',
                        method: 'post',
                        dataType: 'json',
                        data: {select: jsonResult, id: {{auth()->id()}}},
                        success: function(data){
                            console.log(data)
                            alert(data.message)
                            setTimeout(function () {
                                window.location.href = '/sorted'
                            }, 1000
                            )
                        },
                    error: function(error){
                        console.log(error)
                    }
                })
            });
        });
    </script>
</div>
<link rel="stylesheet" href="https://imdibil.ru/js/vendor_bundle.min.js">
<link rel="stylesheet" href="https://imdibil.ru/js/vendor.aos.js">
</body>
</html>

