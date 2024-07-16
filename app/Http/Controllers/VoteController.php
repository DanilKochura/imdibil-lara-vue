<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainFilterRequest;
use App\Models\Meeting;
use App\Models\Rate;
use App\Models\Third;
use App\Models\UserVote;
use App\Models\VotePair;
use http\Env\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class VoteController extends Controller
{
    public function index()
    {
        $pairs = VotePair::where('round', '=', 1)->with('secondMovie', 'firstMovie', 'votes')->orderBy('id')->get();
        $pairs2 = VotePair::where('round', '=', 2)->with('secondMovie', 'firstMovie', 'votes')->orderBy('id')->get();
        $pairs3 = VotePair::where('round', '=', 3)->with('secondMovie', 'firstMovie', 'votes')->orderBy('id')->get();
        $pairs4 = VotePair::where('round', '=', 4)->with('secondMovie', 'firstMovie', 'votes')->orderBy('id')->get();
        return view('vote', compact('pairs', 'pairs2', 'pairs3','pairs4'));
    }
    public function vote(\Illuminate\Http\Request $request)
    {
        $vote = UserVote::firstOrCreate([
            'user_id' => auth()->id(),
            'pair_id' => (VotePair::findByUid($request->get('id_vote')))->id,
            'pair_event' => $request->get('id_vote')
        ],
        [
            'vote' => $request->get('id_m')
        ]);


        if (UserVote::where('pair_event', '=', $request->get('id_vote'))->count() == 9)
        {
            $arr = \App\Models\UserVote::where('pair_event', '=', $request->get('id_vote'))->get()->countBy('vote')->toArray();
            arsort($arr);
            VotePair::findByUid($request->get('id_vote'))->update(['winner' => array_key_first($arr)]);
        }


        if ($vote->wasRecentlyCreated)
        {
            return response()->json(['state' => 1, 'text' => 'Голос сохранен!']);
        } else
        {
            return response()->json(['status' => 1, 'text' => 'Голос уже есть!']);
        }
    }
}
