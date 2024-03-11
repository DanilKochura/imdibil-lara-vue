<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $quiz_id
 * @property mixed $user_id
 */
class QuizProgress extends Model
{
    protected $fillable = [
       'id',  'quiz_id', 'user_id', 'points', 'attempt'
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class, 'id', 'quiz_id');
    }

    public function medals()
    {
        return UserQuizMedal::where('user_id', '=', $this->user_id)->where('quiz_id', '=', $this->quiz_id)->get();
    }
    protected $table = 'quiz_results';
}
