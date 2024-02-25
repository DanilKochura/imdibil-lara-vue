<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class QuizController extends Controller
{
    public static function index($difficulty)
    {
        $quiz = Quiz::where('alias', '=', $difficulty)->get()->first();
        $quiz = json_encode([
            'image' => asset('images/quiz/'.$quiz->image),
            'title' => $quiz->title,
            'alias' => $quiz->alias,
            'errors' => $quiz->errors,
            'text' => $quiz->text_preview,
            'time' => $quiz->time,
            'sum' => $quiz->sum
        ]);
         return view('quiz', compact('difficulty', 'quiz'));
    }

    public static function main()
    {
        $quizzes = Quiz::all();
        return view('game', compact('quizzes'));
    }

}
