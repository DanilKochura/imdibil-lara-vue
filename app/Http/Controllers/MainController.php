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

        $meetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])->orderByDesc('id')->paginate(10);

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


    public static function user_graph()
    {
        $rates = Rate::with('movie', 'user')->orderBy('meeting_id')->get();
        $movies = $rates->pluck('movie.movie.name_m')->unique();
        $rates_users = $rates->groupBy('user_id');
        $imdb = array_values($rates_users->first()->pluck('movie.movie.rating')->toArray());
        $kp = array_values($rates_users->first()->pluck('movie.movie.rating_kp')->toArray());
        $avg = [];
        $meets = $rates->groupBy('meeting_id');
        foreach ($meets as $meet) {
            $avg[] = round($meet->avg('rate'), 2);
        }
        $users_graph = [
            [
                'label' => "Кинопоиск",
                'data' => $kp,
                'backgroundColor' => 'white',
                'borderColor' => 'orange',
                'fill' => false,
                'borderWidth' => 3,
                'hidden' => false
            ],
            [
                'label' => "IMDB",
                'data' => $imdb,
                'backgroundColor' => 'black',
                'borderColor' => 'yellow',
                'fill' => false,
                'borderWidth' => 3,
                'hidden' => false
            ],
            [
                'label' => "IMDibil",
                'data' => $avg,
                'backgroundColor' => 'white',
                'borderColor' => '#808080',
                'fill' => false,
                'borderWidth' => 3,
                'hidden' => false
            ]
        ];

        foreach ($rates_users as $rate) {
            $name = $rate->first()->user->name;
            $users_graph[] = [
                'label' => $name,
                'data' => $rate->pluck('rate'),
                'backgroundColor' => '#23282b',
                'borderColor' => 'gold',
                'fill' => false,
                'borderWidth' => 3,
                'hidden' => true

            ];

        }
        return response()->json([
            'labels' => array_values($movies->toArray()),
            'datasets' => $users_graph
        ]);
    }

    public static function news()
    {
        $thirds = Third::with('selected', 'user')->where('checked','=', 1)->orderByDesc('id')->paginate(5);
//        dd($thirds);
        return view('thirds', compact('thirds'));
    }
}
