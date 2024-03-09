<?php

use App\Models\Third;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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
