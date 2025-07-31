<?php

use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ProfileController;
use App\Mail\VerifyMail;
use App\Models\Meeting;
use App\Models\Rate;
use App\Models\Third;
use App\Models\UserVote;
use App\Models\VotePair;
use App\View\PdfBase\PDFCertificate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\SVC;
use Phpml\Math\Distance\Minkowski;
use Phpml\SupportVectorMachine\Kernel;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/tree', function (){
    return view('trees');
});

Route::get('/alias/privacy', function (){
   return view('alias_privacy');
});
Route::get('/', [\App\Http\Controllers\MainController::class, 'landing'])->name('main');
Route::get('/meetings', [\App\Http\Controllers\MainController::class, 'index'])->name('meetings');
Route::get('/metings', [\App\Http\Controllers\MainController::class, 'old'])->name('metings');
Route::get('/meeting/{meeting}', [\App\Http\Controllers\MainController::class, 'meeting'])->name('meeting');
Route::get('/news', [\App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/statistics', [\App\Http\Controllers\MainController::class, 'statistics'])->name('statistics');
Route::middleware(['auth'])->get('/year/{user?}', [\App\Http\Controllers\MainController::class, 'year'])->name('year');
Route::get('/annual', [\App\Http\Controllers\MainController::class, 'annual'])->name('annual');

Route::prefix('/profile')->name('profile.')->middleware(['auth'])->group(function (){
    Route::get('/{user?}', [ProfileController::class, 'index'])->name('index');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
    Route::get('/delete-rate/{rate}', [ProfileController::class, 'deleteRate'])->name('delete-rate');
    Route::post('/add-film', [ProfileController::class, 'addFilm'])->name('add-film');
    Route::post('/add-rate', [ProfileController::class, 'addRate'])->name('add-rate');
    Route::post('/add-third', [ProfileController::class, 'addThird'])->name('add-third');
    Route::post('/add-pair', [ProfileController::class, 'addPair'])->name('add-pair');
    Route::delete('/delete-pair/{pair}', [ProfileController::class, 'deletePair'])->name('delete-pair');
    Route::post('/vote', [\App\Http\Controllers\VoteController::class, 'vote'])->name('vote-pair');

});
Route::get('quiz/{difficulty}', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz');
Route::post('quiz/save-progress', [\App\Http\Controllers\QuizController::class, 'save'])->name('quiz.save');
Route::get('quiz', [\App\Http\Controllers\QuizController::class, 'main'])->name('game');
Route::get('game', function (){
   return redirect()->route('game');
});

Route::get('/posts');
Route::get('/post/{post}', [\App\Http\Controllers\BlogController::class, 'post']);

Route::get('/vote', [\App\Http\Controllers\VoteController::class, 'index']);
Route::middleware('auth')->get('/sort', [\App\Http\Controllers\MainController::class, 'sortVote']);
Route::get('/sorted', [\App\Http\Controllers\MainController::class, 'sortedVote']);
Route::post('/deleteVote', [\App\Http\Controllers\MainController::class, 'deleteVote'])->name('deleteVote');
Route::get('/getsorted', [\App\Http\Controllers\MainController::class, 'returnSorted']);

Route::get('/test/1', function (){
   return view('test');
});

Route::get('/testt', function (){
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

    $answers = [
        // Луна Лавгуд
        [0, 1, 0, 1, 0, 1, 1, 1, 0, 2, 1, 0, 0, 2, 1, 0, 0, 1, 0, 0],
        [0, 0, 0, 1, 0, 2, 1, 1, 0, 4, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0],

        // Гермиона Грейнджер
        [0, 1, 0, 1, 1, 1, 1, 0, 1, 1, 2, 1, 1, 0, 1, 0, 1, 1, 1, 0],
        [1, 1, 3, 2, 1, 0, 3, 1, 0, 1, 1, 2, 0, 1, 1, 2, 0, 1, 2, 1],

        // Лорд Волдеморт
        [2, 4, 4, 3, 3, 3, 0, 4, 3, 4, 4, 4, 3, 3, 3, 4, 4, 3, 4, 3],
        [2, 0, 2, 3, 1, 3, 0, 3, 4, 3, 4, 3, 2, 4, 3, 3, 1, 4, 3, 3],

        // Альбус Дамблдор
        [3, 3, 0, 3, 0, 0, 3, 2, 0, 0, 0, 0, 3, 2, 0, 0, 0, 3, 0, 3],
        [3, 1, 0, 2, 1, 0, 3, 2, 0, 0, 1, 0, 1, 0, 1, 0, 0, 2, 0, 2],

        // Северус Снегг
        [4, 2, 2, 4, 2, 3, 4, 4, 3, 2, 1, 3, 4, 4, 4, 3, 2, 4, 3, 4],
        [4, 2, 2, 4, 2, 3, 3, 2, 3, 2, 4, 3, 3, 2, 3, 4, 2, 4, 3, 2],

        // Гарри Поттер
        [2, 0, 3, 2, 0, 0, 2, 2, 2, 2, 1, 1, 2, 1, 1, 1, 2, 0, 2, 1],
        [0, 2, 1, 2, 1, 1, 2, 1, 0, 2, 1, 1, 1, 2, 2, 1, 0, 0, 1, 1],

        // Невилл Долгопупс
        [0, 0, 1, 2, 0, 0, 1, 1, 1, 1, 1, 0, 0, 1, 2, 0, 0, 1, 0, 1],
        [0, 1, 0, 0, 1, 0, 2, 1, 1, 2, 2, 0, 1, 1, 2, 1, 0, 0, 1, 1],

        // Беллатриса Лестрейндж
        [4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4],
        [4, 3, 4, 3, 4, 4, 2, 3, 3, 4, 3, 3, 4, 3, 4, 4, 3, 4, 3, 3],

        // Минерва МакГонагалл
        [1, 1, 2, 1, 0, 2, 2, 3, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0],
        [1, 1, 3, 1, 2, 2, 1, 2, 1, 3, 0, 1, 0, 1, 2, 0, 2, 1, 2, 2],

        // Рон Уизли
        [0, 1, 0, 1, 2, 0, 2, 1, 0, 1, 1, 0, 1, 2, 2, 0, 0, 0, 1, 0]
    ];


    $persons = [
        // Луна Лавгуд
        'Луна Лавгуд',
        'Луна Лавгуд',

        // Гермиона Грейнджер
        'Гермиона Грейнджер',
        'Гермиона Грейнджер',

        // Лорд Волдеморт
        'Лорд Волдеморт',
        'Лорд Волдеморт',

        // Альбус Дамблдор
        'Альбус Дамблдор',
        'Альбус Дамблдор',

        // Северус Снегг
        'Северус Снегг',
        'Северус Снегг',

        // Гарри Поттер
        'Гарри Поттер',
        'Гарри Поттер',

        // Невилл Долгопупс
        'Невилл Долгопупс',
        'Невилл Долгопупс',

        // Беллатриса Лестрейндж
        'Беллатриса Лестрейндж',
        'Беллатриса Лестрейндж',

        // Минерва МакГонагалл
        'Минерва МакГонагалл',
        'Минерва МакГонагалл',

        // Рон Уизли
        'Рон Уизли'
    ];

    $classifier = new SVC(
        Kernel::LINEAR, // $kernel
        1.0,            // $cost
        3,              // $degree
        null,           // $gamma
        0.1,            // $coef0
        0.001,          // $tolerance
        100,            // $cacheSize
        true,           // $shrinking
        true            // $probabilityEstimates, set to true
    );
    $classifier->setVarPath(public_path('models/var/'));
    $classifier->train($answers, $persons);

    $res = $classifier->predict([4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4]);

    $classifier = new SVC(
        Kernel::POLYNOMIAL, // $kernel
        1.0,            // $cost
        3,              // $degree
        null,           // $gamma
        0.1,            // $coef0
        0.001,          // $tolerance
        100,            // $cacheSize
        true,           // $shrinking
        true            // $probabilityEstimates, set to true
    );
    $classifier->setVarPath(public_path('models/var/'));
    $classifier->train($answers, $persons);

    $res4 = $classifier->predict([4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4]);
    $classifier = new SVC(
        Kernel::SIGMOID, // $kernel
        1.0,            // $cost
        3,              // $degree
        null,           // $gamma
        0.1,            // $coef0
        0.001,          // $tolerance
        100,            // $cacheSize
        true,           // $shrinking
        true            // $probabilityEstimates, set to true
    );
    $classifier->setVarPath(public_path('models/var/'));
    $classifier->train($answers, $persons);

    $res5 = $classifier->predict([4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4]);
    $classifier = new SVC(
        Kernel::RBF, // $kernel
        1.0,            // $cost
        3,              // $degree
        null,           // $gamma
        0.0,            // $coef0
        0.001,          // $tolerance
        100,            // $cacheSize
        true,           // $shrinking
        true            // $probabilityEstimates, set to true
    );
    $classifier->setVarPath(public_path('models/var/'));
    $classifier->train($answers, $persons);

    $res6 = $classifier->predict([4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4]);

    $classifier2 = new NaiveBayes();
//    $classifier->setVarPath(public_path('models/var/'));
    $classifier2->train($answers, $persons);

    $res2 = $classifier2->predict([4, 1, 2, 4, 2, 1, 3, 3, 4, 3, 4, 4, 3, 3, 3, 4, 2, 4, 3, 4]);


    $classifier3 = new KNearestNeighbors();
    $classifier3->train($answers, $persons);

    $res3 = $classifier3->predict([1, 1, 2, 4, 1, 2, 3, 3, 0, 3, 2, 2, 3, 2, 0, 0, 1, 0, 3, 0]);
    dd($res, $res2, $res3, $res4, $res5, $res6);

});


Route::prefix('/admin')->middleware(['auth', 'admin'])->name('admin.')->group(function (){
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
    Route::get('/alias', [\App\Http\Controllers\Admin\AdminController::class, 'alias']);
    Route::post('/alias/check', [\App\Http\Controllers\Admin\AdminController::class, 'check'])->name('alias.check');
    Route::prefix('/quiz')->name('quiz.')->group(function (){
        Route::get('/create', [QuizController::class, 'index'])->name('create');
        Route::post('/create', [QuizController::class, 'save'])->name('save');
        Route::get('/show', [QuizController::class, 'show'])->name('show');
        Route::get('/new', [QuizController::class, 'new'])->name('new');
        Route::get('/{quiz}/edit', [QuizController::class, 'edit'])->name('edit');
        Route::get('/quizzes', [QuizController::class, 'show_quizzes'])->name('show_quizzes');
        Route::post('/save-quiz', [QuizController::class, 'saveQuiz'])->name('save-quiz');
        Route::post('/{quiz}/update-quiz', [QuizController::class, 'updateQuiz'])->name('update-quiz');
        Route::get('/{quiz}/questions', [QuizController::class, 'questions'])->name('questions');
    });
    Route::prefix('/movies')->name('movies.')->group(function () {
        Route::get('/show-movies', [MovieController::class, 'index'])->name('show_movies');
        Route::get('/edit/{movie}', [MovieController::class, 'edit'])->name('edit');
        Route::post('/update/{movie}', [MovieController::class, 'update'])->name('update');

    });
    Route::prefix('/posts')->name('posts.')->group(function () {
        Route::get('/create', [PostController::class, 'new'])->name('create');
        Route::get('/show-posts', [PostController::class, 'index'])->name('show_posts');
        Route::get('/edit/{movie}', [PostController::class, 'edit'])->name('edit');
        Route::post('/update/{movie}', [PostController::class, 'update'])->name('update');
        Route::post('/save', [PostController::class, 'save'])->name('save');
    });
});

Route::get('/test', function (){
    $pairs = \App\Models\VotePair::where('round', '=', 4)->get();
    foreach ($pairs as $pair)
    {
        $select = [$pair->first, $pair->second];
        for ($i = 1; $i < 10; $i++)
        {
            if($i == 4) continue;
            UserVote::firstOrCreate([
                'user_id' => $i,
                'pair_id' => $pair->id,
                'pair_event' => $pair->event_id
            ],
            [
                'vote' => $select[array_rand($select)]
            ]);
        }
    }
});

Route::get('/test1', function (){
//   dd(\Illuminate\Support\Facades\DB::("select user_id from rates where rate is NOT NULL and meeting_id = (SELECT max(id) from meetings) and user_id not in ( SELECT user_id  FROM `thirds` WHERE id > 100)"));
    $maxMeetingId = Meeting::max('id');

    $userIds = Rate::whereNotNull('rate')
        ->where('meeting_id', $maxMeetingId)
        ->whereNotIn('user_id', function ($query) {
            $query->select('user_id')
                ->from('thirds')
                ->where('id', '>', 100);
        })
        ->pluck('user_id')->toArray();
    $id = $userIds[array_rand($userIds)];
    dd(\App\Models\User::find($id)->name, $id, );
});


Route::get('/landing', function (){
    $meetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
        ->orderByDesc('id')->get();
   return view('landing', compact('meetings'));
})->name('landing');
Route::post('/bot', [BotController::class, 'handle']);


Route::get('/test-colors', function (){
   return view('test-colors');
});



require __DIR__.'/auth.php';
