<?php

use App\Models\Third;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

Route::get('/quiz/{difficulty}', [\App\Http\Controllers\Api\QuizController::class, 'index']);
Route::get('/quiz-test/{difficulty?}', [\App\Http\Controllers\Api\QuizController::class, 'counter']);

Route::prefix('/statistics')->group(function () {
    Route::get('user_graph', [\App\Http\Controllers\MainController::class, 'user_graph']);
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





