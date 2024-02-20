<?php

namespace App\Events;

use App\Models\Third;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ThirdAddEvent
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $third;
    public $admin;

	public function __construct(Third $third)
	{
		$this->third = $third;
        $this->admin = User::find(4);
	}

}
