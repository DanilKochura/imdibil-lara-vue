<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
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
         return view('admin.quiz.create');
    }

    public static function save(Request $request)
    {
//        dd($request->all());
        $validated = $request->validate([
            'text' => 'nullable|string',
            'image' => 'image',
            'difficulty' => 'in:1,2,3',
            'time' => 'numeric',
            'answer.*' => 'required|string|required',
            'correct' => 'required|numeric'
        ]);


        $question =   QuizQuestion::create(
            $validated
        );
        if ($request->hasFile('image')) {
            $question->image =  Str::uuid() . '.' . $request->image->extension();

            $request->image->move(public_path("build/images/quiz/"), $question->image);
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
}
