<?php

namespace App\Http\Controllers\Api\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Resources\MeetingResource;
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
    public function index()
    {
        $meetings = Meeting::with(['movie', 'movie.director', 'rates', 'rates.user'])
            ->orderByDesc('id')->get();
        return response()->json(MeetingResource::collection($meetings));
    }
}
