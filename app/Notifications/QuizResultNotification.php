<?php

namespace App\Notifications;

use App\Models\QuizProgress;
use App\Models\User;
use App\View\PdfBase\PDFCertificate;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class QuizResultNotification extends Notification
{
	use Queueable;


    private QuizProgress $progress;
    private User $user;

    public function __construct(QuizProgress $progress, User $user)
	{
		$this->progress = $progress;
        $this->user = $user;
        $cert = new PDFCertificate($progress);
        $cert->Output("F", 'certs/' . $progress->id . '.pdf');
	}

	public function via()
	{
		return ['mail'];
	}

	public function toMail(): MailMessage
	{
		return (new MailMessage)
			->subject('Поздравляем с прохождением викторины!')
			->line('Поздравляем Вас с успешным прохождением викторины "'.$this->progress->quiz->title.'"')
			->line('Вы сможете самостоятельно скачать документ или распечатать.')
			->attach('certs/' . $this->progress->id . '.pdf', ['as' => 'cert.pdf']);
	}

}
