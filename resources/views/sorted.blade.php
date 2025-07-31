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
    <link rel="stylesheet" href="{{ asset('/css/stylesheet.css')}}">
    <script src="https://imdibil.ru/js/core.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Стили для элемента перетаскивания */
        .poster {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
        .row-number {
            width: 30px;
            text-align: center;
            margin-right: 10px;
        }
        .points {
            font-weight: bold;
            margin-left: 15px;
        }
        .position-change {
            margin-left: 10px;
        }
        /* Пример стилей для иконок изменения позиций */
        .change-up {
            color: green;
        }
        .change-down {
            color: red;
        }
        .change-none {
            color: gray;
        }


    </style>
</head>
<body class="bg-dark">
<div class="container mt-4">
    <ul id="movieList" class="list-group">
        <!-- Элементы списка будут динамически заполнены -->
    </ul>
</div>

<!-- Подключение jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Подключение jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Подключение jQuery UI Touch Punch для поддержки сенсорных событий -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
<!-- Подключение Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function() {
        let movies_global = [];

        // Функция для отрисовки списка фильмов по данным
        function renderMovieList(movies) {
            const $list = $("#movieList");


            // Сортировка по позиции, если необходимо
            movies.sort((a, b) => a.position - b.position);
            let skip = true
            for(let i = 0; i < movies.length; i++) {
                let movie = movies[i]
                if(movies_global.length === 0)
                {
                    skip = false;
                    break
                }
                let obj = movies_global.find( x => x.id === movie.id);
                let position_change = movie.position - obj.position

                if(position_change !== 0 && !isNaN(position_change))
                {
                    console.log(obj)
                    console.log(movie.position, obj.position)
                    console.log(movie)
                    skip = false
                    break
                }
            }


            if (skip === false)
            {
                console.log('here')
                $list.empty();
                movies.forEach((movie, index) => {
                    // Определение иконки для изменения позиции
                    let changeIcon = '';
                    let position_change = 0
                    let changeClass = 'change-none';



                    let obj = movies_global.find( x => x.id === movie.id);
                    if (obj) position_change = movie.position - obj.position
                    if (position_change < 0) {
                        // Фильм поднялся вверх
                        changeIcon = '↑'; // Замените на иконку по вашему выбору
                        changeClass = 'change-up';
                    } else if (position_change > 0) {
                        // Фильм опустился вниз
                        changeIcon = '↓'; // Замените на иконку по вашему выбору
                        changeClass = 'change-down';
                    } else {
                        // Без изменений
                        changeIcon = '→'; // Замените на иконку по вашему выбору
                        changeClass = 'change-none';
                    }

                    const $li = $(`
            <li class="list-group-item d-flex align-items-center justify-content-between" data-id="${movie.id}">
              <div class="d-flex align-items-center">
                <div class="row-number">${index + 1}</div>
                <img class="poster" src="${movie.poster}" alt="Постер фильма ${movie.name}">
                <div>
                  <a href="${movie.link}" target="_blank">
                    <span class="movie-title">${movie.name}</span>
                  </a>
                  <span class="points">Очки: ${movie.points}</span>
                </div>
                <span class="position-change ${changeClass}" title="Изменение позиции">${changeIcon}</span>
              </div>
            </li>
          `);
                    if(index > 15)
                    {
                        $li.addClass('bg-danger-soft')
                    }
                    $list.append($li);
                });
                movies_global = movies;
            }
        }

        // Функция для получения списка фильмов с сервера
        function fetchMovies() {
            $.ajax({
                url: "/getsorted", // замените на URL вашего API
                method: "GET",
                dataType: "json",
                success: function(data) {
                    renderMovieList(data);
                },
                error: function(xhr, status, error) {
                    console.error("Ошибка при загрузке фильмов:", error);
                }
            });
        }

        // Начальная загрузка списка фильмов при загрузке страницы
        fetchMovies();

        // Обновление списка каждые 5 секунд
        setInterval(fetchMovies, 5000);
    });
</script>
<link rel="stylesheet" href="https://imdibil.ru/js/vendor_bundle.min.js">
<link rel="stylesheet" href="https://imdibil.ru/js/vendor.aos.js">
</body>
</html>

