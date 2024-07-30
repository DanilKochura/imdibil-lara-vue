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
        if (auth()->id() == 4)
        {
            $quizzes = Quiz::all();
        } else
        {
            $quizzes = Quiz::where('user_id', '=', auth()->id())->get();
        }
         return view('admin.quiz.create', compact('quizzes'));
    }

    public static function edit(Quiz $quiz)
    {
        return view('admin.quiz.edit', compact('quiz'));
    }

    public static function save(Request $request)
    {
        $validated = $request->validate([
            'text' => 'nullable|string',
            'image' => 'image|max:500|required_without:text',
            'quiz_id' => 'required:numeric',
            'time' => 'numeric',
            'answer.*' => 'required|nullable',
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
            if ($answer)
            {
                $question->answers()->create([
                    'question_id' => $question->id,
                    'text' => $answer,
                    'correct' => $key == $validated['correct']
                ]);
            }

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
    public static function show_quizzes()
    {
        if (auth()->id() == 4)
        {
            $quizzes = Quiz::all();
        } else
        {
            $quizzes = Quiz::where('user_id', '=', auth()->id())->get();
        }
        return view('admin.quiz.quizzes', compact('quizzes'));

    }


    public static function saveQuiz(Request $request)
    {
        $validated = $request->validate([
           "title" => "required|string",
           "text" => "required|string",
           "text_preview" => "required|string",
           "alias" => "required|string",
           "type" => "required|numeric",
           "time" => "required|numeric",
           "errors" => "required|numeric",
           "sum" => "numeric|in:1,0",
           "status" => "numeric|in:1,0",
           "image" => "required|image|max:500",
        ]);
        $quiz = Quiz::create($request->all());
        if ($request->hasFile('image')) {
            $quiz->image =  $quiz->alias . '.' . $request->image->extension();
            $request->image->move(public_path("images/quiz/"), $quiz->image);
            $quiz->save();
        }
        $quiz->update(['user_id' => auth()->id()]);
        return redirect()->back();

    }

    public static function updateQuiz(Quiz $quiz,Request $request)
    {
        $validated = $request->validate([
           "title" => "required|string",
           "text" => "required|string",
           "text_preview" => "required|string",
           "alias" => "required|string",
           "type" => "required|numeric",
           "time" => "required|numeric",
           "errors" => "required|numeric",
           "sum" => "numeric|in:1,0",
           "status" => "numeric|in:1,0",
           "image" => "nullable|image|max:500",
        ]);
        $quiz->update($request->except('image'));
        if (!$request->get('status')) $quiz->update(['status' => 0]);
        if ($request->hasFile('image')) {
            $quiz->image =  $quiz->alias . '.' . $request->image->extension();
            $request->image->move(public_path("images/quiz/"), $quiz->image);
            $quiz->save();
        }
        return redirect()->route('admin.quiz.show_quizzes');

    }

    public static function questions(Quiz $quiz)
    {
        $quiz->load('questions');
        return view('admin.quiz.questions', compact('quiz'));
    }

}
