<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $difficulty
 */
class QuizQuestion extends Model
{
    protected $fillable = [
       'id',  'text', 'image', 'quiz_id', 'time'
    ];
    protected $table = 'quiz_questions';

    public $timestamps = false;
    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'question_id', 'id');
    }


    public const HARD_STATUS = 3;
    public const MEDIUM_STATUS = 2;
    public const EASY_STATUS = 1;

    public const DIFFICULTY = [
      self::EASY_STATUS => "Простые",
      self::HARD_STATUS => "Сложные",
      self::MEDIUM_STATUS => "Средние",
    ];


    public const URI_DIFF = [
      'simple' => self::EASY_STATUS,
      'medium' => self::MEDIUM_STATUS,
      'hard' => self::HARD_STATUS
    ];

    public static function parseDifficulty($diff) {
        return self::URI_DIFF[$diff];
    }
    public function getDifficulty(): string
    {
        return self::DIFFICULTY[$this->difficulty];
    }
}
