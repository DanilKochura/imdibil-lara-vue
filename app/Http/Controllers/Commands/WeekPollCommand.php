<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\BotController;
use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use GuzzleHttp\Client;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\CommandInterface;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Objects\Update;

class WeekPollCommand extends Command
{

    protected  $name = 'weekpoll';
    protected  $description = 'Опрос на ближайшую неделю';

    public function handle()
    {

        $day = Carbon::today();
        $arr = [];
        for ($i = 0; $i < 8; $i++)
        {
            $arr[] = $day->modify('next day')->locale('ru')->translatedFormat('D, j M Y');
        }


            $this->replyWithPoll([
                'question' => 'Клубнико на неделе',
                'options' => json_encode($arr),
                'is_anonymous' => false,
                'allows_multiple_answers' => true
            ]);


    }

}
