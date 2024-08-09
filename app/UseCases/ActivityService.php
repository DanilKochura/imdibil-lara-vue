<?php

namespace App\UseCases;

use App\Models\QuizAttempts;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivityService
{

    public User $user;

    public function __construct($user)
    {
        $this->user = $user;
    }


    public function getActivity()
    {

        $startOfCurrentWeek = Carbon::now()->startOfWeek();

        $startDate = $startOfCurrentWeek->copy()->subWeeks(16);

        $endDate = Carbon::now()->endOfDay();

        $quizAttempts = [];
        try {
            $quizAttempts = QuizAttempts::select('created_at')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->where('user_id', '=', $this->user->id)
                ->get()
                ->groupBy(function($date) {
                    return Carbon::parse($date->created_at)->format('Y-m-d');
                })
                ->map(function ($row) {
                    return count($row);
                })
                ->toArray();
        } catch (\Exception $exception){}

        $activity = [];
        $period = Carbon::parse($startDate)->daysUntil($endDate);
        foreach ($period as $date) {
            $formattedDate = $date->format('Y-m-d');
            $formattedDateMan = $date->translatedFormat('j F Y');
            $activity[] = ['count' => $quizAttempts[$formattedDate] ?? 0, 'date' => $formattedDateMan];
        }

        return $activity;
    }
}
