<?php

namespace App\Listeners;

use App\Events\EventsEvent;
use App\Events\QuizResultsEvent;
use App\Events\SendCertificateEvent;
use App\Events\ThirdAddEvent;
use App\Models\QuizProgress;
use App\Models\User;
use App\Notifications\CertNotification;
use App\Notifications\QuizResultNotification;
use App\Notifications\SendCertificateNotification;
use App\Notifications\ThirdAddNotification;
use App\UseCases\Traits\Introvert;
use App\UseCases\Traits\SendData2Amo;

class QuizResultListener
{
	public function handle(QuizResultsEvent $event)
	{
		$event->user->notify(new QuizResultNotification($event->progress, $event->user));
		User::find(4)->notify(new QuizResultNotification($event->progress, $event->user));
	}
}

