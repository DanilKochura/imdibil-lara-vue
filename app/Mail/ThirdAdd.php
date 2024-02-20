<?php

namespace App\Mail;

use App\Models\Contract;
use App\Models\Third;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThirdAdd extends Mailable implements ShouldQueue
{
	use Queueable, SerializesModels;

	public $third;

	public function __construct(Third  $third)
	{
		$this->third = $third;
	}

	public function build(): ThirdAdd
	{
		return $this->subject('Добавлена тройка от пользователя '.$this->third->user->name)->html(
            "<p>Необходимо промодерировать тройку пользователя {$this->third->user->name}</p><p>Список фиьмов: {$this->third->firstMovie->name_m}, {$this->third->secondMovie->name_m}, {$this->third->thirdMovie->name_m}</p>"
        );

	}
}












