<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\MeetingResource;
use App\Http\Controllers\Resources\MovieAddResourse;
use App\Http\Controllers\Resources\ThirdResource;
use App\Http\Requests\MainFilterRequest;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Meeting;
use App\Models\Movie;
use App\Models\Rate;
use App\Models\Third;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public function index()
    {
        $meetings = Meeting::cachedMeetings(1);
        return response()->json(MeetingResource::collection($meetings));
    }


    public function thirds()
    {
        $thirds = Third::with('selected', 'user', 'secondMovie.director', 'firstMovie.director', 'thirdMovie.director')->where('checked', '=', 1)->orderByDesc('id')->paginate(5);
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
            'avg' => ['name' => 'Оценка сообщества', 'data' => $avg],
            'movies' => array_values($movies->toArray()),
            'kp' => ['name' => 'Кинопоиск', 'data' => $kp],
            'imdb' => ['name' => 'IMDB', 'data' => $imdb]
        ]);
    }


    public static function mainPage()
    {
        $film = \App\Models\Movie::with('director', 'citates', 'genres')->find(Third::latest()->first()->selected_id);
//        $film = \App\Models\Movie::with('director', 'citates', 'genres')->find(11);

        return response()->json([
            'movie' => $film,
            'date' => null,
            'time' => null,
            'number' => Meeting::all()->count() + 1
        ]);
    }

    public static function search(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'extended' => 'nullable'
        ]);


        $query = $request['name'];

//        return response()->json([Movie::getFull(1), Movie::getFull(32)]);
        if (!isset($validated['extended']))
        {
            $movies = Movie::with('director', 'genres', 'citates')->where("name_m", 'like', '%'.$query.'%')->get();
        } else {
            $response = Http::withHeaders(['X-API-KEY' => 'BJW5RB7-7EPMVH8-HYD1773-4VEDA34'])
                ->get(
                    "https://api.kinopoisk.dev/v1.3/movie?selectFields=persons&selectFields=poster&selectFields=name&selectFields=alternativeName&selectFields=description&selectFields=id&selectFields=genres&selectFields=logo&selectFields=year&selectFields=movieLength&selectFields=rating&page=1&limit=10&name=".$query,

                );

            $body = json_decode($response->body(), 1);
            $movies = [];
            foreach ($body['docs'] as $film) {

                $kpid = $film['id'];

                $movie = Movie::with('director', 'citates', 'genres')->where('kp_id', $kpid)->get()->first();
                if ($movie) {
                    $movies[] = $movie;
                    continue;
                }

                if (!self::validateFilm($film)) continue;

                $director = null;
                foreach ($film['persons'] as $person)
                {
                    if ($person['enProfession'] == 'director')
                    {
                        $director = $person;
                        break;
                    }
                }

                if ($director)
                {
                    $dir = Director::where('name_d', $director['name'])->get()->first();
                    if (!$dir)
                    {
                        $dir = Director::create([
                            'name_d' => $director['name'],
                            'kp_id' => $director['id'],
                            'avatar' => $director['avatar'] ?? null,
                        ]);
                    }
                }
                $name = null;
                if (isset($film['poster']['url']))
                {
                    $image = file_get_contents($film['poster']['url']);
                    $name = \Faker\Provider\Uuid::uuid().'.jpg';
//            Storage::put(public_path('/images/posters/'.$name), $image);
                    file_put_contents(public_path('/images/posters/'.$name), $image);
                } else
                {
//                dd($film);
                }



                try {
                    $movie = Movie::updateOrCreate([
                        'name_m' => $film['name'],
                        'year_of_cr' => $film['year'],
                        'kp_id' => $film['id'],
                    ],[
                        'director_id' => $dir?->id,
                        'poster' => $name,
                        'url' => "https://www.kinopoisk.ru/film/".$film['id'],
                        'description' => $film['description'] ?? "",
                        'duration' => $film['movieLength'],
                        'original' => ($film['alternativeName']),
                        'rating' => round($film['rating']['kp'], 1),
                        'rating_kp' => round($film['rating']['imdb'], 1),
                    ]);


                    foreach ($film['genres'] as $genre)
                    {
                        $genre = Genre::firstOrCreate(['name_g' => $genre['name']]);
                        $movie->genres()->attach($genre);
                    }
                    $movie->load('director');
                    $movie->load('genres');
                    $movie->load('citates');
                    $movies[] = $movie;
                } catch (\Exception $exception) {}

            }
        }




        return response()->json($movies);
    }

    public static function validateFilm($film) {
        foreach (['movieLength', 'name', 'year'] as $field)
        {
            if (!isset($film[$field]))
            {
                return false;
            }
        }
        if (!$film['rating']['kp'] or !$film['rating']['imdb'])
        {
            return false;
        }
        return true;
    }
}
