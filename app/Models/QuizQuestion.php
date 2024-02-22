<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class QuizQuestion extends Model
{
    protected $fillable = [
       'id',  'text', 'image', 'difficulty', 'time'
    ];
    protected $table = 'quiz_questions';

    public $timestamps = false;
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id', 'id');
    }
}
