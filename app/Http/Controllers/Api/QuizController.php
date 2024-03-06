<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\QuizQuestionResource;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizQuestion;
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
        $quests = QuizQuestion::with('answers')->where('quiz_id', '=', $quiz->id)->get()->shuffle();
        $encodedData = base64_encode(json_encode(QuizQuestionResource::collection($quests)));
        return response($encodedData);

    }

    public static function counter($difficulty = null)
    {
        if($difficulty)
        {
            $quiz = Quiz::where('alias', '=', $difficulty)->get()->first();
            $quests = QuizQuestion::with('answers')->where('quiz_id', '=', $quiz->id)->get()->shuffle();
            dd($quests->count());
        } else
        {
            $res = [];
            $quests = QuizQuestion::with('answers')->get();
            $quests = $quests->groupBy('quiz_id');
            foreach ($quests as $q)
            {
                $res[$q->first()->quiz_id] = $q->count();
            }
            dd($res);
        }

        $encodedData = base64_encode(json_encode(QuizQuestionResource::collection($quests)));
        return response($encodedData);
    }


}
