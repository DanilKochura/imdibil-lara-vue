<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\MeetingResource;
use App\Http\Controllers\Resources\MovieAddResourse;
use App\Http\Controllers\Resources\ThirdResource;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Movie;
use App\Models\Rate;
use App\Models\Third;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public function index()
    {
        $meetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
            ->orderByDesc('id')->get();

        $position_imdb = Meeting::with(['movie'])->get()->sortByDesc('movie.rating')->pluck('id')->toArray();
        $position_our = Meeting::with(['movie'])->get()->sortByDesc('movie.our_rate')->pluck('id')->toArray();
        $position_kp = Meeting::with(['movie'])->get()->sortByDesc('movie.rating_kp')->pluck('id')->toArray();
        foreach ($meetings as &$meeting)
            {
                $meeting->positions = [
                    array_search($meeting->id, $position_imdb),
                    array_search($meeting->id, $position_our),
                    array_search($meeting->id, $position_kp),
                ];
            }
        return response()->json(MeetingResource::collection($meetings));
    }

    public function thirds()
    {
        $thirds = Third::with('selected', 'user', 'secondMovie.director', 'firstMovie.director', 'thirdMovie.director')->where('checked','=', 1)->orderByDesc('id')->paginate(5);
        return response()->json(ThirdResource::collection($thirds));
    }

    public function stats()
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

        return response()->json([
//            'user'=> array(),
            'avg'=> ['name' => 'Оценка сообщества', 'data' => $avg],
            'movies'=> array_values($movies->toArray()),
            'kp' => ['name' => 'Кинопоиск', 'data' => $kp],
            'imdb' => ['name' => 'IMDB', 'data' => $imdb]
        ]);
    }
}
