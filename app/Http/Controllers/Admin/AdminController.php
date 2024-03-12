<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class AdminController extends Controller
{

    public static function index()
    {
         return view('admin.index');
    }

}
