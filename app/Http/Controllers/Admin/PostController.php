<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Post;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class PostController extends Controller
{

    public static function index()
    {
        $posts = Post::all();
        return view('admin.blog.show', compact('posts'));
    }

    public static function edit(Quiz $quiz)
    {
        return view('admin.quiz.edit', compact('quiz'));
    }

    public static function save(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string',
            'alias' => 'required|string',
            'text' => 'required|string',
            'movie_id' => 'nullable|numeric',
        ]);
        $validated['user_id'] = Auth::id();
        $posts = Post::where('alias', '=', $validated['alias'])->orWhere('title', '=', $validated['title'])->get();
        if ($posts->count())
        {
            return redirect()->back()->with('error', 'Пост с таким алиасом или заголовком уже сществуцет');

        }

        $post = Post::create($validated);
        return redirect()->back();
    }


    public static function show()
    {
        $questions = QuizQuestion::with('answers')->get();
        return view('admin.quiz.show', compact('questions'));
    }


    public static function new()
    {
        return view('admin.blog.create');

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
