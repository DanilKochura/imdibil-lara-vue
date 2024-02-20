<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Third extends Model
{
    protected $fillable = [
        'id', 'first', 'second', 'third', 'selected_id', 'user_id', 'checked', 'created_at'
    ];



    public function selected()
    {
        return $this->hasOne(Movie::class, 'id', 'selected_id');
    }

    public function allThird()
    {
        return Movie::with('director')->where('id', $this->first)->orWhere('id', $this->second)->orWhere('id', $this->third)->get();
    }

    public function first()
    {
        return $this->hasOne(Movie::class, 'id', 'first');

    }
    public function second()
    {
        return $this->hasOne(Movie::class, 'id', 'second');

    }
    public function third()
    {
        return $this->hasOne(Movie::class, 'id', 'third');

    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }



}
