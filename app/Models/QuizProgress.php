<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class QuizProgress extends Model
{
    protected $fillable = [
       'id',  'quiz_id', 'user_id', 'points', 'attempt'
    ];
    public $timestamps = false;


    protected $table = 'quiz_results';
}
