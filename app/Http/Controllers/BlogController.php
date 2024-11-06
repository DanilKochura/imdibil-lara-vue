<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Post;
use App\Models\Rate;
use App\Models\Third;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class BlogController extends Controller
{
    public static function post(string $post)
    {
        $post = Post::where('alias', '=', $post)->with('movie', 'user')->get()->first();
        return view('post', compact('post'));
        dd($post);
    }
}
