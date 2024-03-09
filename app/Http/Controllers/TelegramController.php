<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Commands\WeekPollCommand;
use App\Models\Third;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    protected $telegram;
    protected $chat_id;
    protected $username;
    protected $text;

    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function getMe()
    {
        $response = $this->telegram->getMe();
        return $response;
    }

    public function setWebHook()
    {
        $url = 'https://bot.imdibil.com/api/bot';
        $response = $this->telegram->setWebhook(['url' => $url]);

        return $response == true ? redirect()->back() : dd($response);
    }

    public function handleRequest()
    {
        $request = json_decode($this->telegram->getWebhookUpdate(), 1);
        Log::info(json_encode($request));
        if (isset($request['message'])) {
            $this->chat_id = $request['message']['chat']['id'];
            $this->username = $request['message']['from']['username'];
            $this->text = $request['message']['text'];

            switch ($this->text) {
                case '/start':
                case '/menu':
                    $this->showMenu();
                    break;
                case '/week':
                    $this->weekPoll();
                    break;
                case '/nextWatch':
                    $this->nextWatch();
                    break;
                    case '/test':
                    $this->test();
                    break;
            }
        }
    }

    public function showMenu($info = null)
    {
        $message = '';
        if ($info) {
            $message .= $info . chr(10);
        }
        $message .= '/menu' . chr(10);
        $message .= '/getGlobal' . chr(10);
        $message .= '/getTicker' . chr(10);
        $message .= '/getCurrencyTicker' . chr(10);

        $this->sendMessage($message);
    }

    public function test()
    {
        $this->sendMessage('test');
//        $this->telegram->
        $keyboard = [
            ['7', '8', '9'],
            ['4', '5', '6'],
            ['1', '2', '3'],
            ['0']
        ];

        $response = Telegram::sendMessage([
            'chat_id' => $this->chat_id,
            'text' => 'Hello World',
            'reply_markup' => json_encode(['keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => true])
        ]);

        $messageId = $response->getMessageId();
    }




    protected function formatArray($data)
    {
        $formatted_data = "";
        foreach ($data as $item => $value) {
            $item = str_replace("_", " ", $item);
            if ($item == 'last updated') {
                $value = Carbon::createFromTimestampUTC($value)->diffForHumans();
            }
            $formatted_data .= "<b>{$item}</b>\n";
            $formatted_data .= "\t{$value}\n";
        }
        return $formatted_data;
    }

    protected function sendMessage($message, $parse_html = false)
    {
        $data = [
            'chat_id' => $this->chat_id,
            'text' => $message,
        ];

        if ($parse_html) $data['parse_mode'] = 'HTML';

        $this->telegram->sendMessage($data);
    }


    protected function weekPoll()
    {
        $day = Carbon::today();
        $arr = [];
        for ($i = 0; $i < 8; $i++) {
            $arr[] = $day->modify('next day')->locale('ru')->translatedFormat('l, j M Y');
        }

        $this->telegram->sendPoll([
            'question' => 'Клубнико на неделе',
            'options' => json_encode($arr),
            'is_anonymous' => false,
            'allows_multiple_answers' => true,
            'chat_id' => $this->chat_id
        ]);


    }

    protected function nextWatch()
    {
        $film = Third::with('selected')->where('checked', '=', 1)->get()->last()->selected;

        $reply = "<b>" . $film->name_m . "</b> - " . $film->year_of_cr .
            PHP_EOL . "Длительность - " . $film->duration . " минут" .
            PHP_EOL . "КП: <b>" . $film->rating_kp . "</b>" .
            PHP_EOL . "IMDB: <b>" . $film->rating . "</b>" .
            PHP_EOL . "<a href='$film->url'>Кинопоиск</a>";
        $this->telegram->sendPhoto(['chat_id' => $this->chat_id, 'photo' => \Telegram\Bot\FileUpload\InputFile::create($film->poster, $film->name_m), 'parse_mode' => 'HTML', 'caption' => $reply]);
//        $this->sendMessage($reply, true);

    }
}
