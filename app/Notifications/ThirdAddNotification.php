<?php

namespace App\Notifications;

use App\Models\Third;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ThirdAddNotification extends Notification
{
	use Queueable;

    public $third;
	public function __construct(Third $third)
	{
		$this->third = $third;

	}

	public function via($notifiable): array
	{
		return ['mail'];
	}

	public function toMail($notifiable): MailMessage
	{
		return (new MailMessage)
			->subject('Добавлена тройка от пользователя '.$this->third->user()->name)
            ->line("Необходимо промодерировать тройку пользователя ".$this->third->user()->name)
            ->line("Список фиьмов: ".$this->third->first()->name.', '.$this->third->second()->name.', '.$this->third->third()->name);
	}

}
