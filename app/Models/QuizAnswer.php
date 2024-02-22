<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class QuizAnswer extends Model
{
    protected $fillable = [
       'id',  'question_id', 'text', 'correct'
    ];
    public $timestamps = false;


    protected $table = 'quiz_answers';
}
