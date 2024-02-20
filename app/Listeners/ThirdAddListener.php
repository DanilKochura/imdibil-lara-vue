<?php

namespace App\Listeners;

use App\Events\EventsEvent;
use App\Events\SendCertificateEvent;
use App\Events\ThirdAddEvent;
use App\Notifications\CertNotification;
use App\Notifications\SendCertificateNotification;
use App\Notifications\ThirdAddNotification;
use App\UseCases\Traits\Introvert;
use App\UseCases\Traits\SendData2Amo;

class ThirdAddListener
{
	public function handle(ThirdAddEvent $event)
	{
		$event->admin->notify(new ThirdAddNotification($event->third));
	}
}

