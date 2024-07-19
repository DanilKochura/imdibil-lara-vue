<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $role
 * @property mixed $id
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
        'avatar',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public const STATUS_GUEST = '1';
    public const STATUS_EXPERT = '2';
    public function getRole(){
        return self::ROLES[$this->role];
    }

    public function isExpert()
    {
        return $this->role == self::STATUS_EXPERT;
    }
    public const ROLES = [
        self::STATUS_EXPERT => 'Резидент',
        self::STATUS_GUEST => 'Гость'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class,   'user_id','id')->whereNotNull('rate')->orderByDesc('rate');
    }

    public function pair()
    {
        return $this->hasMany(Pair::class,   'user_id','id');
    }


    public function advices()
    {
        $id = $this->id;
        $test = DB::table('movies')->select('movies.id')
            ->leftJoin('meetings', 'meetings.movie_id', '=', 'movies.id')
            ->join('thirds', function (JoinClause $joinClause) {
                $joinClause->on('first', '=','movies.id')
                    ->orOn('second', '=','movies.id')
                    ->orOn('third', '=','movies.id');
        })->where('thirds.user_id','=', $id)->whereNull('meetings.movie_id')->get();
        return Movie::whereIn('id', $test->pluck('id')->unique())->get();
    }

    public function unrated()
    {
        return DB::table('meetings')->select('name_m', 'meetings.id')->join('movies', 'movie_id', 'movies.id')->leftJoinSub("select * from rates where user_id = '{$this->id}'", 'ur','meetings.id', 'meeting_id')->whereNull('ur.id')->get();
//        return Meeting::with('movie', 'rates')->whereRelation('rates', 'user_id', '=', $this->id)->whereRelation('rates', 'rate', '=', null)->dd()->get();
    }

    public function quiz_progress()
    {
        return $this->hasMany(QuizProgress::class, 'user_id', 'id')->with('quiz')->get();
    }

    public function medals()
    {
        return $this->hasMany(UserQuizMedal::class, 'user_id', 'id')->orderByDesc('rank');
    }
    public function isAdmin()
    {
        return $this->role == 3;
    }

}
