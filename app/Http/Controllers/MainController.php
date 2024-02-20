<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function index(MainFilterRequest $request)
    {
        $meetings = Meeting::with(['movie','movie.director', 'rates', 'rates.user'])->orderByDesc('id')->paginate(10);

//        if($request->sort)
//        {
//            $meetings->orderByRaw('movie.'.$request->sort, $request->order);
//        }

//        $meetings;
//        $meetings = Meeting::with(['movie','movie.director', 'rates', 'rates.user'])->get()->pluck('rates');
//        dd($meetings->pluck('movie')->pluck('director'));
        return view('meetings', compact('meetings'));
    }

    public static function statistics()
    {
        return view('welcome');

    }

    public static function news()
    {
        $thirds = Third::with('selected', 'user')->orderByDesc('id')->paginate(5);
//        dd($thirds);
        return view('thirds', compact('thirds'));
    }
}
