<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Movie extends Model
{
    protected $fillable = [
        'name_m',
        'rating',
        'rating_kp',
        'year_of_cr',
        'duration',
        'director_id',
        'our_rate',
        'users_rate',
        'original',
        'poster',
        'url',
        'description'
    ];

    public function director()
    {
        return $this->hasOne(Director::class, 'id', 'director_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }

}
