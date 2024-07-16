<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class VotePair extends Model
{
    protected $fillable = [
        'id', 'first', 'second', 'event_id', 'round', 'winner'
    ];

    public $timestamps = false;

    public function allPair()
    {
        return Movie::with('director')->where('id', $this->first)->orWhere('id', $this->second)->get();
    }

    public function firstMovie()
    {
        return $this->hasOne(Movie::class, 'id', 'first');

    }
    public function secondMovie()
    {
        return $this->hasOne(Movie::class, 'id', 'second');

    }

    public static function findByUid($uid)
    {
        return self::where('event_id', '=', $uid)->get()->first();
    }

    public function votes()
    {
        return $this->hasMany(UserVote::class, 'pair_id', 'id')->with('user');

    }




}
