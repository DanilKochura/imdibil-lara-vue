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
});

require __DIR__.'/auth.php';
