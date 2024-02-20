<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Meeting;
use App\Models\Movie;
use App\Models\Rate;
use App\Models\Third;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class ProfileController extends Controller
{
    public static function index(User $user = null)
    {
        if(!$user)
        {
            $user = auth()->user();
        }
        $user->load('rates', 'rates.movie');

        $advices = $user->advices();
        $unrated = $user->unrated();
//        dd($unrated);
        return view('profile', compact('user', 'advices', 'unrated'));
    }

    public static function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'avatar' => 'image|nullable'
        ]);

        $user = auth()->user();

        if ($request->hasFile('avatar')) {
            $user->avatar =  $user->login . '.' . $request->avatar->extension();

            $request->avatar->move(public_path("build/images/uploads/"), $user->avatar);
        }
        $user->name = $validated['name'];
        $user->save();
        return redirect()->back();
    }


    public static function deleteRate(Rate $rate)
    {
        $rate->delete();
//        return redirect()->back();
        return response()->json(['status' => 1, 'text'=>'Оценка удалена']);
    }

    public static function addFilm(Request $request)
    {
        $request = $request->all();
        $dir = Director::firstOrCreate(['name_d' => $request['director']]);
        $movie = Movie::updateOrCreate([
            'name_m' => $request['nameRu'],
            'year_of_cr' => $request['year'],
            'director_id' => $dir->id,
            'url' => $request['webUrl']
        ],[
            'description' => $request['description'],
            'duration' => $request['filmLength'],
            'original' => $request['nameOriginal'],
            'poster' => $request['posterUrl'],
            'rating' => round($request['ratingImdb'], 2),
            'rating_kp' => round($request['ratingKinopoisk'], 2),
        ]);
        $genres = explode(' ', $request['genres']);
        foreach ($genres as $genre)
        {
            $genre = Genre::firstOrCreate(['name_g' => $genre]);
            $movie->genres()->attach($genre);
        }
        $status = null;
        if(!$movie->wasRecentlyCreated && $movie->wasChanged()){
            $status = 'Данные о фильме обновлены!';
        } elseif (!$movie->wasRecentlyCreated && !$movie->wasChanged()){
            $status = 'Фильм уже есть в базе';
        } elseif($movie->wasRecentlyCreated){
            $status = 'Фильм добавлен в базу';
        }
        return response()->json(['status'=> 1, 'text' => $status]);
    }


    public function addRate(Request $request)
    {
        if(!$request->get('movie') or !$request->get('rating'))
        {
            return response()->json(['status'=> 0, 'text' => "Заполните все поля"]);
        }
        $rate = Rate::updateOrCreate([
            'meeting_id' => $request->get('movie'),
            'user_id' => auth()->id()
        ], [
            'rate' => $request->get('rating')
        ]);
        if(!$rate->wasRecentlyCreated){
            $status = 'Оценка обновлена!';
        } else{
            $status = 'Оценка добавлена';
        }
        return response()->json(['status'=> 1, 'text' => $status]);

    }

}
