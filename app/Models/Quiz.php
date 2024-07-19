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
       'id', 'title', 'image', 'text', 'text_preview', 'alias', 'type', 'title', 'time','errors','sum','user_id','status', 'medal'
    ];
    public $timestamps = false;



    protected $table = 'quizzes';

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id')->with('answers');
    }

    public function questionsCount()
    {
        return $this->hasMany(QuizQuestion::class, 'quiz_id', 'id')->with('answers')->count();
    }

    public function unique_results()
    {
        return $this->hasMany(QuizProgress::class, 'quiz_id', 'id')->count();
    }


    public function user_medals()
    {
        return $this->hasMany(UserQuizMedal::class, 'quiz_id', 'id')->where('user_id', '=', auth()->id())->orderByDesc('rank')->first();
    }


}
