<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class MainController extends Controller
{
    public static function index()
    {
        $arr = [
            'labels'=> ['1', '2','3'],
            'datasets' => [
                ['data' => [2,3,4]]
            ]
        ];
        return response()->json($arr);
    }
}
