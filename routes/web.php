<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('main');
Route::get('/news', [\App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/statistics', [\App\Http\Controllers\MainController::class, 'statistics'])->name('statistics');

Route::prefix('/profile')->name('profile.')->middleware(['auth'])->group(function (){
    Route::get('/{user?}', [ProfileController::class, 'index'])->name('index');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
    Route::get('/delete-rate/{rate}', [ProfileController::class, 'deleteRate'])->name('delete-rate');
    Route::post('/add-film', [ProfileController::class, 'addFilm'])->name('add-film');
    Route::post('/add-rate', [ProfileController::class, 'addRate'])->name('add-rate');
    Route::post('/add-third', [ProfileController::class, 'addThird'])->name('add-third');
});
Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
Route::get('quiz', [\App\Http\Controllers\QuizController::class, 'index']);






Route::prefix('/admin')->name('admin.')->group(function (){
    Route::prefix('/quiz')->name('quiz.')->group(function (){
        Route::get('/create', [\App\Http\Controllers\Admin\QuizController::class, 'index'])->name('create');
        Route::post('/create', [\App\Http\Controllers\Admin\QuizController::class, 'save'])->name('save');
    });
});

require __DIR__.'/auth.php';
