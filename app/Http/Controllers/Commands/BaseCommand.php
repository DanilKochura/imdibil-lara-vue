<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\BotController;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\CommandInterface;
use Telegram\Bot\Keyboard\Button;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class BaseCommand extends Command
{

    protected  $name = 'base';
    protected  $description = 'Start Command to get you started';
    protected $pattern = '{username} {age: \d+}';

    public function handle()
    {

        $keyboard = [
            ['Поставить оценку'],
            ['Добавить тройку']
        ];


        $kb = new Keyboard($keyboard);
        $tn  = Button::make('test');
        $this->replyWithMessage([
            'text' => 'Hey, there! Welcome to our bot!',
            'reply_markup' => json_encode(['keyboard' => $keyboard,
                'resize_keyboard' => true,
                'selective' => true,
                'one_time_keyboard' => false])
        ]);
        return;
        $args = $this->getArguments();
        $username = $args['username'];
        $age = $args['age'];

        if(!$username) {
            $this->replyWithMessage([
                'text' => "Please provide your username! Ex: /start jasondoe"
            ]);

            return;
        }

        if(!$age) {
            $this->replyWithMessage([
                'text' => "Please provide your age with the username! Ex: /start jasondoe 24"
            ]);

            return;
        }

        $this->replyWithMessage([
            'text' => "Hello {$username}! Welcome to our bot :)"
        ]);

    }

}
