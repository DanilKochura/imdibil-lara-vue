<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Meeting extends Model
{
    protected $fillable = [
       'id',  'movie_id', 'date_at'
    ];

    public function movie()
    {
        return $this->hasOne(Movie::class, 'id','movie_id');
    }

    public function rates()
    {
        return $this->hasMany(Rate::class,  'meeting_id')->whereNotNull('rate')->orderByDesc('rate');
    }

}
