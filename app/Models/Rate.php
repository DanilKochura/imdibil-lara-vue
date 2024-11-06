<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Rate extends Model
{

    protected $fillable = [
        'meeting_id', 'user_id', 'rate'
    ];

    public function meeting()
    {
        return $this->belongsTo(Meeting::class, 'meeting_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class,   'id', 'user_id');
    }

    public function movie()
    {
        return $this->meeting()->with('movie');
    }

}
