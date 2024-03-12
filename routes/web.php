<?php

use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\ProfileController;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
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
Route::get('quiz/{difficulty}', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz');
Route::post('quiz/save-progress', [\App\Http\Controllers\QuizController::class, 'save'])->name('quiz.save');
Route::get('quiz', [\App\Http\Controllers\QuizController::class, 'main'])->name('game');
Route::get('game', function (){
   return redirect()->route('game');
});






Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function (){
    Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index']);
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
});

Route::get('/test', function (){
    $user = auth()->user();
    Mail::to($user->email)->send(new VerifyMail($user, $user->password));
});





require __DIR__.'/auth.php';
