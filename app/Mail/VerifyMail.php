<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
	use SerializesModels;

	public User $user;
	public string $password;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct(User $user, string $password)
	{
		$this->user = $user;
		$this->password = $password;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('Благодарим за регистрацию!')->view('mail.verify-mail');
	}
}












