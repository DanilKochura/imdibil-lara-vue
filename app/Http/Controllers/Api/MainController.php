<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\MovieAddResourse;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Movie;
use App\Models\Rate;
use App\Models\Third;
use GuzzleHttp\Psr7\Request;
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

    public function movies(\Illuminate\Http\Request $request)
    {
        return response()->json(MovieAddResourse::collection(Movie::where("name_m", 'like', '%'.$request->get('key').'%')->orWhere("original", 'like', '%'.$request->get('key').'%')->get()));
    }
}
