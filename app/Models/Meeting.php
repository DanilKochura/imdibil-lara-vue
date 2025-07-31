<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Sanctum\HasApiTokens;

class Meeting extends Model
{
    protected $fillable = [
       'id',  'movie_id', 'date_at'
    ];

    public  $timestamps = false;
    public function movie()
    {
        return $this->hasOne(Movie::class, 'id','movie_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class,  'meeting_id')->whereNotNull('rate')->orderByDesc('rate');
    }

    public static function getLastId()
    {

    }


    public static function cachedMeetings($forget = 0)
    {
        if ($forget) Cache::forget('mobile_meetings');
        return Cache::remember('mobile_meetings', now()->addDays(30),
            function ()
            {
                $meetings = Meeting::with(['movie', 'movie.director', 'movie.citates', 'movie.genres','rates', 'rates.user'])
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
                return $meetings;
            }
        );
    }

    public function getAuthor()
    {
        $this->loadMissing('movie');
        $third = Third::where("selected_id", $this->movie->id)->get()->first();
        return $third?->user_id;
    }

}
