<?php

namespace App\Events;

use App\Models\QuizProgress;
use App\Models\Third;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class QuizResultsEvent
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public QuizProgress $progress;
    public User $user;

	public function __construct(QuizProgress $progress, User $user)
	{
        $this->progress = $progress;
        $this->user = $user;
	}

}
