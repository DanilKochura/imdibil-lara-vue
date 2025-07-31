<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Rate;
use App\Models\Third;
use App\UseCases\PartOfSpeechDetector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class AdminController extends Controller
{

    public static function index()
    {
         return view('admin.index');
    }


    public static function alias()
    {
        return view('admin.alias.index');
    }

    public static function check(Request $request)
    {
//        dd($request->all());
        $array = json_decode($request->all()['text'], false);
        $array_clear = array_unique(($array));
        $danger = [];
        foreach ($array as $item)
        {
            if (!PartOfSpeechDetector::isNoun($item))
            {
                $danger[] = $item;
            }
        }
        return view('admin.alias.index', compact('array', 'array_clear', 'danger'));
    }
}
