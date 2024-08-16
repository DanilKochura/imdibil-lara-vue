<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function landing() {
        $meetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
            ->orderByDesc('id')->get();
        return view('landing', compact('meetings'));
    }




    public static function index(MainFilterRequest $request)
    {
        $perPage = 20  ;
        $page = $request->input('page', 1);

        // Получаем встречи в исходном порядке (уменьшение id) с пагинацией
        $paginatedMeetings = Meeting::with(['movie', 'movie.director', 'movie.citates', 'movie.genres', 'rates', 'rates.user'])
            ->orderByDesc('id')
            ->paginate($perPage, ['*'], 'page', $page);
        // Связываем позиции с пагинированной коллекцией
        $paginatedMeetings->getCollection()->transform(function ($meeting) {
            $third = Third::where('selected_id', '=', $meeting->movie->id)->get()->first();
            $meeting->author = $third ? $third->user_id : null;
            return $meeting;
        });
        $meetings = $paginatedMeetings;
        return view('meetings', compact('paginatedMeetings', 'meetings'));
    }
    public static function old(MainFilterRequest $request)
    {
        $perPage = 20  ;
        $page = $request->input('page', 1);

        // Получаем встречи в исходном порядке (уменьшение id) с пагинацией
        $paginatedMeetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
            ->orderByDesc('id')
            ->paginate($perPage, ['*'], 'page', $page);

        // Получаем все встречи для добавления позиции
        $allMeetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
            ->get()
            ->sortByDesc(function ($meeting) {
                return $meeting->movie->our_rate;
            })
            ->values();

        // Добавляем поле position каждому элементу коллекции
        $allMeetings->each(function ($meeting, $index) {
            $meeting->movie->position = $index + 1;
            $third = Third::where('selected_id', '=', $meeting->movie->id)->get()->first();
            $meeting->author = $third ? $third->user_id : null;
        });

        // Связываем позиции с пагинированной коллекцией
        $paginatedMeetings->getCollection()->transform(function ($meeting) use ($allMeetings) {
            $meeting->movie->position = $allMeetings->firstWhere('id', $meeting->id)->movie->position;
            $meeting->author = $allMeetings->firstWhere('id', $meeting->id)->author;

            return $meeting;
        });
        $meetings = $paginatedMeetings;
        return view('old_meetings', compact('paginatedMeetings', 'meetings'));
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


    public static function meeting(Meeting $meeting)
    {
        $meeting->load(['movie', 'movie.director', 'movie.citates', 'rates', 'rates.user']);
        $third = Third::where('selected_id', '=', $meeting->movie->id)->get()->first();
        $meeting->author = $third ? $third->user_id : null;
        $meetings = Meeting::all()->sortByDesc('id');
        return view('meeting', compact('meeting', 'meetings'));

    }
}
