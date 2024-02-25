<?php

use Illuminate\Http\Request;
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
Route::get('/quiz-test/{difficulty}', [\App\Http\Controllers\Api\QuizController::class, 'counter']);
