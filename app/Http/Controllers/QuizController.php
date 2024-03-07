<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizProgress;
use App\Models\Rate;
use App\Models\Third;
use App\Models\UserQuizMedal;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class QuizController extends Controller
{
    public static function index($difficulty)
    {
        $quiz = Quiz::where('alias', '=', $difficulty)->get()->first();
        $quiz = [
            'id' => $quiz->id,
            'image' => asset('images/quiz/' . $quiz->image),
            'title' => $quiz->title,
            'alias' => $quiz->alias,
            'errors' => $quiz->errors,
            'text' => $quiz->text_preview,
            'time' => $quiz->time,
            'sum' => $quiz->sum
        ];
        return view('quiz', compact('difficulty', 'quiz'));
    }

    public static function main()
    {
        $quizzes = Quiz::where('type', '=', 1)->get();
        $groups = QuizProgress::with('user')->get()->groupBy('user_id');
        $results = $groups->map(function ($group) {
            return [
                'points' => $group->pluck('points'),
                'sum' => $group->pluck('points')->sum(),
                'name' => $group->first()->user->name,
                'avatar' => $group->first()->user->avatar,
                'id' => $group->first()->user->id
            ];
        });
        $results = collect($results);
        $results->sortBy('sum');
        return view('game', compact('quizzes', 'results'));
    }


    public static function save(\Illuminate\Http\Request $request)
    {
        $request = $request->all();
        $result = QuizProgress::where('quiz_id', '=', $request['quiz_id'])->where('user_id', '=', auth()->id())->get()->first();
        if (!$result) {
            $result = QuizProgress::create([
                'quiz_id' => $request['quiz_id'],
                'user_id' => auth()->id(),
                'points' => $request['points']
            ]);
        } else {
            if ($request['points'] > $result->points) {
                $result->points = $request['points'];
            }
            $result->attempt++;
            $result->save();
        }
        $gold = $silver = $bronze = false;
        if ($request['points'] / $request['total'] > 0.95) {
            $gold = UserQuizMedal::firstOrCreate([
                'user_id' => auth()->id(),
                'quiz_id' => $request['quiz_id'],
                'rank' => 3
            ]);
        }
        if ($request['points'] / $request['total'] > 0.80) {
            $silver = UserQuizMedal::firstOrCreate([
                'user_id' => auth()->id(),
                'quiz_id' => $request['quiz_id'],
                'rank' => 2
            ]);
        }
        if ($request['points'] / $request['total'] > 0.60) {
            $bronze = UserQuizMedal::firstOrCreate([
                'user_id' => auth()->id(),
                'quiz_id' => $request['quiz_id'],
                'rank' => 1
            ]);
        }
        return response()->json(
            [
                'status' => 1,
                'quiz' => $result,
                'medals' => [
                    'gold' => $gold != null,
                    'silver' => $silver != null,
                    'bronze' => $bronze != null
                    ]
            ]);

    }

}
