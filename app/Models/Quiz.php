<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Quiz extends Model
{
    protected $fillable = [
       'id', 'title', 'image', 'text', 'text_preview', 'alias', 'type'
    ];
    public $timestamps = false;


    protected $table = 'quizzes';

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id')->with('questions.answers');
    }
}
