<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\BotController;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use GuzzleHttp\Client;
use Mockery\Exception;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\CommandInterface;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Objects\Update;



class PollCommand extends Command
{

    protected  $name = 'poll';
    protected  $description = 'Опрос на ближайшую неделю';
    protected $pattern = '{date}';

    public function handle()
    {
        $date = $this->getArguments();
       if($date and isset($date['date']))
        {
            try {
                $carbon = Carbon::parse($date['date']);
                $this->replyWithPoll([
                    'question' => 'Клубнико в '.$carbon->locale('ru')->translatedFormat('D, j M Y'),
                    'options' => [
                        'Да! Могу!',
                        'Буду сопротивляться, но если уговорите, то буду',
                        'Занят, идите нахуй!'
                    ],
                    'is_anonymous' => false,
                    'allows_multiple_answers' => true
                ]);
                $this->replyWithMessage([
                    'text' => $carbon->format('r')
                ]);
                return;
            } catch (Exception  $e)
            {
                $this->replyWithMessage([
                    'text' => "Invalid data"
                ]);
                return;
            }
        }else
        {
            $this->replyWithMessage([
                'text' => "Invalid data"
            ]);
            return;
        }




    }

}
