<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizProgress;
use App\Models\Rate;
use App\Models\Third;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class QuizController extends Controller
{
    public static function index($difficulty)
    {
        $quiz = Quiz::where('alias', '=', $difficulty)->get()->first();
        $quiz = json_encode([
            'id' => $quiz->id,
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


    public static function save(\Illuminate\Http\Request $request)
    {
        $request = $request->all();
        $result = QuizProgress::where('quiz_id', '=', $request['quiz_id'])->where('user_id', '=',auth()->id() )->get()->first();
        if(!$result)
        {
            $result = QuizProgress::create([
                'quiz_id' => $request['quiz_id'],
                'user_id' => auth()->id(),
                'points' => $request['points']
            ]);
        } else
        {
            if($request['points'] > $result->points)
            {
                $result->points = $request['points'];
            }
            $result->attempt++;
            $result->save();
        }
        return response()->json(['status' => 1, 'quiz' => $result]);

    }

}
