<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class QuizController extends Controller
{
    public static function index()
    {
        $quizzes = Quiz::all();
         return view('admin.quiz.create', compact('quizzes'));
    }

    public static function save(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'text' => 'nullable|string',
            'image' => 'image',
            'quiz_id' => 'required:numeric',
            'time' => 'numeric',
            'answer.*' => 'required|string|required',
            'correct' => 'required|numeric'
        ]);


        $question =   QuizQuestion::create(
            $validated
        );
        if ($request->hasFile('image')) {
            $question->image =  Str::uuid() . '.' . $request->image->extension();

            $request->image->move(public_path("images/quiz/"), $question->image);
            $question->save();
        }

        foreach ($validated['answer'] as $key =>$answer)
        {
            $question->answers()->create([
                'question_id' => $question->id,
                'text' => $answer,
                'correct' => $key == $validated['correct']
            ]);
        }
        return redirect()->back();
    }


    public static function show()
    {
        $questions = QuizQuestion::with('answers')->get();
        return view('admin.quiz.show', compact('questions'));
    }


    public static function new()
    {
        return view('admin.quiz.new');

    }


    public static function saveQuiz(Request $request)
    {
//        dd($request->all());
        $quiz = Quiz::create($request->all());
        if ($request->hasFile('image')) {
            $quiz->image =  $quiz->alias . '.' . $request->image->extension();

            $request->image->move(public_path("images/quiz/"), $quiz->image);
            $quiz->save();
        }
        return redirect()->back();

    }
}
