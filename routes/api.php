<?php

use App\Models\Third;
use App\Models\User;
use App\UseCases\ActivityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Phpml\Classification\SVC;
use Phpml\Dataset\ArrayDataset;
use Phpml\Preprocessing\LabelEncoder;
use Phpml\Preprocessing\OneHotEncoder;
use Phpml\Regression\LeastSquares;
use Phpml\Regression\SVR;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth')->group(function ()
{
    Route::post('/vote', [\App\Http\Controllers\VoteController::class, 'vote'])->name('vote-pair');

});

Route::prefix("/api")->group(function () {
});
Route::get('/rates', [\App\Http\Controllers\Api\MainController::class, 'index']);
Route::get('/search/movie', [\App\Http\Controllers\Api\MainController::class, 'movies'])->name('search.movie');
Route::post('/uploadImage', [\App\UseCases\UploadImage::class, 'uploadImage']);

Route::get('/quiz/{difficulty}', [\App\Http\Controllers\Api\QuizController::class, 'index']);
Route::get('/quiz-test/{difficulty?}', [\App\Http\Controllers\Api\QuizController::class, 'counter']);

Route::prefix('/statistics')->group(function () {
    Route::get('user_graph', [\App\Http\Controllers\MainController::class, 'user_graph']);
});

Route::get('/test/questions/1', function (){
    $questions = [
        'Если бы тебе дали выбрать магическое существо в качестве спутника, что бы ты выбрал?' => [
            'Сова — надежный и мудрый друг',
            'Кошка — хитрое и преданное создание',
            'Жаба — что-то непримечательное, но стойкое',
            'Феникс — мощь и перерождение',
            'Змея — скрытное и могущественное создание'
        ],
        'Какой аспект магии тебя интересует больше всего?' => [
            'Защита и заклинания, помогающие другим',
            'Исследование и знания — всегда стремлюсь узнать больше',
            'Темная магия — в ней сила и могущество',
            'Трансфигурация и умение менять вещи',
            'Зелья и хитрость'
        ],
        'Как ты реагируешь на критику?' => [
            'Слушаю и анализирую, чтобы стать лучше',
            'Принимаю близко к сердцу, но стараюсь справиться',
            'Защищаюсь с сарказмом или шуткой',
            'Считаю, что это мнение других не имеет значения',
            'Критикую в ответ и настаиваю на своем'
        ],
        'Какая твоя главная жизненная цель?' => [
            'Защитить и поддерживать близких',
            'Постичь как можно больше знаний',
            'Найти своё место и доказать, что я чего-то стою',
            'Управлять и подчинять, получить власть',
            'Оставить после себя наследие'
        ],
        'Какое твое отношение к правилам?' => [
            'Соблюдаю, если они помогают достичь цели',
            'Нарушаю, если считаю, что так будет лучше',
            'Правила существуют, чтобы их обходить',
            'Правила не нужны, если есть сила',
            'Не особо обращаю внимание на правила — важно, чтобы был смысл'
        ],
        'Как ты обычно реагируешь на неожиданности?' => [
            'Действую быстро и решительно',
            'Думаю наперед и просчитываю последствия',
            'Растерян, но стараюсь сохранять самообладание',
            'Делаю все, чтобы перехватить контроль'
        ],
        'Какой твой любимый предмет в школе?' => [
            'Зельеварение',
            'Трансфигурация',
            'Защита от темных искусств',
            'История магии',
            'Прорицания'
        ],
        'Как ты проводишь каникулы?' => [
            'Читаю книги и саморазвиваюсь',
            'Провожу время с семьей и близкими',
            'Путешествую и открываю новое',
            'Занимаюсь любимыми хобби',
            'Планирую будущее и строю стратегии'
        ],
        'Как бы ты охарактеризовал свою реакцию на опасность?' => [
            'Действую, чтобы защитить других',
            'Анализирую и оцениваю риски',
            'Отступаю, чтобы придумать план',
            'Нападаю, не раздумывая',
            'Действую скрытно и расчетливо'
        ],
        'Какую музыку ты предпочитаешь слушать?' => [
            'Классику и инструментальную музыку',
            'Современные популярные песни',
            'Рок или что-то энергичное',
            'Мистическую и атмосферную',
            'Традиционную и народную музыку'
        ],
        'Какой твой любимый способ провести вечер?' => [
            'Собраться с друзьями и посмеяться',
            'Посмотреть интересный фильм или сериал',
            'Читать или заниматься саморазвитием',
            'Размышлять в одиночестве о будущем',
            'Планировать свои достижения'
        ],
        'Какое твое отношение к новым технологиям?' => [
            'Интересно, но с осторожностью',
            'С энтузиазмом принимаю новое',
            'Равнодушен, если это не важно для меня',
            'Предпочитаю проверенные методы',
            'Изучаю их влияние на общество'
        ],
        'Как ты относишься к выбору между моралью и выгодой?' => [
            'Всегда выбираю мораль',
            'Стремлюсь к компромиссу',
            'Зависит от ситуации',
            'Выбираю выгоду, если это стратегически оправдано',
            'Считаю, что выгода — главный приоритет'
        ],
        'Как ты справляешься с неудачами?' => [
            'Принимаю и учусь на ошибках',
            'Стараюсь забыть и идти дальше',
            'Испытываю сильные переживания',
            'Пытаюсь исправить ситуацию',
            'Использую неудачи как мотивацию'
        ],
        'Какое заклинание тебе ближе всего?' => [
            'Экспеллиармус — обезоруживающее заклинание',
            'Люмос — свет в темноте',
            'Патронус — защита от дементоров',
            'Империо — контроль над другими',
            'Сектумсемпра — скрытая атака'
        ],
        'Как ты относишься к помощи другим людям?' => [
            'Стараюсь помочь всегда, если могу',
            'Помогаю, когда это возможно',
            'Помогаю, если это мои близкие',
            'Помогаю только при взаимной выгоде',
            'Избегаю помощи, чтобы не вмешиваться'
        ],
        'Как ты относишься к тайнам и секретам?' => [
            'Люблю исследовать и узнавать что-то новое',
            'Считаю, что они должны быть раскрыты',
            'Держу свои секреты при себе',
            'Использую их, чтобы манипулировать другими',
            'Изучаю тайны ради власти и могущества'
        ],
        'Какое качество ты ценишь в себе больше всего?' => [
            'Честность и преданность',
            'Интеллект и любознательность',
            'Храбрость и решительность',
            'Проницательность и хитрость',
            'Амбиции и целеустремленность'
        ],
        'Как ты относишься к неординарным людям?' => [
            'С интересом и любопытством',
            'Уважаю их за уникальность',
            'Восхищаюсь их смелостью',
            'Использую их как инструмент',
            'Осторожен и подозрителен'
        ],
        'Как ты воспринимаешь дружбу?' => [
            'Дружба — это поддержка и взаимопомощь',
            'Дружба — это развитие и вдохновение',
            'Дружба — это приключения и веселье',
            'Дружба — это сила и союз',
            'Дружба — это временное удобство'
        ]
    ];
    return response()->json($questions);
});


Route::any('/bot', function () {
    $movie = false;
//    $response = Telegram::getMe();
//    dd($we);
    $bot = new \App\Http\Controllers\TelegramController();
    $bot->handleRequest();
});
Route::any('/bot-test', function () {

    $api = new \Telegram\Bot\Api();
    dd($api->getWebhookInfo());

//    $response = Telegram::getMe();
//    dd($we);
    $bot = new \App\Http\Controllers\TelegramController();
    $bot->handleRequest();
});


Route::get('/find-movie', function (\Illuminate\Http\Request $request) {
    $request = $request->all();
    $url = 'https://api.kinopoisk.dev/v1.4/movie/search?page=1&limit=10&query='.$request['query'];

    $client = new \GuzzleHttp\Client();
    $responseApi = $client->request('GET', $url, [
        'headers' => [
            'X-API-KEY' => 'BJW5RB7-7EPMVH8-HYD1773-4VEDA34',
            'Content-Type' => 'application/json'
            ],
    ]);
    $response = [];
    foreach (json_decode($responseApi->getBody())->docs as $doc)
    {
        $response[] = [
            'name' => $doc->name." (".$doc->year.")",
            'id' => $doc->id
        ];
    }
    dd($response);
});


Route::post('/login', function (Request $request) {

    $request->validate([
        'email' => 'required',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('login', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::prefix('mobile/')->group(function (){
    Route::get('/meetings', [\App\Http\Controllers\Api\Mobile\MainController::class, 'index']);
    Route::get('/stats', [\App\Http\Controllers\Api\Mobile\MainController::class, 'stats']);
    Route::get('/thirds', [\App\Http\Controllers\Api\Mobile\MainController::class, 'thirds']);
    Route::post('/login', function (Request $request) {
        Log::info(print_r($request->all(), 1));
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'device_name' => 'required'
        ]);

        $user = User::where('login', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'no!', 'token' => '', 'user_id' => '']);
        }
        Log::build([
            'driver' => 'daily',
            'path' => storage_path('logs/mobile_login.log'),
        ])->info("Вход в мобильное приложение: ".$user->name." #".$user->id);
        Log::info(json_encode(['token' => $user->createToken($request->device_name)->plainTextToken, 'user_id' => $user->id]));
        return response()->json(['token' => $user->createToken($request->device_name)->plainTextToken, 'user_id' => $user->id]);
    });

    Route::middleware(['auth:sanctum'])->get('profile', [\App\Http\Controllers\Api\Mobile\ProfileController::class, 'index']);
});


Route::get('/user-activity', function (\Illuminate\Http\Request $request){
    $request = $request->all();
    $id = $request['id'];
    $service = new ActivityService(User::find($id));
    $activity = $service->getActivity();
    return response()->json($activity);
});

Route::post('/upload-image/{movie}', [\App\Http\Controllers\Admin\MovieController::class, 'uploadImage'])->name('api.upload_image');


Route::get('/years', function (){
    $arr = [];
    $movies = \App\Models\Movie::all();
    for ($i = 1885; $i < 2021; $i++)
    {
        $arr[] = [
            'year' => $i,
            'poster' => file_exists(public_path('images/history/'.$i.'.png')) ? asset('images/history/'.$i.'.png') : asset('images/posters/'.$movies->random()->poster),
            'preview' => 'Lorem impseum',
            'people' => [],
        ];
    }
    return response()->json($arr);
});

Route::get('/setnulls', function (){
    $meetings = \App\Models\Meeting::all();
    foreach ([30, 120, 122] as $id)
   {
       foreach ($meetings as $meeting)
       {
           \App\Models\Rate::firstOrCreate([
               'user_id' => $id,
               'meeting_id' => $meeting->id
           ], [
               'rate' => null
           ]);
       }
   }
});

Route::get('/predictions/{user}', function (User $user){
    $rates = \App\Models\Rate::with('meeting.movie.genres')->where('user_id', '=', $user->id)->get();
    $data = [];
    $lables = [];
    $labelEncoder = new LabelEncoder();
    $g = \App\Models\Genre::all()->pluck('name_g')->toArray();

    function encodeGenres($genresArray) {
        // Соберем уникальные жанры
        $uniqueGenres = [];
        foreach ($genresArray as $genres) {
            $splitGenres = array_map('trim', explode(',', $genres));
            foreach ($splitGenres as $genre) {
                if (!in_array($genre, $uniqueGenres)) {
                    $uniqueGenres[] = $genre;
                }
            }
        }

        // Создадим закодированные значения для каждого фильма
        $encodedGenres = [];
        foreach ($genresArray as $genres) {
            $splitGenres = array_map('trim', explode(',', $genres));
            $encodedRow = array_fill(0, count($uniqueGenres), 0);
            foreach ($splitGenres as $genre) {
                $index = array_search($genre, $uniqueGenres);
                if ($index !== false) {
                    $encodedRow[$index] = 1;
                }
            }
            $encodedGenres[] = $encodedRow;
        }

        return [$encodedGenres, $uniqueGenres];
    }
    foreach ($rates as $rate) {

        $data[] = [
          $rate->meeting->movie->year_of_cr,
            $rate->meeting->movie->rating,
          $rate->meeting->movie->rating_kp,
         $rate->meeting->movie->duration,
            implode(',', $rate->meeting->movie->genres->pluck('name_g')->toArray()),
            $rate->rate
        ];
        $lables[] = $rate->rate;
    }
//    $Filename ='Level.csv';
//    header('Content-Type: text/csv; charset=utf-8');
//    Header('Content-Type: application/force-download');
//    header('Content-Disposition: attachment; filename='.$Filename.'');
//// create a file pointer connected to the output stream
//    $output = fopen('php://output', 'w');
//    fputcsv($output, ['Year', 'imdb', 'kp', 'duration', 'genres', 'rate']);
//    foreach ($data as $row){
//        fputcsv($output, $row);
//    }
//    die();
    $headers = array_shift($data);
    $genresIndex = array_search('genres', $headers);
    $rateIndex = array_search('rate', $headers);

    $rateIndex  = 5;
    $genresIndex = 4;
    $samples = [];
    $labels = [];
    $genresArray = [];
    foreach ($data as $row) {
        $labels[] = (int)$row[$rateIndex];
        $genresArray[] = $row[$genresIndex];
        $samples[] = array_map('floatval', [
            $row[0],
            $row[1],
            $row[2],
            $row[3]
        ]);
    }

// Кодируем жанры
    list($encodedGenres, $uniqueGenres) = encodeGenres($genresArray);

// Добавляем закодированные жанры к остальным признакам
    foreach ($samples as $index => $sample) {
        $samples[$index] = array_merge($sample, $encodedGenres[$index]);
    }

// Нормализуем данные
    $normalizer = new \Phpml\Preprocessing\Normalizer();
    $normalizer->transform($samples);

// Создаем и обучаем модель
    $regression = new SVC();
    $regression = new LeastSquares();
//    $regression->setVarPath(public_path('models/var/'));

    $regression->train($samples, $labels);

// Пример прогноза для нового фильма
    $newFilm = [1975, 8.0, 7.6, 82]; // Year, imdb, kp, duration
    $newGenres = 'комедия, военный'; // Жанры нового фильма

// Кодируем жанры нового фильма
    $newFilmEncodedGenres = array_fill(0, count($uniqueGenres), 0);
    foreach (explode(',', $newGenres) as $genre) {
        $genre = trim($genre);
        $index = array_search($genre, $uniqueGenres);
        if ($index !== false) {
            $newFilmEncodedGenres[$index] = 1;
        }
    }

// Объединяем признаки нового фильма с закодированными жанрами
    $newFilmSample = [array_merge($newFilm, $newFilmEncodedGenres)];

// Нормализуем новый пример
    $normalizer->transform($newFilmSample); // Нормализуем массив по ссылке

// Прогнозируем оценку
    $predictedRating = $regression->predict($newFilmSample);
    dd($predictedRating);
});
