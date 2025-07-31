<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Movie;
use App\Models\Pair;
use App\Models\Rate;
use App\Models\SortFilm;
use App\Models\SortVote;
use App\Models\Third;
use App\Models\User;
use App\UseCases\StatysticsService;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
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
        $paginatedMeetings = Meeting::with(['movie', 'movie.director', 'movie.citates', 'movie.genres', 'rates', 'rates.user', ''])
            ->orderByDesc('id')
            ->paginate($perPage, ['*'], 'page', $page);
        // Связываем позиции с пагинированной коллекцией
        $paginatedMeetings->getCollection()->transform(function ($meeting) {
            $third = Third::where('selected_id', '=', $meeting->movie->id)->get()->first();
            $meeting->author = $third ? $third->user_id : null;
            return $meeting;
        });
        $meetings = $paginatedMeetings;
//        dd($meetings[0]);
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
        $correlations = StatysticsService::getCorrelations();
//        dd($correlations);
        $average = StatysticsService::getAverage();
        return view('welcome', compact('correlations', 'average'));
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


    public static function year(User $user = null)
    {
        if (!$user)
        {
            if (Auth::check())
            {
                $user = Auth::user();
            }
        }
        $users = [
            1 => "Ваня",
            2 => "Дима",
            3 => "Альвар",
            4 => "Даня",
            5 => "Стас",
            8 => "Макс",
//            30 => "Тася",
            122 => "Настя",
            141 => "Милена",
            8954 => "Вова",
        ];
        if (!$user or !isset($users[$user->id]))
        {
            abort(404);
        }
        $stats = json_decode(file_get_contents("https://imdibil.ru/js/year.json"), true);
        $name = $users[$user->id];
        $stats = $stats[$name];

        return view('year', compact('stats', 'name', 'users'));
    }

    public static function annual()
    {
        $meetings = Meeting::with(['rates.user', 'movie'])->whereYear('date_at', '=', 2024)->get();
        $stats = [
            'count' => $meetings->count()
        ];
        $rates = [
            'common' => [],
            'user' => [],
            'meeting' => []
        ];
        $meets = [];
        $dates = [];
        $avg = [];
        $count = [];
        $top = [];
        for ($i  = 1; $i < 13; $i++)
        {
            $dates[Carbon::parse('01-'.$i.'-2024')->translatedFormat("F")] = 0;
        }
        foreach ($meetings as $meeting)
        {
            foreach ($meeting->rates as $rate) {
                $rates['common'][] = $rate->rate;
                $rates['user'][$rate->user_id][] = $rate->rate;
            }

            $rates['meeting'][$meeting->id] = $meeting->rates->avg('rate');
            $dates[Carbon::parse($meeting->date_at)->translatedFormat('F')]++;
            $meets[$meeting->movie->name_m] = $meeting->rates->count();
        }

        $top = $meetings->sortByDesc('movie.our_rate');
        $rates['common'] = array_sum($rates['common']) / count($rates['common']);
        foreach ( $rates['user'] as $user => $rate)
        {
            $avg[$user] = round(array_sum($rate) / count($rate), 2);
            $count[$user] = count($rate);
        }

        return view('com_year', compact('meetings', 'dates', 'meets', 'avg', 'count', 'top'));
    }


    public static function sortVote()
    {
//        $movies = Pair::all();
//        foreach ($movies as $movie)
//        {
//            SortFilm::create([
//                'movie_id' => $movie->first,
//                'points' => 0
//            ]);
//            SortFilm::create([
//                'movie_id' => $movie->second,
//                'points' => 0
//            ]);
//
//        }
//
//        dd();

        $movies = SortFilm::with('movie')->get()->sortByDesc('movie.rating');
        $rates = SortVote::where('user_id', '=', \auth()->id())->get();
        return view('sort', compact('movies', 'rates'));
    }

    public static function deleteVote(\Illuminate\Http\Request $request)
    {
        $vote = SortVote::where('user_id', '=', \auth()->id())->get();

        foreach ($vote as $item) {
            $sort = SortFilm::where('movie_id', '=', $item->movie_id)->get()->first();
            $sort->decrement('points', $item->points);
            $item->forceDelete();
        }
        return redirect()->back();
    }

    public static function savesort(\Illuminate\Http\Request $request)
    {
        $rates = SortVote::where('user_id', '=',$request->get('id'))->get();
        if ($rates->count())
        {
            return response()->json(['success' => 0, 'message' => 'Вы уже оставили голос!']);
        }
        $points = [
            1 => 20,
            2 => 18,
            3 => 16,
            4 => 13,
            5 => 12,
            6 => 11,
            7 => 10,
            8 => 9,
            9 => 8,
            10 => 7,
            11 => 6,
            12 => 5,
            13 => 4,
            14 => 3,
            15 => 2,
            16 => 1,
        ];
        foreach (json_decode($request->get('select')) as $position => $movie)
        {
            SortVote::create([
                'movie_id' => $movie,
                'position' => $position+1,
                'points' => $points[$position+1] ?? 0,
                'user_id' => $request->get('id')
            ]);

            if ($position <= 15)
            {
                $sort = SortFilm::where('movie_id', '=', $movie)->get()->first();
                $sort->increment('points', $points[$position+1]);
            }

        }
        return response()->json(['success' => 1, 'message' => 'Сохранено!']);
    }
    public static function sortedVote()
    {

        return view('sorted');
    }

    public static function returnSorted()
    {
        $r = [
            [
                'name' => 'Дон мертв',
                'poster' => 'https://imdibil.ru/images/posters/dondead.webp',
                'points' => 2,
                'position' => 2
            ],
        ];

        $index = 1;
        $movies = [];
        $films = SortFilm::with('movie')->orderByDesc('points')->get();
        foreach ($films as $movie)
        {
            $movies[] = [
                'name' => $movie->movie->name_m,
                'poster' => asset('images/posters/'.$movie->movie->poster),
                'points' => $movie->points,
                'position' => $index++,
                'link' => $movie->movie->url,
                'id' => $movie->movie->id,
            ];
        }
        return response()->json($movies);
    }
}
